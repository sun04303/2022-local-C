let nameReg = /([가-힣a-zA-Z]){2,50}/g

if (location.pathname.includes("sub3")) {
    let photoNum = 1
    let rating = 0
    let lastPage = 0

    window.onload = () => {
        makeList()
    }

    $('.write-btn').on('click', () => {
        $('#write').modal('show')

        $('#name').val('')
        $('#goods').val('')
        $('#place').val('')
        $('#date').val('')
        $('#content').val('')

        rating = 0
        document.querySelectorAll('.rate-box input').forEach(item => {
            item.checked = false
        })

        document.querySelector('#rating0').checked = true

        document.querySelectorAll('.photo-node').forEach(item => {
            item.remove()
        })

        let input = `<div class="mb-3 photo-node">
                        <label for="photo" class="form-label">사진</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept=".jpg">
                    </div>`
        document.querySelector('form').insertBefore(makeElem(input), document.querySelector('.photo-add'))
    })

    $('#write .cl').on('click', () => {
        $('#write').modal('hide')
    })

    $('.photo-add').on('click', e => {
        let input = `<div class="mb-3 photo-node">
                        <label for="photo${photoNum}" class="form-label">사진</label>
                        <input type="file" name="photo" id="photo${photoNum}" class="form-control" accept=".jpg">
                    </div>`
        document.querySelector('form').insertBefore(makeElem(input), e.target)
        photoNum++
    })

    $('#content').on('keyup', e => {
        $('.str-count').html(`${e.target.value.length}자`)
    })

    document.querySelectorAll('.rate-box input').forEach(item => {
        item.addEventListener('click', e => {
            rating = e.target.value
        })
    })

    $('.list').scroll(function() {
        var scrollTop = $(this).scrollTop();
        var innerHeight = $(this).innerHeight();
        var scrollHeight = $(this).prop('scrollHeight');

        if (scrollTop + innerHeight >= scrollHeight) {
            makeList()
        }
    })

    $('.chk').on('click', e => {
        e.preventDefault();

        let imgList = []
        let jpg = 0

        document.querySelectorAll('input[type="file"]').forEach(item => {
            if (item.files.length) {
                imgList.push(item.files)
                if (item.value.slice(item.value.indexOf(".") + 1).toLowerCase() == 'jpg') jpg++
            }
        })

        if (!nameReg.test($('#name').val())) {
            alert('이름은 2자 이상, 50자 이하, 한글 및 영어만 사용할 수 있습니다.')
        } else if ($('#content').val().length < 100) {
            alert('내용은 100자 이상 작성해야합니다.')
        } else if (imgList.length != jpg) {
            alert('파일은 jpg 형식만 업로드 할 수 있습니다.')
        } else {
            let data = {
                name: $('#name').val(),
                product: $('#goods').val(),
                shop: $('#place').val(),
                purchaseDate: $('#date').val(),
                contents: $('#content').val(),
                score: rating,
                jpg
            }

            $.ajax({
                url: '/api/reviews',
                method: 'post',
                data,
                dataType: 'json',
                success: res => {
                    if (res.Header.split(':')[1] == "200") {
                        let formData = new FormData()

                        document.querySelectorAll('input[type="file"]').forEach(item => {
                            formData.append("image[]", item.files[0])
                        })

                        $.ajax({
                            url: '/api/review/image',
                            method: 'post',
                            contentType: false,
                            processData: false,
                            data: formData,
                            dataType: 'json',
                            success: () => {

                            },
                            error: er => {
                                $('.list').html('')
                                makeList()
                                alert(res.Body.message)
                                $('#write').modal('hide')
                            }
                        })
                    } else {
                        alert(res.Body.message)
                    }
                }
            })
        }
    })

    function makeList() {
        $.ajax({
            url: `/api/reviews?last-key=${lastPage}`,
            method: 'get',
            dataType: 'json',
            success: (res) => {
                if(res.Header.split(':')[1] == "200") {
                    res.Body.reviews.forEach(item => {
                        let listItem = makeElem(`<div class="list-item mb-4" data-id="${item.id}">
                                                    <h4 data-id="${item.id}">${item.name}</h4>
                                                    <div class="content" data-id="${item.id}">
                                                        <img src="./resource/uploadimg/${item.image}" alt="후기 이미지" data-id="${item.id}">
                                                        <div class="text" data-id="${item.id}">
                                                            <span data-id="${item.id}">${item.purdate}</span><br>
                                                            ${makeStar(item.score)}
                                                            <p data-id="${item.id}">${item.product} / ${item.shop}</p>
                                                            <p data-id="${item.id}">${item.contents}...</p>
                                                        </div>
                                                    </div>
                                                </div>`)
                        listItem.addEventListener('click', e => {
                            makeModal(e.target.dataset.id)
                        })
                        $('.list').append(listItem)
                    })
                    lastPage += 10
                } else {
                    alert(res.Body.message)
                }
            }
        })
    }

    function makeModal(id) {
        $.ajax({
            url:`/api/reviews/${id}`,
            method: 'get',
            dataType:'json',
            success: res => {
                if(res.Header.split(':')[1] == "200") {
                    $('#detail .modal-content').html(`
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailLabel">상세보기</h5>
                        </div>
                        <div class="modal-body">
                            <div class="left">
                                <div class="first"><img src="./resource/uploadimg/${res.Body.photos.shift().file}"></div>
                                <div class="second">${makeImg(res.Body.photos)}</div>
                            </div>
                            <div class="right">
                                <h4>${res.Body.name}</h4>
                                <div class="content">
                                    <span>${res.Body.purdate}</span><br>
                                    ${makeStar(res.Body.score)}
                                    <p>${res.Body.product} / ${res.Body.shop}</p>
                                    <p>${res.Body.contents}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-id="${Number(res.Body.id) - 1}">이전글</button>
                            <button class="btn btn-primary" data-id="${Number(res.Body.id) + 1}">다음글</button>
                        </div>`)
                    $('#detail').modal('show')
    
                    $('#detail .second img').on('click', e => {
                        let firstSrc = document.querySelector('.first img').src.split('/')
                        firstSrc = firstSrc[firstSrc.length - 1]
                        let src = e.target.src.split('/')
                        src = src[src.length - 1]
                        
                        e.target.src = `./resource/uploadimg/${firstSrc}`
                        document.querySelector('.first img').src = `./resource/uploadimg/${src}`
                    })
    
                    document.querySelectorAll('#detail button').forEach(item => {
                        item.addEventListener('click', e => {
                            makeModal(e.target.dataset.id)
                        })
                    })
                } else {
                    alert(res.Body.message)
                }
            }
        })
    }

    function makeStar(num) {
        let str = ""
        let n = num
        for(let i = 0; i < 5; i++) {
            if(n - 2 >= 0) {
                str+=`<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                        <polygon class="st0" points="50,3.7 61.5,39.1 98.7,39.1 68.6,60.9 80.1,96.3 50,74.5 19.9,96.3 31.4,60.9 1.3,39.1 38.5,39.1 	"/>
                    </svg>`
                n -= 2
            } else if (n - 1 >= 0) {
                str+=`  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                            <g>
                                <path class="st0" d="M50,34.81l2.29,7.06l2.25,6.91h7.27h7.42l-6,4.36l-5.88,4.27l2.25,6.91l2.29,7.06l-6-4.36L50,62.74l-5.88,4.27
                                    l-6,4.36l2.29-7.06l2.25-6.91l-5.88-4.27l-6-4.36h7.42h7.27l2.25-6.91L50,34.81 M50,2.45L38.2,38.77H0l30.9,22.45L19.1,97.55
                                    L50,75.1l30.9,22.45L69.1,61.23L100,38.77H61.8L50,2.45L50,2.45z"/>
                            </g>
                            <g>
                                <polygon class="st0" points="50,75.1 19.1,97.55 30.9,61.23 0,38.77 38.2,38.77 50,2.45 	"/>
                            </g>
                        </svg>`
                n -= 1
            } else {
                str+=`<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                        <style type="text/css">
                            .st{fill:none;stroke:#3DB7BA;stroke-width:11;stroke-miterlimit:10;}
                        </style>
                        <g>
                            <polygon class="st" points="50,18.92 57.72,42.66 82.68,42.66 62.49,57.34 70.2,81.08 50,66.41 29.8,81.08 37.51,57.34 
                                17.32,42.66 42.28,42.66"/>
                        </g>
                    </svg>`
            }
        }

        return str
    }

    function makeImg(arr) {
        let str = ''
        arr.forEach(item => {
            str += `<img src='./resource/uploadimg/${item.file}' class="sec">`
        })

        return str
    }

} else if (location.pathname.includes("sub2")) {
    const AREA_LIST = [
        { name: '창원시', img: './resource/img/card/창원시_풋고추.jpg' },
        { name: '진주시', img: './resource/img/card/진주시_고추.jpg' },
        { name: '통영시', img: './resource/img/card/통영시_굴.jpg' },
        { name: '사천시', img: './resource/img/card/사천시_멸치.jpg' },
        { name: '김해시', img: './resource/img/card/김해시_단감.jpg' },
        { name: '밀양시', img: './resource/img/card/밀양시_대추.jpg' },
        { name: '거제시', img: './resource/img/card/거제시_유자.jpg' },
        { name: '양산시', img: './resource/img/card/양산시_매실.jpg' },
        { name: '의령군', img: './resource/img/card/의령군_수박.jpg' },
        { name: '함안군', img: './resource/img/card/함안군_곶감.jpg' },
        { name: '창녕군', img: './resource/img/card/창녕군_양파.jpg' },
        { name: '고성군', img: './resource/img/card/고성군_방울토마토.jpg' },
        { name: '남해군', img: './resource/img/card/남해군_마늘.jpg' },
        { name: '하동군', img: './resource/img/card/하동군_녹차.jpg' },
        { name: '산청군', img: './resource/img/card/산청군_약초.jpg' },
        { name: '함양군', img: './resource/img/card/함양군_밤.jpg' },
        { name: '거창군', img: './resource/img/card/거창군_사과.jpg' },
        { name: '합천군', img: './resource/img/card/합천군_돼지고기.jpg' },
    ]

    let showTimeout
    let animationTimeout
    let gameStatus = 'ready'
    let matchCount = 0
    let time = 90
    let cardList = []

    let count = document.querySelector('.cnt')
    let timer = document.querySelector('.time')

    window.onload = () => {
        initCard()
        initTimer()
        initEvent()
        render()
    }

    function initCard() {
        $('.board').html('')

        cardList = new Array(16).fill(1).map(v => ({
            elem: makeElem(
                `<div class="board-item">
                    <div class="back">
                        <img src="./resource/img/slogan.png" alt="뒷면">
                    </div>
                    <div class="front">
                        <img src="" alt="앞면">
                    </div>
                </div>`
            ),
            match: false,
            area: null,
            selected: false
        }))

        let listElem = document.querySelector('.board')
        cardList.forEach(item => {
            listElem.append(item.elem)
        })
    }

    function initTimer() {
        setInterval(() => {
            if (gameStatus == 'playing' && time > 0) {
                time--
                chkGameEnd()
            }
        }, 1000)
    }

    document.querySelector('.btn-start').addEventListener('click', gameStart)
    document.querySelector('.btn-hint').addEventListener('click', showHint)
    document.querySelector('.chk').addEventListener('click', e => {
        if (!$('#name').val() || !$('#phone').val()) {
            alert('모든 정보를 입력해주세요.')
        } else if (!nameReg.test($('#name').val())) {
            alert('이름은 2자 이상, 50자 이하, 한글 및 영어만 사용할 수 있습니다.')
        } else if ($('#phone').val().length != 13) {
            alert('전화번호를 확인해주세요. 000-0000-0000 형식이어야 합니다.')
        } else {
            let data = {
                score: matchCount,
                name: $('#name').val(),
                phone: $('#phone').val()
            }

            $.ajax({
                url: `/api/event/applicants`,
                method: 'post',
                data,
                dataType: 'JSON',
                success: res => {
                    if (res.Header.split(':')[1] == "200") {
                        alert(res.Body.message)
                        $.ajax({
                            url: `/api/event/${$('#phone').val()}/stamps`,
                            method: 'get',
                            dataType: 'json',
                            success: resp => {
                                if (resp.Header.split(':')[1] == "200") {
                                    let arr = document.querySelectorAll('.att div')
                                    resp.Body.stamps.forEach((item, i) => {
                                        if (!arr[i].classList.contains('stamped')) {
                                            arr[i].classList.add('stamped')
                                            arr[i].innerHTML = `
                                                <img src="./resource/img/stamp.png" alt="스탬프">
                                                ${item.split('-')[1]}월 ${item.split('-')[2]}일`
                                        }
                                    })

                                    if (resp.Body.stamps.length == 3) {
                                        let text = `<p class="text-center">축하합니다. 3일연속 출석하여 경품선정 대상자가 되었습니다.</p>`
                                        $('.att-box').append(text)
                                    }

                                    $('#enrolled').modal('hide')
                                    document.querySelector('.btn-start').innerText = '게임시작'

                                    gameStatus = 'ready'
                                    matchCount = 0
                                    time = 90
                                    cardList = []

                                    initCard()
                                    initEvent()
                                    render()
                                } else {
                                    alert(res.Body.message)
                                }
                            }
                        })

                    } else if (res.Body.message[0] == "하") {
                        alert(res.Body.message)
                        $('#enrolled').modal('hide')
                        document.querySelector('.btn-start').innerText = '게임시작'

                        gameStatus = 'ready'
                        matchCount = 0
                        time = 90
                        cardList = []

                        initCard()
                        initEvent()
                        render()
                    } else {
                        alert(res.Body.message)
                    }
                }
            })
        }
    })

    function initEvent() {
        cardList.forEach(card => {
            card.elem.addEventListener('click', () => {
                if (gameStatus != 'playing' || animationTimeout || card.match || card.selected)
                    return

                card.selected = true

                let selectedList = cardList.filter(card => card.selected)
                if (selectedList.length < 2) {
                    showTimeout = setTimeout(() => {
                        card.selected = false
                    }, 3000)
                    return
                }

                clearTimeout(showTimeout)
                animationTimeout = setTimeout(() => {
                    animationTimeout = null
                    let matchs = selectedList[0].area.name == selectedList[1].area.name
                    selectedList.forEach(card => {
                        card.match = matchs
                        card.selected = false
                    })

                    if (matchs) {
                        matchCount++
                        let areaname = makeElem(`<div class="area-name">${selectedList[0].area.name}</div>`)
                        selectedList[0].elem.appendChild(areaname)
                        areaname = makeElem(`<div class="area-name">${selectedList[1].area.name}</div>`)
                        selectedList[1].elem.appendChild(areaname)
                    }

                    chkGameEnd()
                }, 1000)
            })
        })

        $('#phone').on('input', e => {
            let str = e.target.value.replace(/[^0-9]/g, '')
            let arr = [
                str.substr(0, 3),
                str.substr(3, 4),
                str.substr(7, 4),
            ]

            e.target.value = arr.filter(v => v.length > 0).join('-')
        })
    }

    async function gameStart() {
        if (gameStatus == 'wait') return

        clearTimeout(showTimeout)
        clearTimeout(animationTimeout)
        showTimeout = null
        animationTimeout = null

        initCard()
        initEvent()

        document.querySelector('.btn-start').innerText = '다시하기'

        gameStatus = 'wait'
        matchCount = 0
        time = 5
        cardList.forEach(item => {
            item.selected = false
            item.match = false
            item.area = null
        })

        let areaList = JSON.parse(JSON.stringify(AREA_LIST))
        let useList = []

        for (let i = 0; i < 8; i++) {
            let idx = parseInt(Math.random() * areaList.length)
            let [area] = areaList.splice(idx, 1)
            useList.push(area)
        }

        useList.forEach(area => {
            for (let i = 0; i < 2; i++) {
                let list = cardList.filter(card => !card.area)
                let idx = parseInt(Math.random() * list.length)
                list[idx].area = area
                list[idx].elem.querySelector('.front img').src = area.img
            }
        })

        cardList.forEach(card => {
            card.selected = true
        })

        for (let i = 5; i > 0; i--) {
            await toastCount(i)
            time--
        }

        cardList.forEach(card => {
            card.selected = false
            time = 90
        })

        gameStatus = 'playing'
    }

    function chkGameEnd() {
        if (time > 0 && matchCount == 8 || time == 0) {
            gameStatus = 'end'

            cardList.forEach(card => {
                if(!card.match) {
                    let areaname = makeElem(`<div class="area-name">${card.area.name}</div>`)
                    card.elem.appendChild(areaname)
                }
            })

            $('.result').html(`${matchCount}개`)

            $('#name').val('')
            $('#phone').val('')
            $('#enrolled').modal('show')
        }
    }

    function render() {
        let min = Math.floor(time / 60)
        let sec = String(time % 60).padStart(2, '0')

        timer.innerHTML = `<b>Time</b> ${min}:${sec}`

        count.innerHTML = `<b>Hit</b> ${matchCount}개`

        cardList.forEach(card => {
            if (gameStatus == 'end') {
                card.elem.classList.add('active')

                if (card.match) {
                    card.elem.classList.add('match')
                } else {
                    card.elem.classList.add('unmatch')
                }
            } else {
                if (card.match || card.selected) {
                    card.elem.classList.add('active')
                } else {
                    card.elem.classList.remove('active')
                }

                card.elem.classList.remove('match')
                card.elem.classList.remove('unmatch')
            }
        })

        requestAnimationFrame(() => render())
    }

    let hint = false
    async function showHint() {
        if (hint || gameStatus != 'playing' || animationTimeout) return

        clearTimeout(showTimeout)
        clearTimeout(animationTimeout)
        showTimeout = null
        animationTimeout = null

        hint = true
        cardList.forEach(item => {
            item.selected = true
        })

        for (let i = 3; i > 0; i--) {
            await toastCount(i)
        }

        cardList.forEach(card => {
            card.selected = false
        })
        hint = false
    }
}

function makeElem(textHTML) {
    let parent = document.createElement('div')
    parent.innerHTML = textHTML
    return parent.firstElementChild
}

async function toastCount(number) {
    await wait(850)
}

function wait(ms) {
    return new Promise((res) => {
        setTimeout(() => {
            res()
        }, ms)
    })
}
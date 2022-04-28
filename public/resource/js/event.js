$('button').on('click', e => {
    $.ajax({
        url:'/getEvent',
        method:'post',
        data: {
            date:$('#date').val()
        },
        dataType:'json',
        success: res => {
            $('tbody').html('')
            res.forEach(item => {
                let tr = `
                    <tr class="${item.inatt >= 3 ? "high" : ""}">
                        <td class="text-center">${item.name}</td>
                        <td class="text-center">${item.phone}</td>
                        <td class="text-center">${item.score}</td>
                        <td class="text-center">${item.att}</td>
                        <td class="text-center">${item.inatt}</td>
                    </tr>`
                $('tbody').append(tr)
            })
        }
    })
})
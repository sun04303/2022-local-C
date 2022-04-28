<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>경상남도 특산품</title>
    <link rel="stylesheet" href="./resource/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/css/style.css">
</head>
<body>
    <section class="main-p">
        <div class="top">
            <h1><img src="./resource/img/slogan.png" alt="slogan"></h1>
            <div class="main-background">
                <img src="./resource/img/main/photo(18).jpg" alt="메인 배경">
            </div>
        </div>
        <div class="box">
            <div class="item">
                <div class="circle">
                    <div class="icon">
                        <img src="./resource/img/main/direct_icon.png" alt="icon">
                    </div>
                    <h2>특산품 안내</h2>
                    <p>product</p>
                    <p>경상남도가 자랑하는<br>특산품을 만나보세요</p>
                    <a href="/sub1">바로가기</a>
                </div>
                <div class="mini-circle first">
                    <img src="./resource/img/main/photo(8).jpg" alt="메인 이미지">
                </div>
                <div class="mini-circle second">
                    <img src="./resource/img/main/photo(15).jpg" alt="메인 이미지">
                </div>
            </div>
            <div class="item">
                <div class="circle">
                    <div class="icon">
                        <img src="./resource/img/main/direct_icon.png" alt="icon">
                    </div>
                    <h2>이벤트</h2>
                    <p>event</p>
                    <p>경상남도가 준비한<br>재밌는 미니 게임!</p>
                    <a href="/sub2">바로가기</a>
                </div>
                <div class="mini-circle first">
                    <img src="./resource/img/main/photo(19).jpg" alt="메인 이미지">
                </div>
                <div class="mini-circle second">
                    <img src="./resource/img/main/photo(1).jpg" alt="메인 이미지">
                </div>
            </div>
            <div class="item">
                <div class="circle">
                    <div class="icon">
                        <img src="./resource/img/main/direct_icon.png" alt="icon">
                    </div>
                    <h2>구매후기</h2>
                    <p>review</p>
                    <p>무엇을 살지 고민이라면<br>다양한 구매후기를 둘러보세요</p>
                    <a href="/sub3">바로가기</a>
                </div>
                <div class="mini-circle first">
                    <img src="./resource/img/main/photo(24).jpg" alt="메인 이미지">
                </div>
                <div class="mini-circle second">
                    <img src="./resource/img/main/photo(14).jpg" alt="메인 이미지">
                </div>
            </div>
        </div>

        <input type="checkbox" name="share" id="share" hidden>
        <input type="checkbox" name="menu" id="menu" hidden>

        <div id="circle-menu" class="circle-menu">
            <label for="share" class="float-btn">
                <img src="./resource/img/share.png" alt="공유 아이콘">
            </label>

            <div class="item-wrap">
                <a href="#" class="menu-item"><img src="./resource/img/sns/insta.png" alt="sns"></a>
                <a href="#" class="menu-item"><img src="./resource/img/sns/face.png" alt="sns"></a>
                <a href="#" class="menu-item"><img src="./resource/img/sns/you.png" alt="sns"></a>
                <a href="#" class="menu-item"><img src="./resource/img/sns/twit.png" alt="sns"></a>
            </div>
        </div>
        
        <div id="circle-menu1" class="circle-menu circle-menu-left">
            <label for="menu" class="float-btn">
                <span></span>
                <span></span>
                <span></span>
            </label>

            <div class="item-wrap">
                <a href="/" class="menu-item visit">HOME</a>
                <a href="/sub1" class="menu-item">특산품</a>
                <a href="/sub2" class="menu-item">이벤트</a>
                <a href="/sub3" class="menu-item">구매후기</a>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright (C) Gyeongsangbuk-do. All Rights Reserved.</p>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>경상남도 특산품</title>
    <script src="./resource/js/jquery-3.6.0.min.js"></script>
    <script src="./resource/bootstrap-5.0.2-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./resource/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/css/style.css">
</head>
<body>
    <section class="event-p">
        <img src="./resource/img/design.png" style="position: absolute; left: 0; top: 0; pointer-events: none;" alt="design">
        <div class="background">
            <div class="text" style="background-color: #46b06b;">
                <p>event</p>
                <h1>이벤트</h1>
                <hr>
                <p>경상남도가 준비한 재밌는 미니 게임과 함께 특별한 선물까지 받을 수 있는 기회</p>
            </div>
            <img src="./resource/img/photo(13).jpg" alt="이벤트 배경">
        </div>
        <div class="box">
            <div class="item">
                <div class="top">
                    <h2>경상남도 특산품을 기억하라!</h2>
                    <p>
                        같은 카드 찾기 게임에 3일 연속 이벤트에 참여해 주신 분 중
                        <br>100분을 추첨하여 전통시장 및 상점에서 사용 가능한
                        <br>“<b>온누리 상품권 5,000원권</b>”을 보내 드립니다.
                    </p>
                    <p>
                        경상남도 특산품도 알아보고 재미있는 게임도 즐길 수 있는
                        <br>이번 이벤트에 많은 참여 바랍니다.
                    </p>
                </div>
                <div class="bot">
                    <h2>이벤트 참여 및 경품 안내</h2>
                    <p>- 참여방법 : 3일 연속으로 아래의 같은 카드 찾기 게임 참여하기</p>
                    <p>- 경품안내 : 온누리 상품권 5,000원권</p>
                    <p>- 당첨대상 : 3일 연속 게임 이벤트에 참여한 분 중 100명 추첨</p>
                </div>
            </div>
            <div class="item">
                <h2 class="mb-5">이벤트 참여 출석 체크</h2>
                <div class="att mb-4">
                    <div>
                        <span>1</span>
                        <span>DAY</span>
                    </div>
                    <div>
                        <span>2</span>
                        <span>DAY</span>
                    </div>
                    <div>
                        <span>3</span>
                        <span>DAY</span>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="game">
                    <div class="info">
                        <div class="top">
                            <div class="time"><b>Time</b> 1:17</div>
                            <div class="cnt"><b>Hit</b> 1개</div>
                        </div>
                        <div class="bot">
                            <button class="btn btn-hint">힌트보기</button>
                            <button class="btn btn-secondary btn-start">게임시작</button>
                        </div>
                    </div>
                    <div class="board">
                        
                    </div>
                </div>

                <div class="modal fade" id="enrolled" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="enrolledLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="enrolledLabel">참여정보 등록</h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <span class="form-label">찾은 개수</span>
                                        <p class="result"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">이름</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">전화번호</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cl">닫기</button>
                                <button type="button" class="btn btn-primary chk">등록</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner" style="background-color: #00ff59;">
                <span style="background-color: #83ffae;"></span>
                <p>상품권<br>증정<br>이벤트</p>
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
                <a href="/" class="menu-item">HOME</a>
                <a href="/sub1" class="menu-item">특산품</a>
                <a href="/sub2" class="menu-item visit">이벤트</a>
                <a href="/sub3" class="menu-item">구매후기</a>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright (C) Gyeongsangbuk-do. All Rights Reserved.</p>
    </footer>
    <script src="./resource/js/script.js"></script>
</body>
</html>
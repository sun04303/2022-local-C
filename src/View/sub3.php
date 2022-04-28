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
    <section class="review-p">
        <div class="background mb-5">
            <div class="text" style="background-color: #3db7ba;">
                <p>review</p>
                <h1>구매후기</h1>
                <hr>
                <p>다양한 구매후기를 살펴보고 나에게 딱 맞는 상품을 구매하세요!</p>
            </div>
            <img src="./resource/img/photo(3).jpg" alt="이벤트 배경">
        </div>
        <div class="box">
            <div class="item">
                <h2>경상남도 특산품의 소중한 구매 후기를 찾습니다</h2>
                <div style="display: flex;">
                    <img src="./resource/img/review.png" alt="리뷰이미지" width="300">
                    <div>
                        <p>
                            경상남도 특산품을 사랑하는 고객님의 소중한<br>경험을 공유함으로써 
                            지역 특산품을 홍보하고<br>판매를 증진시켜, 경상남도 농가의 소득 증대는<br>물론 
                            품질이 좋은 특산품을 보다 많은 고객분들과 공유하기 위해 구매 후기를 모집 합니다.
                        </p>
                        <button class="btn btn-success write-btn">글쓰기</button>
                    </div>
                </div>

                <div class="modal fade" id="write" tabindex="-1" data-bs-keyboard="false" aria-labelledby="writeLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="writeLabel">구매후기</h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">이름</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="사용자 이름을 입력해주세요.">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="goods" class="form-label">구매품</label>
                                            <input type="text" name="goods" id="goods" class="form-control" placeholder="상품을 입력해주세요.">
                                        </div>
                                        <div class="col">
                                            <label for="place" class="form-label">구매처</label>
                                            <input type="text" name="place" id="place" class="form-control" placeholder="장소를 입력해주세요.">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label for="date" class="form-label">구매일</label>
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                        <div class="col-6">
                                            <span class="form-label">평점</span>
                                            <div class="rate-box">
                                                <input type="radio" id="rating10" name="rating" value="10" hidden>
                                                <label for="rating10">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                                        <polygon class="st0" points="50,3.65 61.51,39.06 98.74,39.06 68.62,60.94 80.12,96.35 50,74.47 19.88,96.35 31.38,60.94 1.26,39.06 38.49,39.06 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating9" name="rating" value="9" hidden>
                                                <label for="rating9" class="half">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 100" style="enable-background:new 0 0 50 100;" xml:space="preserve">
                                                        <polygon class="st0" points="49.37,74.47 19.25,96.35 30.75,60.94 0.63,39.06 37.86,39.06 49.37,3.65 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating8" name="rating" value="8" hidden>
                                                <label for="rating8">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                                        <polygon class="st0" points="50,3.65 61.51,39.06 98.74,39.06 68.62,60.94 80.12,96.35 50,74.47 19.88,96.35 31.38,60.94 1.26,39.06 38.49,39.06 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating7" name="rating" value="7" hidden>
                                                <label for="rating7" class="half">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 100" style="enable-background:new 0 0 50 100;" xml:space="preserve">
                                                        <polygon class="st0" points="49.37,74.47 19.25,96.35 30.75,60.94 0.63,39.06 37.86,39.06 49.37,3.65 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating6" name="rating" value="6" hidden>
                                                <label for="rating6">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                                        <polygon class="st0" points="50,3.65 61.51,39.06 98.74,39.06 68.62,60.94 80.12,96.35 50,74.47 19.88,96.35 31.38,60.94 1.26,39.06 38.49,39.06 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating5" name="rating" value="5" hidden>
                                                <label for="rating5" class="half">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 100" style="enable-background:new 0 0 50 100;" xml:space="preserve">
                                                        <polygon class="st0" points="49.37,74.47 19.25,96.35 30.75,60.94 0.63,39.06 37.86,39.06 49.37,3.65 	"/>
                                                    </svg> 
                                                </label>
                                                
                                                <input type="radio" id="rating4" name="rating" value="4" hidden>
                                                <label for="rating4">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                                        <polygon class="st0" points="50,3.65 61.51,39.06 98.74,39.06 68.62,60.94 80.12,96.35 50,74.47 19.88,96.35 31.38,60.94 1.26,39.06 38.49,39.06 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating3" name="rating" value="3" hidden>
                                                <label for="rating3" class="half">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 100" style="enable-background:new 0 0 50 100;" xml:space="preserve">
                                                        <polygon class="st0" points="49.37,74.47 19.25,96.35 30.75,60.94 0.63,39.06 37.86,39.06 49.37,3.65 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating2" name="rating" value="2" hidden>
                                                <label for="rating2">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                                        <polygon class="st0" points="50,3.65 61.51,39.06 98.74,39.06 68.62,60.94 80.12,96.35 50,74.47 19.88,96.35 31.38,60.94 1.26,39.06 38.49,39.06 	"/>
                                                    </svg>
                                                </label>
                                                
                                                <input type="radio" id="rating1" name="rating" value="1" hidden>
                                                <label for="rating1" class="half">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 100" style="enable-background:new 0 0 50 100;" xml:space="preserve">
                                                        <polygon class="st0" points="49.37,74.47 19.25,96.35 30.75,60.94 0.63,39.06 37.86,39.06 49.37,3.65 	"/>
                                                    </svg>
                                                </label>

                                                <input type="radio" id="rating0" name="rating" value="0" hidden checked>
                                                <label for="rating0">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                                        <style type="text/css">
                                                            .st{fill:none !important;stroke:#3db7ba;stroke-width:10;stroke-miterlimit:10;}
                                                        </style>
                                                        <polygon class="st" points="50,6.85 60.71,39.82 95.37,39.82 67.33,60.18 78.04,93.15 50,72.78 21.96,93.15 32.67,60.18 
                                                            4.63,39.82 39.29,39.82 	"/>
                                                    </svg>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">내용</label>
                                        <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                                        <span class="str-count">0자</span>
                                    </div>
                                    <div class="mb-3 photo-node">
                                        <label for="photo" class="form-label">사진</label>
                                        <input type="file" name="photo" id="photo" class="form-control" accept=".jpg">
                                    </div>
                                    <button class="btn btn-primary photo-add">사진추가 +</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cl">닫기</button>
                                <button type="button" class="btn btn-primary chk">확인</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list">
                
            </div>
            <div class="modal fade" id="detail" tabindex="-1" data-bs-keyboard="false" aria-labelledby="detailLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailLabel">상세보기</h5>
                        </div>
                        <div class="modal-body">
                            <div class="left">
                                <div class="first"></div>
            
                            </div>
                            <div class="right">
                                <h4></h4>
                                <div class="content">
                                    <span></span>
                                    <p></p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">이전글</button>
                            <button class="btn btn-primary">다음글</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner" style="background-color: #5ce3e6;">
                <span style="background-color: #adfeff;"></span>
                <p>소중한<br>구매후기</p>
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
                <a href="/sub2" class="menu-item">이벤트</a>
                <a href="/sub3" class="menu-item visit">구매후기</a>
            </div>
        </div>
    </section>
    <footer>
        <p>Copyright (C) Gyeongsangbuk-do. All Rights Reserved.</p>
    </footer>
    <script src="./resource/js/script.js"></script>
</body>
</html>
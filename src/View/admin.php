<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./resource/bootstrap-4.6.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="./resource/css/style.css">
</head>
<body>
    <div class="container admin-m">
        <h1 class="mb-5">관리자 페이지입니다</h1>
        <?php if(!isset($_SESSION['user'])) : ?>
            <form action="/adminLogin" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">아이디</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="아이디를 입력해주세요." autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">비밀번호</label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="비밀번호를 입력하세요.">
                </div>
                <button class="btn btn-success">확인</button>
            </form>
        <?php else: ?>
            <div class="box">
                <a href="/special">
                    <div class="item text-center">
                        <i class="fas fa-shopping-cart"></i>
                        <h2>특산품 관리</h2>
                    </div>
                </a>
                <a href="/event">
                    <div class="item text-center">
                        <i class="fas fa-gift"></i>
                        <h2>이벤트 관리</h2>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
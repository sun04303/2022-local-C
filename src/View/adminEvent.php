<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./resource/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./resource/bootstrap-4.6.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="./resource/css/style.css">
</head>
<body>
    <div class="background mb-5">
        <img src="./resource/img/photo(12).jpg" alt="특산품 배경 이미지">
        <h1 class="text">이벤트 조회</h1>
    </div>
    <div class="container admin-e">
        <form class="mb-5">
            <div class="mb-3">
                <label for="date" class="form-label">조회 날짜</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <button type="button" class="btn btn-success">조회</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">이름</th>
                    <th class="text-center">번호</th>
                    <th class="text-center">점수</th>
                    <th class="text-center">참여일</th>
                    <th class="text-center">연속출석일수</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <script src="./resource/js/event.js"></script>
</body>
</html>
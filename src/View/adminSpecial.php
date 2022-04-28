<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./resource/js/jquery-3.6.0.min.js"></script>
    <script src="./resource/bootstrap-4.6.1-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="./resource/bootstrap-4.6.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="./resource/css/style.css">
</head>
<body>
    <div class="background mb-5">
        <img src="./resource/img/photo(23).jpg" alt="특산품 배경 이미지">
        <h1 class="text">특산품 관리</h1>
    </div>
    <div class="container admin-s">
        <div class="box my-5">
            <?php foreach($data as $item) : ?>
                <div class="item">
                    <img src="./resource/img/special/<?= $item->image ?>" alt="특산품 이미지">
                    <span class="my-4"><?= $item->location ?> / <?= $item->name ?></span>
                    <button class="btn btn-success" data-id="<?= $item->id ?>">관리</button>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="modal fade" id="edit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">특산품 관리</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/edit" enctype="multipart/form-data">
                            <input type="text" name="id" hidden>
                            <div class="mb-3">
                                <label for="special" class="form-label">특산품</label>
                                <input type="text" name="special" id="special" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">사진</label>
                                <input type="file" name="photo" id="photo" class="form-control mb-3">
                                <p>선택하지 않을시 변경 없음</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cl">닫기</button>
                                <button type="submit" class="btn btn-primary chk">변경</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./resource/js/special.js"></script>
</body>
</html>
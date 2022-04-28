<?php
    namespace Controller;
    use App\DB;
    use DateTime;

    class ActionController {
        function enrollEvent() {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $score = $_POST['score'];

            $toDay = date("Y-m-d");

            $chk = DB::fetch("SELECT * FROM event WHERE phone = ? AND att = ?", [$phone, $toDay]);
            $dchk = DB::fetch("SELECT att, inatt FROM event WHERE phone = ? ORDER BY att DESC LIMIT 1", [$phone]);

            if($chk) {
                $arr = ["Header"=>"Response code:401", "Body"=>["message"=>"하루에 한번만 참여할 수 있습니다."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            } else if (!$chk) {
                $sd = new DateTime($dchk->att);
                $ed = new DateTime($toDay);

                if(date_diff($sd, $ed)->days == 1) {
                    DB::query("INSERT INTO event (name, phone, score, inatt) VALUES (?, ?, ?, ?)", [$name, $phone, $score, (int)$dchk->inatt += 1]);
                    $arr = ["Header"=>"Response code:200", "Body"=>["message"=>"이벤트에 참여해 주셔서 감사합니다."]];
                    echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
                } else {
                    DB::query("INSERT INTO event (name, phone, score) VALUES (?, ?, ?)", [$name, $phone, $score]);
                    $arr = ["Header"=>"Response code:200", "Body"=>["message"=>"이벤트에 참여해 주셔서 감사합니다."]];
                    echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
                }
            } else {
                $arr = ["Header"=>"Response code:401", "Body"=>["message"=>"오류가 발생했습니다. 다시 시도해 주세요."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            }
        }

        function getStamps($phone) {
            $stamps = [];
            $data = DB::fetchAll("SELECT att FROM event WHERE phone = ? ORDER BY att", [$phone]);
            

            foreach($data as $item) {
                if($stamps == []) {
                    array_push($stamps, $item->att);
                } else {
                    if(date_diff(date_create(end($stamps)), date_create($item->att))->days == 1) {
                        array_push($stamps, $item->att);
                    } else {
                        $stamps = [$item->att];
                    }
                }
            }

            if($stamps == []) {
                $arr = ["Header"=>"Response code:404", "Body"=>["message"=>"출석정보가 없습니다."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            } else if ($stamps != []) {
                $arr = ["Header"=>"Response code:200", "Body"=>["stamps"=>array_slice($stamps, -3, 3)]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            } else {
                $arr = ["Header"=>"Response code:401", "Body"=>["message"=>"오류가 발생했습니다. 다시 시도해 주세요."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            }
        }

        function review() {
            $name =@ $_POST['name'];
            $product =@ $_POST['product'];
            $shop =@ $_POST['shop'];
            $purchaseDate =@ $_POST['purchaseDate'];
            $contents =@ $_POST['contents'];
            $score =@ $_POST['score'];
            $jpg =@ $_POST['jpg'];

            if(empty($name) || empty($product) || empty($shop) || empty($purchaseDate) || empty($contents) || $jpg == '0') {
                $arr = ["Header"=>"Response code:401", "Body"=>["message"=>"필수 입력값이 누락 되었습니다."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            } else if($name && $product && $shop && $purchaseDate && $contents && $score) {
                DB::query("INSERT INTO review (name, product, shop, purdate, contents, score) VALUE (?, ?, ?, ?, ?, ?)", [$name, $product, $shop, $purchaseDate, $contents, $score]);

                $arr = ["Header"=>"Response code:200", "Body"=>["message"=>"구매 후기가 등록되었습니다."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            } else {
                $arr = ["Header"=>"Response code:401", "Body"=>["message"=>"오류가 발생했습니다. 다시 시도해 주세요."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            }
        }

        function getReview($id) {
            $data = DB::fetch("SELECT * FROM review WHERE id = ?", [$id]);

            if($data != []) {
                $photos = [];
                foreach(explode(",", $data->image) as $item) {
                    array_push($photos, (object) ["file"=>$item]);
                }

                $data->photos = $photos;
                unset($data->image);
                $arr = ["Header"=>"Response code:200", "Body"=>$data];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            } else {
                $arr = ["Header"=>"Response code:404", "Body"=>["message"=>"구매후기를 찾을 수 없습니다."]];
                echo json_encode($arr, JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
            }
        }

        function getReviews() {
            $lastKey = isset($_GET['last-key']) ? $_GET['last-key'] : 0;
            $data = DB::fetchAll("SELECT *, left(contents, 50) AS contents FROM review ORDER BY purdate DESC, id DESC LIMIT ".$lastKey.", 10");
            foreach($data as $item) {
                $item->image = explode(",",$item->image)[0];
            }

            if($data != []) {
                $arr = ["Header"=>"Response code:200", "Body"=>["reviews"=>$data]];     
                echo json_encode($arr);
            } else {
                $arr = ["Header"=>"Response code:401", "Body"=>["message"=>"오류가 발생했습니다. 다시 시도해 주세요."]];     
                echo json_encode($arr);
            }
        }

        function reviewImage() {
            $file = $_FILES['image'];
            $dir = ROOT."/public/resource/uploadimg/";
            $watermark = ROOT."/public/resource/img/watermark.png";
            $imgname = [];

            for($i = 0; $i < count($file['name']); $i++) {
                $filename = time().$file['name'][$i];
                move_uploaded_file($file['tmp_name'][$i], $dir.$filename);

                array_push($imgname, $filename);
    
                list($w, $h) = getimagesize($dir.$filename);
                list($ww, $wh) = getimagesize($watermark);

                $imp = imagecreatetruecolor(500, 500);
                $img = imagecreatefromjpeg($dir.$filename);
                
                imagealphablending($img, true);
                $watermark_img = imagecreatefrompng($watermark);
                imagealphablending($imp, true);
                $x = ceil(($w - $ww) / 2);
                $y = ceil(($h - $wh) / 2);
                imagecopy($img, $watermark_img, $x, $y, 0, 0, $ww, $wh);
                imagejpeg($img, $dir.$filename, 100);

                imagecopyresampled($imp, $img, 0, 0, 0, 0, 500, 500, $w, $h);
                imagejpeg($imp, $dir.$filename, 100);
                imagedestroy($imp);
            }

            $str = join(',',$imgname);
            DB::query("UPDATE review SET image = ? ORDER BY id DESC LIMIT 1", [$str]);
            echo "";
        }

        function adminLoginchk() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];

            if($id == "admin" && $pass == "1234") {
                $_SESSION['user'] = "admin";
                go('관리자로 로그인 되었습니다.', '/admin');
            } else {
                go('관리자 정보가 일치하지 않습니다.', '/admin');
            }
        }

        function getEvent() {
            $date = $_POST['date'];
            $data = DB::fetchAll("SELECT * FROM event WHERE att = ?", [$date]);
            foreach($data as $item) {
                $inatt = DB::fetch("SELECT inatt FROM event WHERE phone = ? ORDER BY inatt DESC LIMIT 1", [$item->phone]);
                $item->inatt = $inatt->inatt;
            }

            echo json_encode($data);
        }

        function edit() {
            $id = $_POST['id'];
            $name = $_POST['special'];
            $chk = $_FILES['photo']['size'];

            if($chk) {
                $photo = $_FILES['photo'];
                $type = explode("/", $photo['type']);
                if($type[0] != "image" && $type[1] != 'jpg' && $type[1] != 'png' && $type[1] != 'jpeg') {
                    go("이미지 파일만 업로드 할 수 있습니다.", '/special');
                }
                $fileName = time().$photo['name'];
                $dir = ROOT."/public/resource/img/special/";
                move_uploaded_file($photo['tmp_name'], $dir.$fileName);
                DB::query("UPDATE specialties SET name = ?, image = ? WHERE id = ?", [$name, $fileName, $id]);
                go("정보가 변경 되었습니다.", '/special');
            } else {
                DB::query("UPDATE specialties SET name = ? WHERE id = ?", [$name, $id]);
                go("정보가 변경 되었습니다.", '/special');
            }
        }
    }
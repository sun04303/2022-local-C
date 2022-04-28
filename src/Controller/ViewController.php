<?php
    namespace Controller;
    use App\DB;
use stdClass;

    class ViewController {
        function main() {
            view("main");
        }

        function sub1() {
            $data = DB::fetchAll("SELECT * FROM specialties");
            $arr = new stdClass();
            foreach($data as $item) {
                $location = $item->location;
                $arr->$location = ["name"=>$item->name, "image"=>$item->image];
            }
            view("sub1", $arr);
        }

        function sub2() {
            view("sub2");
        }

        function sub3() {
            view("sub3");
        }

        function admin() {
            view("admin");
        }

        function adminEvent() {
            if(!isset($_SESSION['user'])) {
                go('관리자 권한이 필요합니다.', '/');
            } else {
                view("adminEvent");
            }
        }

        function adminSpecial() {
            if(!isset($_SESSION['user'])) {
                go('관리자 권한이 필요합니다.', '/');
            } else {
                $data = DB::fetchAll("SELECT * FROM specialties ORDER BY location");
                view("adminSpecial", $data);
            }
        }
    }
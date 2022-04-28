<?php
    function view($page, $data = []) {
        require VIEW."/$page.php";
        exit;
    }

    function go($msg, $url) {
        echo "<script>";
        echo "alert('{$msg}');";
        echo "location.href = '$url';";
        echo "</script>";
        exit;
    }

    function extname($filename) {
        return strtolower(substr($filename, strrpos($filename, '.')));
    }
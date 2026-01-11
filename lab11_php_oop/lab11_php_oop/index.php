<?php
/**MUHAMMAD SAID ABIMANYU**/
include "config.php";
include "class/Database.php";
include "class/Form.php";
session_start();

$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/artikel/index';
$segments = explode('/', trim($path, '/'));
$mod = isset($segments[0]) && $segments[0] != '' ? $segments[0] : 'artikel';
$page = isset($segments[1]) && $segments[1] != '' ? $segments[1] : 'index';
$file = "module/{$mod}/{$page}.php";

include "template/header.php";
if (file_exists($file)) {
    include $file;
} else {
    echo '<div style="color:red">Modul tidak ditemukan: ' . $mod . '/' . $page . '</div>';
}
include "template/footer.php";
?>
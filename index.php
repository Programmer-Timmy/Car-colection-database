<?php
include 'requierd.php';
if(isset($_SERVER['REDIRECT_URL'])) {
    $filename = substr($_SERVER['REDIRECT_URL'], 1);
} else {
    $filename = 'home';
}
if($filename == ''){
	$filename = 'home';
}
if (file_exists($filename.'.php')) {
  	include($filename.'.php');
}elseif (file_exists($filename.'.html')) {
  	include($filename.'.html');
}else{
  	include('404.php');
}

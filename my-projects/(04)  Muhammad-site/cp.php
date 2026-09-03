<?php
// عند استدعاء هذا الملف يتم منع غير الاعضاء من دخول هذه الصفحه
require 'auth.php';

// الترحيب بالعضو
echo 'welcome ' . $_SESSION['username'];

if(isset($_POST['logout'])){
	unset($_SESSION['username']);
	header("Location: login.php");
	exit();
}


?>
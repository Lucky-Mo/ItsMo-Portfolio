<?php
require 'db.php';


// هنا اضفنا دالة الشرط للتحقق من ضغط زر signup
if(isset($_POST['signup'])){
	// عند تحقق الضغط يتم تخزين حقول البيانات فى متغيرات 
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	
	// هنا قمنا بانشاء استعلام لقاعدة البيانات لاضافة بيانات العضو الى الجدول
	// عامود id يتم ملئه اوتوماتيكيا كما اخترنا فى البدايه
	$qu = "insert into users (username,password,email) value ('$user','$pass','$email')";
	
	// التحقق من نجاح الاستعلام 
	if(mysqli_query($con, $qu)){
		echo 'تم انشاء الحساب بنجاح يمكنك تسجيل الدخول الان';
		
	}
	
}






?>
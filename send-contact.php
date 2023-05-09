<?php 
$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$comment = $_POST['message'];

$to = "igor.kolivushka47@gmail.com";
$subject = "Напишите нам";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "From: <stastimofeew98@gmail.com>\r\n";

$message .= "Имя пользователя: ".$name."\n\n";
$message .= "Телефон: ".$tel."\n\n";
$message .= "Email: ".$email."\n\n";
$message .= "Сообщение: ".$comment."\n\n";

$send = mail($to, $subject, $message, $headers);

if ($send == "true")
{
	echo "Ваше сообщение отправлено. Мы перезвоним Вам в ближайшее время.";
    
}  
else
{
	echo "Не удалось отправить, попробуйте снова!";
}

?>
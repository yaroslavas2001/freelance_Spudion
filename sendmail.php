<?php
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);
    $mail -> CharSet = "UTF-8";
    $mail -> setLanguage("ru","phpmailer/language");
    $mail -> IsHTML(true);

    //от кого письмо
    $mail -> setFrom("endurancei@mail.ru","Ваня");
    //Кому письмо
    $mail -> addAddress("endurancei@mail.ru");
    //тема письма
    $mail -> Subject = "Это отправка формы";

    $body = "<h1>Форма</h1>";

if(trim(!empty($_POST['name']))){
    $body.="<p>Имя".$_POST['name']."</p>";
}
if(trim(!empty($_POST['email']))){
    $body.="<p>Email".$_POST['email']."</p>";
};

$mail ->Body =$body;

//отпраляем
if(!$mail->send()){
    $massage="ошибка";
} else {
    $massage="все ок";
}

$response =["message"=>$massage];

header("Content-type: application/json");
echo json_encode($response);
?>
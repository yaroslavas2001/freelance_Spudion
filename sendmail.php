<?php
    use PHPMailer\PHPMailer\Exception.php;
    use PHPMailer\PHPMailer\PHPMailer.php;

    require "phpmailer/src/Exception.php";
    require "phpmailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);
    $mail -> CharSet = "UTF-8";
    $mail -> setLanguage("ru","phpmailer/language");

    //от кого письмо
    $mail -> setForm("yaroslavas2001@list.ru","Ярослава");
    //Кому письмо
    $mail -> addAddress("yaroslavas2001@list.ru");
    //тема письма
    $mail -> Subject = "Это отправка формы";

    $body = "<h1>Форма</h1>"

    if(trim(!empty($_POST["name"]))){
        $body.="<p>Имя".$_POST["name"]."</p>";
    }
    if(trim(!empty($_POST["email"]))){
        $body.="<p>Email".$_POST["email"]."</p>";
    }

$mail ->Body =$body;

//отпраляем
if(!mail->send()){
    $massage="ошибка"
}else{
    $massage="все ок"
}

$response =["message"=>$massage];

header("Content-type: application/json");
echo json_encode($response);
?>
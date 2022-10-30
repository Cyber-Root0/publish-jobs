<?php

require_once 'class/mail/PHPMailer.php';
require_once 'class/mail/SMTP.php';
require_once 'class/mail/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function SendEmail($emails,$assunto,$mensagem){
$mail = new PHPMailer(true);
$emails=$emails;
$assunto=$assunto;
$mensagem=$mensagem;

    try {
        foreach($emails as $user){
            $mail->AddCC($user["email"],$user["nome"]);
        }
        $mail->SMTPDebug = 0;                     
        $mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Host='tls://smtp.gmail.com';
        $mail->Username='companyjobs.contact@gmail.com';
        $mail->Password='';
        $mail->Port=587;
        $mail->setFrom('companyjobs.contact@gmail.com','Company Jobs');
        $mail->addReplyTo('companyjobs.contact@gmail.com','Company Jobs');
       // $mail->addAddress($destino,"");
        $mail->IsHTML(true);
        $mail->CharSet='UTF-8';
        $mail->Subject=$assunto;
        $mail->Body=$mensagem;
        $envia=$mail->Send(); 
        return true;
    } catch (Exception $e) {
        //echo $e;
        return false;
    
    }
}


?>

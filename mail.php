<?php

require("./vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;


function sendMail($subject, $body, $email, $name, $html = false) {

  // Configuración de nuestro sevidor de correos
  $phpmailer = new PHPMailer();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = '';
  $phpmailer->Password = '';

  // Añadimos destinatarios
  $phpmailer->setFrom('from@example.com', 'Mailer');
  $phpmailer->addAddress($email, $name);     //Add a recipient

  //Content
  $phpmailer->isHTML($html);                                  //Set email format to HTML
  $phpmailer->Subject = $subject;
  $phpmailer->Body    = $body;

  // Send the email
  $phpmailer->send();

}


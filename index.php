<?php

require("./mail.php");

function validateForm ($name, $email, $subject, $message, $form) {
  return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if ( isset($_POST["form"]) ) {
  if ( validateForm(...$_POST) ) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Mandar el correo
    sendMail($subject, $message, $email, $name);
    $status = "success";
  } else {
    $status = "danger";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de contacto</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <?php if($status == "danger"): ?>

  <div class="alert danger">
    <span>Surgió un problema</span>
  </div>

  <?php elseif($status == "success"): ?>

  <div class="alert success">
    <span>¡Mensaje enviado con éxito!</span>
  </div>

  <?php endif; ?>

  <section class="contact-section">
    
    <div class="contact__dark-part">

      <form class="contact-form" action="./" method="POST" autocomplete="off">
        
        <h2>Contactanos!</h2>
        <div class="input-group">
          <label for="name">Nombre:</label>
          <input type="text" name="name" id="name">
        </div>
        <div class="input-group">
          <label for="email">Email:</label>
          <input type="email" name="email" id="email">
        </div>
        <div class="input-group">
          <label for="subject">Asunto:</label>
          <input type="text" name="subject" id="subject">
        </div>
        <div class="input-group">
          <label for="message">Mensaje:</label>
          <textarea name="message" id="message" cols="30" rows="10"></textarea>
        </div>
        <div class="button-container">
          <button name="form" type="submit">Enviar</button>
        </div>
    
      </form>

    </div>

    <div class="contact__white-part">

      <div class="contact-info">

        <h2>Información de contacto</h2>
        <div class="contact-info__direction">
          <p>13 Saw Mill circle</p>
          <p>North Olmested</p>
          <p>Providencia</p>
        </div>
        <div class="contact-info__schedule">
          <p>Llamanos al +33 006 98 87 76 34</p>
          <p>Abrimos de Lunes a Sabado</p>
          <p>8:00 AM - 8:00 PM</p>
        </div>


      </div>

    </div>

  </section>






</body>
</html>
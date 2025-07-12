<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['reply'];

  $mail = new PHPMailer(true);

  try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'waleedrehman2007@gmail.com';
    $mail->Password   = 'lqup phhh bain wkji'; // App password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('waleedrehman2007@gmail.com', 'Admin');
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Reply from Admin';
    $mail->Body = "
      <h4>New Message Received</h4>
      <p><strong>Name:</strong> $name</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Message:</strong><br>$message</p>
    ";

    $mail->send();
    echo "<script>
      alert('Email has been sent successfully');
      window.location.href = 'messages.php';
    </script>";
  } catch (Exception $e) {
    echo "<script>
      alert('Message could not be sent. Error: {$mail->ErrorInfo}');
      window.location.href = 'messages.php';
    </script>";
  }
}
?>

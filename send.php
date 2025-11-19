<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $to_email = $_POST['receiver_email'];
    $subject = $_POST['subject'] ?? 'رسالة جديدة';
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mbdwy33603@gmail.com';
        $mail->Password   = 'mmlmxanbsetloyhl';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('mbdwy33603@gmail.com', 'Mailer');
        $mail->addAddress($to_email, $name);

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'تم إرسال الرسالة بنجاح!';
    } catch (Exception $e) {
        echo "حدث خطأ: {$mail->ErrorInfo}";
    }
}
?>
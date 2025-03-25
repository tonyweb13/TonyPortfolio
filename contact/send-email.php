<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $mobile = htmlspecialchars($_POST["mobile"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'TonyCode1306@gmail.com';
        $mail->Password = 'atan mfnz jyfj nqdt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Content
        $mail->setFrom($email, "$firstname $lastname");
        $mail->addAddress('TonyCode1306@gmail.com');
        $mail->addReplyTo($email, "$firstname $lastname");

        $mail->Subject = "TonyPortfolio from $firstname $lastname";
        $mail->Body = "Name: $firstname $lastname\nEmail: $email\nMobile: $mobile\nMessage:\n$message";

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error: {$mail->ErrorInfo}";
    }
}
?>

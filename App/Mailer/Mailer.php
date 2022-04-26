<?php

namespace App\Mailer;

class Mailer
{
    public function sendConfirmationMail($email, $token)
    {
        require '../App/Configuration/mailer-config.php';
        $mail = new PHPMailer(true);

        $subject = "Confirm your DAWN FM account";
        $message = "Make a painless transition via this link: https://www.radiodawn.fm/confirmation/" . $token;

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->addAddress($email);
            $mail->Username = MAILER_EMAIL;
            $mail->Password = MAILER_PASSWORD;
            $mail->setFrom(MAILER_EMAIL, 'DAWN FM HQ');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = $message;
            $mail->Send();
        } catch (Exception $e) {
            $msg = "
            " . $e->errorMessage() . "
            ";
        }
    }
}

<?php

namespace App\Mailer;

class Mailer
{
    public function initSendMail($subject, $message, $email)
    {
        $mail = new PHPMailer(true);
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
            throw new \Exception($msg);
        }
    }

    public function sendConfirmationMail($email, $token)
    {
        require '../App/Configuration/mailer-config.php';

        $subject = "Confirm your DAWN FM account";
        $message = "Make a painless transition via this link: " . WEBSITE_URL . "/confirmation/" . $token;

        $this->initSendMail($subject, $message, $email);
    }

    public function sendRecoveryMail($email, $token)
    {
        require '../App/Configuration/mailer-config.php';

        $subject = "Recover your password from DAWN FM account";
        $message = "Recover your password via this link: " . WEBSITE_URL . "/new-password/" . $token;

        $this->initSendMail($subject, $message, $email);
    }
}

<?php
namespace App\Utility;
use PHPMailer\PHPMailer\PHPMailer;


/**
 * @author Raul Remesal van Merode
 */
class Mail
{
    private $mail;
    private array $recipients;

    /**
     * @param the recipient who is to receive the mail
    */
    public function __construct($recipient)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = env("MAIL_FROM_ADDRESS");
        $mail->Password = env("MAIL_PASSWORD");
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->isHTML();


        $mail->From = env("MAIL_FROM_ADDRESS");
        $mail->addAddress($recipient);

        $this->mail = $mail;
        $this->recipients = [];

    }

    public function addRecipient($recipient_email, $recipient_name = "") {
        // $this->mail->addAddress($recipient_email, $recipient_name);
        $recipient = [
            'recipient_name' => $recipient_name,
            'recipient_email' => $recipient_email,
        ];

        array_push($this->recipients, $recipient);
    }

    public function setSubject($subject) {
        $this->mail->Subject = $subject;
    }

    public function setBody($body) {
        $this->mail->Body = $body;
    }

    public function sendMail() {
        foreach($this->recipients as $recipient) {
            $this->mail->addAddress($recipient["recipient_email"], $recipient["recipient_name"]);
        }
        $this->mail->send();
    }

}
?>

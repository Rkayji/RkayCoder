<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
class DemoModel
{    
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function smtp_mailer($to, $subject, $msg)
    {
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer();

        //Server settings
        // $mail->SMTPDebug = 3;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'type';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Username = 'mrrkayj86@gmail.com';
        $mail->Password = 'R1998kayji';
        $mail->SetFrom('mrrkayj86@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false,
            ]
        ];
        if (!$mail->send())
            // return $mail->ErrorInfo;
            return false;
        else
            return true;
    }
}

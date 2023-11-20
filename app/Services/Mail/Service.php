<?php

namespace App\Services\Mail;

use Throwable;

use App\Mail\Contact\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class Service
{
    public function sendContactMailProd(array $data = [])
    {

        try {
            Mail::to('hometvyerevan@gmail.com')->send(new ContactMail($data));
            return true;
        } catch (Throwable  $e) {
            $validator = Validator::make(
                ["failed" => null],
                ["failed" => "array"],
                ["failed.array" => "Mail cann't be sent, Try again later."]
            )->validated();
        }
    }


    // public function sendContactMailProd($data)
    // {

    //     require base_path("vendor/autoload.php");

    //     //Create an instance; passing `true` enables exceptions
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'hometvyerevan@gmail.com';                     //SMTP username
    //         $mail->Password   = 'ijntuarcrwovpmou';                               //SMTP password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //         $mail->CharSet    = 'UTF-8';

    //         //Recipients
    //         // $mail->setFrom('hometvyerevan@gmail.com', 'Blog');
    //         $mail->addAddress('hometvyerevan@gmail.com', 'Blog');     //Add a recipient


    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'From Blog site, contact form';
    //         $mail->Body    = 'Email: ' . $data['contact_email'] . '<br><br>' . 'Message: ' . '<br>' . $data['contact_message'];

    //         $mail->send();
    //         if (!$mail->send()) {
    //             return false;
    //         } else {
    //             return true;
    //         }
    //     } catch (Exception $e) {
    //         return false;
    //         // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // }

    // public function sendContactMailDev($data)
    // {
    //     // Mail::to('admin-blog@gmail.com')->send(new Contact($data));
    // }
}

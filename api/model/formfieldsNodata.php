
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  require '../vendor/autoload.php';

class FormFields {
    public $subject;
    public $contact_name;
    public $contact_email;
    public $contact_question;

    public function sendEmailForm() {
      
        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');

       
        $this->subject=htmlspecialchars(strip_tags($this->subject));
        $this->contact_name=htmlspecialchars(strip_tags($this->contact_name));
        $this->contact_email=htmlspecialchars(strip_tags($this->contact_email));
        $this->contact_question=htmlspecialchars(strip_tags($this->contact_question));
                
        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        //Set the hostname of the mail server
        $mail->Host = 'smtp.myserver.com';
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 25;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = 'email@server.com';
        //Password to use for SMTP authentication
        $mail->Password = 'password';
        //Set who the message is to be sent from
        $mail->setFrom('info@example.com', 'My Company Name');
        //Set an alternative reply-to address
        $mail->addReplyTo('info@example.com', 'My Company Name');
        //Set who the message is to be sent to
        $mail->addAddress('user@example.com', 'John Doe');
        //Set the subject line
        //$mail->Subject = 'PHPMailer SMTP test';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        $mail->Subject = 'Contact form: ' . $this->subject;
        $mail->Body = '<div>Name: ' . $this->contact_name .'</div><div><div>Email: ' .$this->contact_email . '</div><div>Question: ' . $this->contact_question . '</div>';
        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
}
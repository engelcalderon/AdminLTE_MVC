<?php

require_once "lib/phpmailer/src/Exception.php";
require_once "lib/phpmailer/src/PHPMailer.php";
require_once "lib/phpmailer/src/SMTP.php";
require_once "lib/phpmailer/src/OAuth.php";


class EmailController {
    public function sendEmailSMTP() {

        // var_dump($_POST);
        if (isset($_POST["email"]) && isset($_POST["asunto"]) 
        && isset($_POST["mensaje"]) && isset($_POST["SMTPname"]) &&
        isset($_POST["SMTPemail"]) && isset($_POST["SMTPserver"]) &&
        isset($_POST["SMTPport"]) && isset($_POST["SMTPpassword"])) {

            $email = $_POST["email"];
            $asunto = $_POST["asunto"];
            $mensaje = $_POST["mensaje"];
            $SMTPname = $_POST["SMTPname"];
            $SMTPemail = $_POST["SMTPemail"];
            $SMTPserver = $_POST["SMTPserver"];
            $SMTPport = $_POST["SMTPport"];
            $SMTPpassword = $_POST["SMTPpassword"];

            $correo = new PHPMailer(true);

            try {
                $correo->SMTPDebug = 1;
                $correo->isSMTP();
                $correo->Host = $SMTPserver;
                $correo->SMTPAuth = true;
                $correo->Username = $SMTPemail;
                $correo->Password = $SMTPpassword;
                $correo->SMTPSecure = 'tls';
                $correo->Port = $SMTPport;
            }
            catch(Exception $e) {
                echo $e;
            }
            
            $correo->SetFrom($SMTPemail, $SMTPname);
            $correo->AddReplyTo($SMTPemail, $SMTPname);
            $correo->AddAddress($email, $email);

            $correo->Subject = $asunto;

            foreach ($_FILES["files"]["name"] as $k => $v) {
                $correo->AddAttachment( $_FILES["files"]["tmp_name"][$k], $_FILES["files"]["name"][$k] );
            }

            $correo->MsgHTML($mensaje);

            if (!$correo->Send()) {
                echo "error";
            }
            else {
                echo "Enviado";
            }
        }
        
    }

    public function sendEmailFREE() {
        if (isset($_POST["email"]) && isset($_POST["asunto"]) 
        && isset($_POST["mensaje"]) && isset($_POST["FROMname"]) &&
        isset($_POST["FROMemail"])) {

            $email = $_POST["email"];
            $asunto = $_POST["asunto"];
            $mensaje = $_POST["mensaje"];
            $FROMname = $_POST["FROMname"];
            $FROMemail = $_POST["FROMemail"];

            try {
                $name = @trim(stripslashes($FROMname));
                $from = @trim(stripslashes($FROMemail));
                $subject = @trim(stripslashes($asunto));
                $message = @trim(stripslashes($mensaje));

                $to = $email;

                $headers = array();
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-Type: text/plain; charset=iso-8859-1";
                $headers[] = "From: {$name} <{$from}>";
                $headers[] = "Reply-To: <{$from}>";
                $headers[] = "Subject: {$subject}";
                $headers[] = "X-Mailer: PHP/".phpversion();

                $sendEmail = mail($to, $subject, $message, implode("\r\n", $headers));

                if (!$sendEmail) {
                    echo "Error";
                }
                else {
                    echo "Enviado";
                }
            }
            catch(Exception $e) {
                echo $e;
            }

        }
    }
}

?>
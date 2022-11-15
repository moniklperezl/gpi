<?php
if(isset($_POST['email'])) {
 
    // 
 
    $email_to = "xperea@gpiprofesionales.com";
 
    $email_subject = "Contacto desde Web";
 
    function died($error) {
 
        // error messages
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        
        echo $error."<br /><br />";
 
      
        die();
    }
 
    // Field validation
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['email']) ||
  
        !isset($_POST['message'])) {
 
        die('Lo sentimos pero parece haber un problema con los datos enviados.');
 
    }
 //Variable
 
    $name = $_POST['name']; // requerido
 
    $phone = $_POST['phone']; // requerido
 
    $email_from = $_POST['email']; // requerido
  
    $message = $_POST['message']; // requerido
 
    $error_message = "";
 
//message content
 
    $email_message = "Contenido del Mensaje.\n\n";
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 
 
    $email_message .= "Nombre: ".clean_string($name)."\n";
 
    $email_message .= "Telefono: ".clean_string($phone)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n"; 

    $email_message .= "Mensaje: ".clean_string($message)."\n";
 
 
//mail headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);
 
?>
 
 
 
<!-- Message that was sent-->
 
Gracias! Nos pondremos en contacto contigo a la brevedad
 
<?php
 
}
 
?>
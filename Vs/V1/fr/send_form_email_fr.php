<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "chouli_souad@yahoo.fr";
    $email_subject = "[un email du site]";


    function died($error) {
        // your error code can go here
        echo "Nous sommes désolés, il y a des erreurs dans dans le formulaire que vous avez envoyé.";
        echo " Les erreurs suivantes :<br /><br />";
        echo $error."<br /><br />";
        echo "Veuillez retourner au formulaire pour les corriger.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Nous sommes désolés, il y a des erreurs dans dans le formulaire que vous avez envoyé.');
    }

    $first_name = $_POST['first_name']; // not required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Votre adresse Email n\'est pas valide.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'Le nom que vous avez mis n\'est pas valide.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'Le champs commantaire n\'est pas valide.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Prénom : ".clean_string($first_name)."\n";
    $email_message .= "Nom : ".clean_string($last_name)."\n";
    $email_message .= "Email : ".clean_string($email_from)."\n";
    $email_message .= "Telephone : ".clean_string($telephone)."\n";
    $email_message .= "Commentaire : ".clean_string($comments)."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

Merci pour nous avoir contacté. Nous allons vous répondre le plutôt possible.

<?php
}
?>

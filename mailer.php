<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$name = strip_tags(trim($_POST['name']));
	$name = str_replace(array("\r","\n"),array(" "," "),$name);
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
	$subject = strip_tags(trim($_POST['subject']));
	$subject = str_replace(array("\r", "\n"), array(" ", " "), $subject);
	$message = strip_tags(trim($_POST['message']));

	if(!empty($name) && !empty($subject) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$recipient = "info@csenotes.in";
		$content = "Name: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Message:\n$message\n";
		$header = "From: $name <$email>";
		if(mail($recipient, $subject, $content, $header)){
			echo "Thank You! Your message has been sent.";
		}
		else{
            echo "Oops! Something went wrong and we couldn't send your message.";
		}
	}else{
        echo"Oops! There was a problem with your submission. Please complete the form and try again.";
        exit;
	}
}


?>
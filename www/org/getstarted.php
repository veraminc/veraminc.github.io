<?php 
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $company = htmlspecialchars($_POST['company']);
	$hostcount = htmlspecialchars($_POST['hostcount']);
        $from = 'GetStarted';
        $to = 'contact@veramine.com'; 
        $subject = "Get Started [$name]";
        
        $body = "Name: $name\nE-Mail: $email\nCompany: $company\nHost count: $hostcount\n";
 
        // Check if email has been entered and is valid
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        } else {
	    if (mail ($to, $subject, $body, $from)) {
		// $result='<div class="alert alert-success">Thank You! We will prepare your sensor.</div>';
	    } else {
		// $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	    }
	}

        header("Location: http://veramine.com/");
?>


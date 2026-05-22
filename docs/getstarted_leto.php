<?php 
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $company = htmlspecialchars($_POST['company']);
        $hostcount = htmlspecialchars($_POST['hostcount']);
        $from = 'GetStarted';
        $to = 'contact@veramine.com'; 
        $subject = "Get Started [$firstname $lastname]";

        if (!isset($_POST['firstname']) || empty($_POST['firstname'])) {
	    $errorcode = '1';
        }

        if (!isset($_POST['lastname']) || empty($_POST['lastname'])) {
	    $errorcode = '2';
        }

        if (!isset($_POST['company']) || empty($_POST['company'])) {
	    $errorcode = '3';
        }

        if (!isset($_POST['hostcount']) || empty($_POST['hostcount'])) {
	    $errorcode = '4';
        }

        if (!isset($_POST['email']) || empty($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    $errorcode = '5';
	}

        $body = "First Name: $firstname\n Last Name: $lastname\n E-Mail: $email\n Company: $company\n Host count: $hostcount\n";

        // Check if all fields are valid
        if (!$errorcode) {
	       if (mail ($to, $subject, $body, $from)) {
               // ok
	       } else {
	         $errorcode = '6';
	       }
	}
     
        if (!$errorcode) {
            header("Location: http://veramine.com/index_leto.html");
	}else{
	    header("Location: http://veramine.com/error.html");
            //$result='<div class="alert alert-success">Something went wrong, please enter valid data!</div>';
	    //echo $result;
	}
?>

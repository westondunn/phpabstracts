<?php
/********************************************************
 *
 *	phpAbstracts
 *  http://www.phpabstracts.com
 *
 *  For copyright and license information, see readme.txt
 *
*********************************************************/



	//Include commonly used variables
	include('vars.php');
	
	//Database Connection Variables
	include('db.php');
	
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	
	//Capture form fields to variables
	
	$title=$_POST['title'];
	$author1=$_POST['author1'];
	$organization1=$_POST['organization1'];
	$author2=$_POST['author2'];
	$organization2=$_POST['organization2'];
	$author3=$_POST['author3'];
	$organization3=$_POST['organization3'];
	$author4=$_POST['author4'];
	$organization4=$_POST['organization4'];
	$author5=$_POST['author5'];
	$organization5=$_POST['organization5'];
	$author6=$_POST['author6'];
	$organization6=$_POST['organization6'];
	$format=$_POST['format'];
	$language=$_POST['language'];
	$presenter=$_POST['presenter'];
	$background=$_POST['background'];
	$purpose=$_POST['purpose'];
	$methods=$_POST['methods'];
	$findings=$_POST['findings'];
	$conclusion=$_POST['conclusion'];
	$word_count=$_POST['word_count'];
	$name=$_POST['name'];
	$email1=$_POST['email1'];
	$email2=$_POST['email2'];
	$phone1=$_POST['phone1'];
	$phone2=$_POST['phone2'];
	$fax=$_POST['fax'];
	$address=$_POST['address'];
	$topic=$_POST['topic'];
	$country=$_POST['country'];
	
	$date = date("F j, Y, g:i a");
	
	
	
	
	//Store into database
	
	$query = "INSERT INTO abstracts VALUES ('', '$date', '$title', '$author1', '$organization1', '$author2', '$organization2', '$author3', '$organization3', '$author4', '$organization4', '$author5', '$organization5', '$author6', '$organization6', '$format', '$language', '$presenter', '$background', '$purpose', '$methods', '$findings', '$conclusion', '$word_count', '$name', '$email1', '$email2', '$phone1', '$phone2', '$fax', '$address', '$topic', '$country', 'Unfiled', '', '' )";
	
	mysql_query($query) or die(mysql_error()); 
		
	
	// Grab ID Number
	$abstract_id = mysql_insert_id();	
	
	
	mysql_close();
	
	
	if(get_magic_quotes_gpc()) {
		$title=stripslashes($title);
		$author1=stripslashes($author1);
		$organization1=stripslashes($organization1);
		$author2=stripslashes($author2);
		$organization2=stripslashes($organization2);
		$author3=stripslashes($author3);
		$organization3=stripslashes($organization3);
		$author4=stripslashes($author4);
		$organization4=stripslashes($organization4);
		$author5=stripslashes($author5);
		$organization5=stripslashes($organization5);
		$author6=stripslashes($author6);
		$organization6=stripslashes($organization6);
		$presenter=stripslashes($presenter);
		$background=stripslashes($background);
		$purpose=stripslashes($purpose);
		$methods=stripslashes($methods);
		$findings=stripslashes($findings);
		$conclusion=stripslashes($conclusion);
		$name=stripslashes($name);
		$address=stripslashes($address);
		$topic=stripslashes($topic);
		$country=stripslashes($country);
	}
	
		
	//Send e-mail to recipient
	
	$to2 = $email1;
	$subject2 = "Abstract Submission Form: " . $abstract_id;
	$body2 = $date . "\nAbstract ID: " . $abstract_id . 
			"\n\nThank you for your abstract submission. We acknowledge receipt." . 
			"\n\nPlease note your Abstract ID above. A copy of your abstract is included below. " . 
			"\n\nThank you." .
			"\n\nTITLE\n" . $title . "\n\nAUTHORS\nAuthor 1: " . $author1 . "\nOrganisation 1: " . $organization1;		
	if ($author2)
		$body2 = $body2 . "\nAuthor 2: " . $author2 . "\nOrganization 2: " . $organization2;
	if ($author3)
		$body2 = $body2 . "\nAuthor 3: " . $author3 . "\nOrganization 3: " . $organization3;
	if ($author4)
		$body2 = $body2 . "\nAuthor 4: " .$author4 . "\nOrganization 4: " . $organization4;
	if ($author5)
		$body2 = $body2 . "\nAuthor 5: " .$author5 . "\nOrganization 5: " . $organization5;
	if ($author6)
		$body2 = $body2 .	"\nAuthor 6: " . $author6 . "\nOrganization 6: " . $organization6;		
	$body2 = $body2 . "\n\nPRESENTATION\nFormat: " . $format . "\nLanguage: " . $language . "\nPresenter: " . $presenter .
			"\n\nCONTENT\nTopic: " . $topic . "\nCountry: " . $country . "\n\nBackground: " . 
			$background . "\n\nPurpose: " . $purpose . "\n\nMethods: " .
			$methods . "\n\nFindings: " . $findings . "\n\nConclusion: " . $conclusion . 
			"\n\nTotal Words: " . $word_count . "\n\nCONTACT INFORMATION\nName: " . $name . "\nE-mail 1: " . $email1 . 
			"\nE-mail 2: " . $email2 . "\nOffice Phone: " . $phone1 . "\nCell Phone: " . $phone2 .
			"\nFax: " . $fax . "\nAddress: " . $address;		
	
	$from = $site_email;
	$headers = "From: $from";
	
	mail($to2, $subject2, $body2, $headers);
	
?>



	<!--Output confirmation-->
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	
	
	<head>
	
		<title><?php echo $site_title; ?></title>
		<link href="css/abstracts.css" rel="stylesheet" type="text/css" />
	 
	</head>
	
	
	<body>
	
		<div id="header" class="top_container">
            <img src="images/logo.gif" />
        </div>
	
	
		 <div class="centering_container" id="main_container" >
	
			<h1>Thank you!</h1>
	
							
			<p>Thank you for your abstract submission titled "<?php echo $title; ?>".</p>
            <p>Your Abstract ID Number is: <?php echo $abstract_id; ?></p>
            <p>You will receive an e-mail confirmation shortly.</p>
        </div>       
        
            
    </body>
    
    
    </html>
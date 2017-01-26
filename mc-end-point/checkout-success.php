<?php
	// load in mailchimp library
	include('../mailchimp-api/src/MailChimp.php');
	include 'config.php';
	
	// namespace defined in MailChimp.php
	use \DrewM\MailChimp\MailChimp;
	
	// connect to mailchimp
	$MailChimp = new MailChimp($mcapi); // put your API key here
	$list = $mclistid; // put your list ID here
	$email = $_GET['EMAIL']; // Get email address from form
	$id = md5(strtolower($email)); // Encrypt the email address
	// setup the merge fields
	$mergeFields = array(
		// *** YOUR FIELDS GO HERE ***
		 'FNAME'=>$_GET['FNAME'],
 		 'CHECKOUT' => 'True',
		);
	// remove empty merge fields
	$mergeFields = array_filter($mergeFields);
	$result = $MailChimp->put("lists/$list/members/$id", array(
									'email_address'     => $email,
									'status'            => 'pending',
									'merge_fields'      => $mergeFields,
									'update_existing'   => true, // YES, update old subscribers!
							));
	echo json_encode($result);
	// Comment out the line below if you require a JSON response and not a thank you page (for apps)
	// header( 'Location: ' . ($thanksurl) . '' ) ; ?>

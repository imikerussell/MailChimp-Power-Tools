<?php
	// load in mailchimp library
	include('../mailchimp-api/src/MailChimp.php');
	include '../mc-end-point/config.php';
	
	// namespace defined in MailChimp.php
	use \DrewM\MailChimp\MailChimp;
	
	// connect to mailchimp
	$MailChimp = new MailChimp($mcapi); // put your API key here
	$list = $mclistid; // put your list ID here

	// remove empty merge fields
	$mergeFields = array_filter($mergeFields);

	// put url parameters into variable e.g. mc-code.php?date=2017-01-01
	$mcdate = ($_GET["date"]);
	// get today's date
	$today = getdate();
	// print_r($today); // test today's date by printing array
	// make sure month 'mon' and day 'mday' have preceeding 0 if under 10
	$mon = str_pad(($today['mon']), 2, '0', STR_PAD_LEFT);
	$mday =  str_pad(($today['mday']), 2, '0', STR_PAD_LEFT);

	// if there is a date parameter in the url search for automations created on that date
	if ($mcdate != "") {
	  $result = $MailChimp->get("automations?since_create_time=" . ($mcdate) . "T00:00:00+00:00&before_create_time=" . ($mcdate) . "T23:59:59+00:00");
	// else check for automations created since midnight today
	} else {
	  $result = $MailChimp->get("automations?since_create_time=" . ($today['year']) . "-" . ($mon) . "-" . ($mday) . "T00:00:00+00:00");
	}

	// [DEBUG] print results for debugging purposes
	// print_r ($result);
	// this is the workflow_id...
	// print_r ($result['automations'][0]['id']);
	// this is the automation name...
	// print_r ($result['automations'][0]['settings']['title']);

	// [DEBUG] test getting workflow_email_id from the workflow
	//$email_id = $MailChimp->get("automations/" . ($result['automations'][0]['id']) . "/emails");
	//print_r ($email_id);
	// this is the workflow_email_id...
	//print_r ($email_id['emails'][0]['id']);

	// this calculates how many automations have been created on the given day
	$total_items = ($result['total_items']);

	// print code for one automation today on the given day
	if ($total_items != "") {
	$email_id = $MailChimp->get("automations/" . ($result['automations'][0]['id']) . "/emails");
	// test HTML form
echo ('<h1 style="font-family: sans-serif;">This form will test the Automation code below with Mailchimp</h1>');
echo ('<h3 style="font-family: sans-serif;">How to Get the Free Download</h3>');
echo ('<p style="font-family: sans-serif;">Enter your name and email address below then check your email!</p>');
echo ('<form action="' . ($installurl) . '/mc-end-point.php" method="get">');
echo ('<input type="text" value="" placeholder="Enter your name here..." name="FNAME" class="required" id="mce-FNAME" required>');
echo ('<br /><br />');
echo ('<input type="email" value="" placeholder="Enter your email here..." name="EMAIL" class="required email" id="mce-EMAIL" required><input type="hidden" name="WORKFLOW_ID" value="' . ($result['automations'][0]['id']) . '"><input type="hidden" name="WORKFLOW_EMAIL_ID" value="' . ($email_id['emails'][0]['id']) . '">');
echo ('<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->');
echo ('<div style="position: absolute; left: -5000px;">');
echo ('<input type="text" name="b_a73cf6b8c3f0557df47242b8b_040c127434" tabindex="-1" value="" />');
echo ('</div>');
echo ('<p><input type="submit" value="Download Now" name="subscribe"></p>');
echo ('</form>');
	// display all hte required html code in a pretty light blue box
	echo ('<h3 style="font-family: sans-serif;">MailChimp Form Code for Automation: ' . ($result['automations'][0]['settings']['title']) . '</h3>');
	echo ("<div style='border:1px solid black; background-color:#EEEEFF; overflow:auto; padding:10px;'>");
	echo ("<code>");
	echo ('&lt;h3&gt;How to Get the Free Download&lt;/h3&gt;');
		echo nl2br ("\n");
	echo ('&lt;p&gt;Enter your name and email address below then check your email!&lt;/p&gt;');
		echo nl2br ("\n");
	echo ('&lt;form action="' . ($installurl) . '/mc-end-point.php" method="get"&gt;');
		echo nl2br ("\n");
	echo ('&lt;input type="text" value="" placeholder="Enter your name here..." name="FNAME" class="required" id="mce-FNAME" required&gt;');
		echo nl2br ("\n");
	echo ('&lt;br /&gt;&lt;br /&gt;');
		echo nl2br ("\n");
	echo ('&lt;input type="email" value="" placeholder="Enter your email here..." name="EMAIL" class="required email" id="mce-EMAIL" required&gt;&lt;input type="hidden" name="WORKFLOW_ID" value="' . ($result['automations'][0]['id']) . '"&gt;&lt;input type="hidden" name="WORKFLOW_EMAIL_ID" value="' . ($email_id['emails'][0]['id']) . '"&gt;');
		echo nl2br ("\n");
    echo ('&lt;!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups--&gt;');
    	echo nl2br ("\n");
    echo ('&lt;div style="position: absolute; left: -5000px;"&gt;');
    	echo nl2br ("\n");
    echo ('    &lt;input type="text" name="b_a73cf6b8c3f0557df47242b8b_040c127434" tabindex="-1" value="" /&gt;');
    	echo nl2br ("\n");
    echo ('&lt;/div&gt;');
    	echo nl2br ("\n");
    echo ('&lt;p style="text-align: center;"&gt;&lt;input type="submit" value="Download Now" name="subscribe"&gt;&lt;/p&gt;');
    	echo nl2br ("\n");
	echo ('&lt;/form&gt;');
	echo ("</code>");
	echo ("</div>");
	} else {
	echo '<h6 style="font-family: sans-serif;">No automations found!</h6>';
	}
echo ('<p style="font-family: sans-serif;"><a href="./"><strong>BACK</strong></a></p>')
?>
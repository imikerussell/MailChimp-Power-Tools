<?php
	include '../mc-end-point/config.php';
	// get the interest parameter from url
	$interest = ($_GET["interest"]);
	// display all hte required html code in a pretty light blue box
	echo ('<h3 style="font-family: sans-serif;">MailChimp Form Code for Merge Field: ' . ($interest) . '</h3>');
	echo ("<div style='border:1px solid black; background-color:#EEEEFF; overflow:auto; padding:10px;'>");
	echo ("<code>");
	echo ('&lt;h3&gt;Interested To Hear More?&lt;/h3&gt;');
		echo nl2br ("\n");
	echo ('Enter your name and email address below then check your email!');
		echo nl2br ("\n");
		echo nl2br ("\n");
	echo ('&lt;form action="' . ($installurl) . '/mc-end-point/interest.php" method="get"&gt;&lt;input id="mce-FNAME" class="required" name="FNAME" required="" type="text" value="" placeholder="Enter your name here..." /&gt;');
		echo nl2br ("\n");
		echo nl2br ("\n");
	echo ('&lt;input id="mce-EMAIL" class="required email" name="EMAIL" required="" type="email" value="" placeholder="Enter your email here..." /&gt;&lt;input name="INTEREST" type="hidden" value="' . ($interest) . '" /&gt;');
		echo nl2br ("\n");
		echo nl2br ("\n");
    echo ('&lt;!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups--&gt;');
    	echo nl2br ("\n");
    echo ('&lt;div style="position: absolute; left: -5000px;"&gt;&lt;input tabindex="-1" name="b_a73cf6b8c3f0557df47242b8b_040c127434" type="text" value="" /&gt;&lt;/div&gt;');
    	echo nl2br ("\n");
    echo ('&lt;p style="text-align: center;"&gt;&lt;input name="subscribe" type="submit" value="Tell Me More" /&gt;&lt;/p&gt;');
    	echo nl2br ("\n");
       	echo nl2br ("\n");
	echo ('&lt;/form&gt;');
	echo ("</code>");
	echo ("</div>");
echo ('<p style="font-family: sans-serif;"><a href="./"><strong>BACK</strong></a></p>')
?>
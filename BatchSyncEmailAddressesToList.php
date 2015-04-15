<?php
//Download MailChimp API - https://bitbucket.org/mailchimp/mailchimp-api-php
require_once('Mailchimp/Mailchimp.php');

/*
 * Batch Update MailChimp List
 * Sync E-mails with an external data source
 */

// subscriberListID - Find on MailChimp - View list > Click Settings > List name & Campaign Defaults
// subscriberListID is not the ID in the URL when viewing a list
$subscriberListID = '0a1b2c3d4e';

$apiKey = '0a0a0a0a0a0a0a0a0a0a0a0a0a0a00a0-ab1';

$mailChimp = new Mailchimp($apiKey);
$mailChimpLists = new Mailchimp_Lists($mailChimp);

$subscriptionStatus = $mailChimpLists->batchSubscribe($subscriberListID, 
	//Emails
	array(
		array(
			'email' => array('email' => 'javier.jackson42@example.com'),
			'html',
			'merge_vars' => array(
				'FNAME' => 'Javier',
				'LNAME' => 'Jackson'
			)
		),
		array(
			'email' => array('email' => 'bobby.edwards98@example.com'),
			'html',
			'merge_vars' => array(			
				'FNAME' => 'Bobby',
				'LNAME' => 'Edwards'
			)
		),
		array(
			'email' => array('email' => 'rachel.lucas95@example.com'),
			'html',
			'merge_vars' => array(			
				'FNAME' => 'Rachel',
				'LNAME' => 'Lucas'
			)
		),
	),
	false, // Send Opt-in E-mail
	true // Update Existing Users
);

// View Results
print_r($subscriptionStatus);
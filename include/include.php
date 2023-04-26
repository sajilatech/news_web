<?php
	require('common.php');
	require('formvalidator.php');
		require('mail.php');
		require('country.php');
	$mailClass= new Mail();
	$countryClass=new Country();

    $class=new Common();
	$validator = new FormValidator();
?>
<?php
	session_start();
	include "config.php";
	include "connect.php";
	require 'facebook.php';

	if ($_SESSION['user_fbid']) {		
		$fbid=$_SESSION['user_fbid'];
		
		$sql = 'SELECT * FROM loreal_users WHERE fbid="'.$fbid.'" and redken_code="'.$redken_code.'" and supercut_code="'.$supercut_code.'";';
		$res = mysql_query($sql);
		if(mysql_num_rows($res)>0) {  // THE USER HAS THE 2 CODE PARTS
			$form_name=mysql_real_escape_string($_POST['name']);
			$form_surename=mysql_real_escape_string($_POST['surname']);
			$form_date_birth=mysql_real_escape_string($_POST['date_birth']);
			$form_email=mysql_real_escape_string($_POST['email']);
			$form_address=mysql_real_escape_string($_POST['address']);
			$form_city=mysql_real_escape_string($_POST['city']);
			$form_postcode=mysql_real_escape_string($_POST['postcode']);
			$form_primary_reason=mysql_real_escape_string($_POST['primary_reason_1'].','.$_POST['primary_reason_2'].','.$_POST['primary_reason_3']);
			$form_news=mysql_real_escape_string($_POST['news']);
			$form_supercuts_salon_1=mysql_real_escape_string($_POST['choice_location_1']);
			$form_supercuts_salon_2=mysql_real_escape_string($_POST['choice_location_2']);
			$form_supercuts_salon_3=mysql_real_escape_string($_POST['choice_location_3']);
				
			$sql = "UPDATE loreal_users SET name='$form_name', surname='$form_surename', date_birth='$form_date_birth', email='$form_email', address='$form_address', city='$form_city', postcode='$form_postcode', primary_reason='$form_primary_reason', news='$form_news', supercuts_salon_1='$form_supercuts_salon_1', supercuts_salon_2='$form_supercuts_salon_2', supercuts_salon_3='$form_supercuts_salon_3' WHERE fbid='$fbid';";
		
			mysql_query($sql);
			echo '1';
		}else{ // THE USER HAS NOT THE 2 CODE PARTS
			echo '-1';
		}
	}else{
		echo '-1';
	}

?>
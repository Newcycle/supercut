<?php
	include("php/config.php");
	require 'php/facebook.php';
	
	$auth_url = "http://www.facebook.com/dialog/oauth?client_id=". $appId . "&scope=email&canvas=1&redirect_uri=" . urlencode($canvas_page);
	$signed_request = $_REQUEST["signed_request"];
	list($encoded_sig, $payload) = explode('.', $signed_request, 2); 
	$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
	
	
	if (empty($data["page"]["liked"])) { // NON FAN
		$render_page = $render_pages['noFan'];
		if (empty($data["user_id"])) { // PERMISSION DENIED
			echo '
				<script>
					top.window.location = "'.$auth_url.'"
				</script>
			';
		} else {
			$facebook = new Facebook(array(
				'appId' => $appId,
				'secret' => $secret,
				'cookie' => true
			));
			$user = $facebook->getUser();
			if ($user) { // FB OBJECT "USER" OK
				try { 
					include "php/connect.php";
					$user_profile = $facebook->api('/'.$data["user_id"].'?oauth_token='.$data["oauth_token"]);
					$sql = 'SELECT * FROM loreal_users WHERE fbid='.$user_profile["id"];
					$res = mysql_query($sql);
					if(mysql_num_rows($res)>0) { // USER EXIST IN THE DATA BASE
						$sql = 'UPDATE loreal_users SET supercut_code="" WHERE fbid="'.$user_profile["id"].'"';
						mysql_query($sql);					
					}		
				} catch (FacebookApiException $e) {
					error_log($e);
				}				
			}
		}
		
	
	} else { // FAN	
		if (empty($data["user_id"])) { // PERMISSION DENIED
			$render_page = $render_pages['noFan'];
			echo '
				<script>
					top.window.location = "'.$auth_url.'"
				</script>
			';
		} else { // PERMISSION ALLOWED
		
			$facebook = new Facebook(array(
				'appId' => $appId,
				'secret' => $secret,
				'cookie' => true
			));

			$user = $facebook->getUser();

			if ($user) { // FB OBJECT "USER" OK
				try { 
					include "php/connect.php";
					
					$user_profile = $facebook->api('/'.$data["user_id"].'?oauth_token='.$data["oauth_token"]);
					
					$_SESSION["user_oauth"] = $data["oauth_token"];
					
					$sql = 'SELECT * FROM loreal_users WHERE fbid='.$user_profile["id"];
					$res = mysql_query($sql);
					
					if(mysql_num_rows($res)>0) { // USER EXIST IN THE DATA BASE
						
						$sql = 'UPDATE loreal_users SET supercut_code="'.$supercut_code.'" WHERE fbid="'.$user_profile["id"].'"';
						mysql_query($sql);						
						
						$row = mysql_fetch_array($res);
						
						$_SESSION['user_id'] = $row["id"];
						$_SESSION['user_fbid'] = $user_profile["id"];
						
						$sql = 'SELECT * FROM loreal_users WHERE fbid='.$user_profile["id"];
						$res = mysql_query($sql);
						$user_db_data = mysql_fetch_array($res);
						
						$_SESSION["user_redken_code"] = $user_db_data['redken_code'];
						$_SESSION["user_supercut_code"] = $user_db_data['supercut_code'];
												
						$sql = 'SELECT * FROM loreal_users WHERE fbid="'.$user_profile["id"].'" and redken_code="'.$redken_code.'" and supercut_code="'.$supercut_code.'";';
						$res = mysql_query($sql);
						
						if(mysql_num_rows($res)>0) {  // THE USER HAS THE 2 CODE PARTS
							$sql = 'SELECT * FROM loreal_users WHERE fbid="'.$user_profile["id"].'" and name!="" and surname!="" and date_birth!="0000-00-00" and email!="" and supercuts_salon_1!="" and supercuts_salon_2!="" and supercuts_salon_3!=""';
							$res = mysql_query($sql); 	
							
							if(mysql_num_rows($res)>0) { // THE USER HAS COMPLETED THE FORM
								$render_page = $render_pages['thanks'];
							}else{  // THE USER HAS NOT COMPLETED THE FORM
								$render_page = $render_pages['form'];
							}
							
						}else{ // THE USER HAS NOT THE 2 CODE PARTS
							$render_page = $render_pages['form'];	
						}
	
					} else { // USER IS NOT IN THE DATA BASE

						$sql = 'INSERT INTO loreal_users (id, fbid, name, surname, date_birth, email, address, city, postcode, primary_reason, news, supercuts_salon_1, supercuts_salon_2, supercuts_salon_3, redken_code, supercut_code, created, modified) VALUES (null,"'.$user_profile["id"].'", "", "", "", "", "", "", "", "", "0", "", "", "", "", "'.$supercut_code.'", "'.date("Y-m-d H:i:s").'", CURRENT_TIMESTAMP())';
						mysql_query($sql);
						
						$userID = mysql_insert_id();
						$_SESSION['user_id'] = $userID;
						$_SESSION['user_fbid'] = $user_profile["id"];
						
						$sql = 'SELECT * FROM loreal_users WHERE fbid='.$user_profile["id"];
						$res = mysql_query($sql);
						$user_db_data = mysql_fetch_array($res);
						
						$_SESSION["user_redken_code"] = $user_db_data['redken_code'];
						$_SESSION["user_supercut_code"] = $user_db_data['supercut_code'];
						
						$render_page = $render_pages['form'];
					}
				} catch (FacebookApiException $e) {
					error_log($e);
					$render_page = $render_pages['noFan'];
					$user = null;
				}				
			}else{ // SI EL USUARIO NO EXISTE O NO ESTA LOGEADO
				$render_page = $render_pages['noFan'];				
			}
		}			
	}
	include('main.php');
?>
<?php
	
?>
<div id="form">
	<div class="block" style="padding-left: 4%;    padding-right: 4%;    width: 92%;">
		<div class="block" style="margin-top:15px;">
			<img src="imgs/header.png">		
		</div>
		<div class="block">
			<div class="left" style="width:300px;">
				<div class="block">
					<h2 class="ocre">Prize details</h2>
					<p class="text white">
						Redken & Supercuts are offering 60 winners the chance to experience the new Smooth Lock Salon Service exclusively with Supercuts.
						
					</p>
					<p class="text white">
						60 runners-up can treat their tresses with the new Smooth Lock Shampoo and Conditioner gift sets.
					</p>
				</div>
				<div class="block">
					<h2 class="ocre">How to enter</h2>
					<ol class="text white">
						<li>Get half the code by liking Supercuts' Facebook page</li>
						<li>Get the second half of the code by liking Redken's Facebook page</li>
						<li>Enter the full code on either page</li>
						<li>Fill in your contact details</li>
					</ol>
				</div>
			</div>
			<div class="right" style="border-left: 1px solid #ddd1c2; padding-left: 10px; width: 421px;">
				<iframe class="youtube-player" type="text/html" width="421" height="237" src="https://www.youtube.com/embed/1X3epkwKK5g" frameborder="0"></iframe>
				<a border=0 href="http://bit.ly/supercutssalonfinder" target="_blank">
					<img src="imgs/nearest-salons.png" />
				</a>
			</div>
		</div>
	</div>
	
	<div class="block">
		<form id="form-codes2" class="block" action="#" method="post">
			<input type="text" disabled="disabled" id="code_supercut" style="margin-left:245px;" class="code" name="code_supercut" value="<?php echo $_SESSION["user_supercut_code"];?>" />
			<input type="text" id="code_redken" style="margin-left: 59px;" class="code" name="code_redken" value="<?php echo $_SESSION["user_redken_code"];?>" />
			<input type="button" id="btn_submit_code" class="btn-brown right" onClick="top.window.location = '<?php echo $canvas_redken_page;?>';" value="Get Redken code" />
		</form>
	</div>
	
	<div class="block" style="padding-left: 5%;    padding-right: 5%;    width: 90%;">
		<?php
			
			$sql = 'SELECT * FROM loreal_users WHERE fbid="'.$user_profile["id"].'" and redken_code="'.$redken_code.'" and supercut_code="'.$supercut_code.'";';
			$res = mysql_query($sql);
			if(mysql_num_rows($res)>0) {  // THE USER HAS THE 2 CODE PARTS
				
			}else{ // THE USER HAS NOT THE 2 CODE PARTS
				?>
				<div id="block-form"></div>
				<?php
			}
		?>
		
		<div id="popup">
			<p class="text white">
				Please complete all fields market with a *
			</p>
			<div class="btn-brown" id="popup-btn-ok"><p>OK</p></div>
		</div>
			
		<div class="block">
			<p class="text white">
				Please complete all fields market with a *
				</p>
		</div>
		<div class="block bg-brown" style="height:510px;" >
			<form id="reg-form" action="#" method="post">
				<div class="block">
					<div class="left" style="width: 50%;">
						<div class="block">
							<p class="text white left">Name*:</p>
							<input type="text" class="right" name="form-name" id="form-name" value="<?php echo $user_profile['first_name'];?>" />
						</div>
						<div class="block">
							<p class="text white left">Surname*:</p>
							<input type="text" class="right" name="form-surname" id="form-surname" value="<?php echo $user_profile['last_name'];?>" />
						</div>
						<div class="block">
							<p class="text white left">Date of birth*:</p>
							<div class="right" style="width: 230px;">
								<select class="left" style="width:65px;" name="form-date-birth-day" id="form-date-birth-day">
									<option value="">Day</option>
									<?for($day=1; $day <= 31; ++$day):?>
										<?
												//this code is adding a 0 before all values less than 10
												//you don't need this code, but I prefer to have 2 digit values
										if($day < 10)
										{
											$day = "0".$day;
										}
										?>
										<option value="<?=$day?>"><?=$day?></option>
									<?endfor;?>
								</select>
								<select class="left" style="width:70px;margin-left:15px;" name="form-date-birth-month" id="form-date-birth-month">
									<option value="">Month</option>
									<?for($month=1; $month <= 12; ++$month):?>
										<?
												//this code is adding a 0 before all values less than 10
												//you don't need this code, but I prefer to have 2 digit values
										if($month < 10)
										{
											$month = "0".$month;
										}
										?>
										<option value="<?=$month?>"><?=$month?></option>
									<?endfor;?>
								</select> 
								<select class="right" style="width:65px;" name="form-date-birth-year" id="form-date-birth-year">
									<option value="">Year</option>
									<?
										//The 100 value here is the amount of years to go back
									$year = date("Y") - 100;
										//The 100 value here is the amount of years to go forward
										//because i went back 100 years, i'm going forward 100 years so the dropdown will always have the current year, going back 100 years.
									for ($i = 0; $i <= 100; ++$i)
									{
										echo "<option value='$year'>$year</option>"; ++$year;
									}
									?>
								</select>
							</div>
						</div>
						<div class="block">
							<p class="text white left">Email address*:</p>
							<input type="text" class="right" name="form-email" id="form-email" value="<?php echo $user_profile['email'];?>" />
						</div>
						<div class="block">
							<p class="text white left">Address:</p>
							<input type="text" class="right" name="form-address" id="form-address" value="" />
						</div>
						<div class="block">
							<p class="text white left">City:</p>
							<input type="text" class="right" name="form-city" id="form-city" value="" />
						</div>
						<div class="block">
							<p class="text white left">Postcode:</p>
							<input type="text" class="right" name="form-postcode" id="form-postcode" value="" />
						</div>
						<div class="block">
							<p class="text white left">Primary reason for visiting a salon:</p>
						</div>
						<div class="block">
							<div class="left mr5">
								<div class="checkbox left" status="unchecked" name="primary_reason_1" id="primary_reason_1" value="Hair care advice"></div>
								<p class="text white left simple ml5">Hair care advice</p>
							</div>
							<div class="left mr5">
								<div class="checkbox left" status="unchecked" name="primary_reason_2" id="primary_reason_2" value="Styling tips" ></div>
								<p class="text white left simple ml5">Styling tips</p>
							</div>
							<div class="left">
								<div class="checkbox left" status="unchecked" name="primary_reason_3" id="primary_reason_3" value="Color service" ></div>
								<p class="text white left simple ml5">Color service</p>
							</div>
						</div>
					</div>
					<div class="right" style="width: 46%;">
						<div class="block">
							<p class="text white left">Preferred Supercuts salon if you are picked as a winner**:</p>
						</div>
						<div class="block">
							<p class="text white left">1st choice location*:</p>
							<select class="right" name="choice_location_1" id="choice_location_1" >
								<option value="">Please select</option>
								<?php
								$sql = 'SELECT * FROM loreal_salons ORDER BY name ASC;';
								$res = mysql_query($sql);
								while($salons = mysql_fetch_array($res)){
									$salon_name=$salons["name"];
									echo "<option value='$salon_name'>$salon_name</option>";
								}
								?>
							</select>
						</div>
						<div class="block">
							<p class="text white left">2nd choice location*:</p>
							<select class="right" name="choice_location_2" id="choice_location_2" >
								<option value="">Please select</option>
								<?php
								$sql = 'SELECT * FROM loreal_salons ORDER BY name ASC;';
								$res = mysql_query($sql);
								while($salons = mysql_fetch_array($res)){
									$salon_name=$salons["name"];
									echo "<option value='$salon_name'>$salon_name</option>";
								}
								?>
							</select>
						</div>
						<div class="block">
							<p class="text white left">3rd choice location*:</p>
							<select class="right" name="choice_location_3" id="choice_location_3" >
								<option value="">Please select</option>
								<?php
								$sql = 'SELECT * FROM loreal_salons ORDER BY name ASC;';
								$res = mysql_query($sql);
								while($salons = mysql_fetch_array($res)){
									$salon_name=$salons["name"];
									echo "<option value='$salon_name'>$salon_name</option>";
								}
								?>
							</select>
						</div>
					
					</div>
				</div>
				<div class="block mt20">
					<div class="left">
						<p class="text white left simple ml5">Tick here if you don't want to be sent hair care news, exciting competitions & including free samples:</p>
						<div id="form-news" class="checkbox left" style="margin-left:10px;" status="unchecked" ></div>
					</div>
				</div>
				<div class="block mt20">
					<div class="left">
						<p class="text white left simple ml5">I have read and accepted the <a style="color:#fff;" href="http://www.redkencompetitions.co.uk/smoothlock" target="_blank">Terms and Conditions</a>*</p>
						<div id="form-terms" class="checkbox left" style="margin-left:10px;" status="unchecked"></div>
					</div>
				</div>
				<div class="block mt20">
					<div class="left" style="width: 65%;">
						<p class="text white left simple ml5">**Please note that this is your preferred location Redken and Supercuts cannot guarantee that you will be offered a treatment in your first choice salon.</p>
					</div>
					<div class="right" style="width: 35%;">
						<input type="button" id="btn_submit_details" class="btn-brown" value="Submit details" />
					</div>
				</div>
			</form>
			<script>
				function xmlhttpPost(strURL,qstr,callback) {
					var xmlHttpReq = false;
					var self = this;
					// Mozilla/Safari
					if (window.XMLHttpRequest) {
						self.xmlHttpReq = new XMLHttpRequest();
					}
					// IE
					else if (window.ActiveXObject) {
						self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
					}
					self.xmlHttpReq.open('POST', strURL, true);
					self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					self.xmlHttpReq.onreadystatechange = function() {
						if (self.xmlHttpReq.readyState == 4) {
							callback(self.xmlHttpReq.responseText);
						}
					}

					self.xmlHttpReq.send(qstr);
				}
				
				/*
				$('#code_redken').change(function(){
					if($(this).val() == '<?php echo $redken_code;?>'){
						
					}
				});
				*/

				$('#popup-btn-ok').click(function(){
					$('#popup').animate({'opacity':'0'},500,function(){
						$(this).css({'display':'none'});
					});
				});
				
				$(".checkbox").mouseover(function(){
					var status = $(this).attr('status');
					if(status=='unchecked'){
						//$(this).css({"background-color":"#444"});
					}		
				});
				$(".checkbox").mouseout(function(){
					var status = $(this).attr('status');
					if(status=='unchecked'){
						//$(this).css({"background-color":"#fff"});
					}
				});
				$(".checkbox").click(function(){
					var status = $(this).attr('status');
					if(status=='unchecked'){
						$(this).attr('status','checked');
						$(this).css({"background-image":"url('imgs/check.png')"});
					}else{
						$(this).attr('status','unchecked');
						$(this).css({"background-image":"none"});
					}
				});
				var terms = 0;
				$("#form-terms").click(function(){
					if(terms==0){
						terms=1;
					}else{
						terms=0;
					}
				});	
				
				
				$("#choice_location_1").change(function(){
					checkChoicesLocation();
				});
				$("#choice_location_2").change(function(){
					checkChoicesLocation();
				});
				$("#choice_location_3").change(function(){
					checkChoicesLocation();
				});
				function checkChoicesLocation(choice_location){
					var choice_location_1 = $("#choice_location_1").attr('value');
					var choice_location_2 = $("#choice_location_2").attr('value');
					var choice_location_3 = $("#choice_location_3").attr('value');
					switch(choice_location){
						case 1:
							if(choice_location_1 == choice_location_2 || choice_location_1 == choice_location_3){
								$('#popup').css({'display':'block'});
								$('#popup .text').text('You cannot select the same salon more than once for your preferred Supercuts salons');
								$('#popup').animate({'opacity':'1'},500,function(){
									
								});
							}
							break;
						case 2:
							if(choice_location_2 == choice_location_1 || choice_location_2 == choice_location_3){
								$('#popup').css({'display':'block'});
								$('#popup .text').text('You cannot select the same salon more than once for your preferred Supercuts salons');
								$('#popup').animate({'opacity':'1'},500,function(){
									
								});
							}
							break;
						case 3:
							if(choice_location_3 == choice_location_1 || choice_location_3 == choice_location_2){
								$('#popup').css({'display':'block'});
								$('#popup .text').text('You cannot select the same salon more than once for your preferred Supercuts salons');
								$('#popup').animate({'opacity':'1'},500,function(){
									
								});
							}
							break;
						
					}
				}
				
				$("#btn_submit_details").click(function(){
					var puedo=1;
					
					var name = $("#form-name").attr('value');
					var surname = $("#form-surname").attr('value');
					
					var date_birth_day = $("#form-date-birth-day").attr('value');
					var date_birth_month = $("#form-date-birth-month").attr('value');
					var date_birth_year = $("#form-date-birth-year").attr('value');
					
					var date_birth = date_birth_year+'-'+date_birth_month+'-'+date_birth_day;
					
					var email = $("#form-email").attr('value');
					var address = $("#form-address").attr('value');
					var city = $("#form-city").attr('value');
					var postcode = $("#form-postcode").attr('value');
					
					var primary_reason_1 = "";
					if($("#primary_reason_1").attr('status')=="checked"){
						primary_reason_1 = $("#primary_reason_1").attr('value');
					}
					
					var primary_reason_2 = "";
					if($("#primary_reason_2").attr('status')=="checked"){
						primary_reason_2 = $("#primary_reason_2").attr('value');
					}
					
					var primary_reason_3 = "";
					if($("#primary_reason_3").attr('status')=="checked"){
						primary_reason_3 = $("#primary_reason_3").attr('value');
					}
					
					var choice_location_1 = $("#choice_location_1").attr('value');
					var choice_location_2 = $("#choice_location_2").attr('value');
					var choice_location_3 = $("#choice_location_3").attr('value');
					if(choice_location_2 == choice_location_1){
						puedo=0;
					}
					if(choice_location_3 == choice_location_2){
						puedo=0;
					}else if(choice_location_3 == choice_location_1){
						puedo=0;
					}	
					
					
					var news = 0;					
					if($("#form-news").attr('status')=="checked"){
						news = 1;
					}
					
					
					if(name == ''){
						puedo=0;
					}
					if(surname == ''){
						puedo=0;
					}
					if(date_birth == ''){
						puedo=0;
					}
					if(email == ''){
						puedo=0;
					}
					if(choice_location_1 == ''){
						puedo=0;
					}
					if(choice_location_2 == ''){
						puedo=0;
					}
					if(choice_location_3 == ''){
						puedo=0;
					}
					
					if(terms==0){
						puedo=0;
					}
					
					if(puedo==1){					
						var qstr = 'name='+name+"&surname="+surname+"&date_birth="+date_birth+"&email="+email+"&address="+address+"&city="+city+"&postcode="+postcode+"&primary_reason_1="+primary_reason_1+"&primary_reason_2="+primary_reason_2+"&primary_reason_3="+primary_reason_3+"&choice_location_1="+choice_location_1+"&choice_location_2="+choice_location_2+"&choice_location_3="+choice_location_3+"&news="+news;
						xmlhttpPost('php/saveUserData.php',qstr,formCallback);
					}else{
						$('#popup .text').text('Please complete all fields market with a *');
						$('#popup').css({'display':'block'});
						$('#popup').animate({'opacity':'1'},500,function(){
							
						});
					}
					
				});
				function formCallback(result){
					invitar();
				}
			</script>
		</div>
	</div>
</div>
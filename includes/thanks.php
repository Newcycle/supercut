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
				<iframe class="youtube-player" type="text/html" width="421" height="237" src="http://www.youtube.com/embed/1X3epkwKK5g" frameborder="0"></iframe>
				<a border=0 href="http://bit.ly/supercutssalonfinder" target="_blank">
					<img src="imgs/nearest-salons.png" />
				</a>
			</div>
		</div>
	</div>
	
	<div class="block" style="margin-top: 45px;">
		<div id="thanks-bottom" class="block mt135 center">
			<h1 class="white center big">Thank you!</h1>
			<h4 class="white center normal">Your details have been submitted</h4>
			<div class="center-div" style="height: 30px;margin: 35px auto 10px;width: 398px;">
				<h4 class="white bold left simple" >
					Share this offer:
				</h4>
				<img id="facebook-share" class="left" border=0 src="imgs/facebook_share.png" />
				<a href="https://twitter.com/intent/tweet?status=I've just entered to win Supercuts's new in-salon Smooth Lock service at Supercuts http://on.fb.me/RwUlQM" target="_blank" ><img id="twitter-share" class="left" src="imgs/twitter_share.png" /> </a>
			</div>
			<div><a href="http://bit.ly/SmoothlockVoucher" target="_blank"><img src="imgs/get_5_off.png" /></a></div>
			<h4 class="white center-div bold" style="width:320px;">Find out more about the New Smooth Lock service available at Supercuts nationwide</h4>
			<a href="http://bit.ly/glclsmoothlock" target="_blank"><div class="btn-go center-div"></div></a>
		</div>
	</div>

</div>
<script>
$(document).ready(function(){
	$("#facebook-share").click(function(){
		postToFeed();
	});
});
</script>
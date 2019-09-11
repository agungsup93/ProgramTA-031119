<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.css' />
<link rel='stylesheet' type='text/css' href='bootstrap/css/login.css'/>
<script type='text/javascript' src='bootstrap/js/jquery-3.2.1.js'></script>
<title>Halaman Admin</title>
<link rel="shortcut icon" href='images/dn.png'>
<style>img {max-width:100%;}</style>
</head>
<body>
<div class="col-md-4 col-md-offset-4 dalam">
	<div class="loginwrapper">
		<div class="loginwrap zindex100 animate2 bounceInDown">
			<div class="kotak">
			<div class="logo">
				<div class="animate5 bounceIn">
					<img src="images/dn.png">
				</div>
			</div>
				<!------------------FORM LOGIN----------------------->
					<form name="login" action="log.php?op=in" class="inner-login" method="post">
						<h2 class="text-center title-login"><b>Login PMDN</b></h2>
							<div class="form-group">
								<div class="animate6 bounceIn">
									<label class='control-label col-sm-5'>NIP</label>
									<input id="nip" type="text" class="form-control" name="nip" placeholder="NIP">
								</div>
							</div>
							<div class="form-group">
								<div class="animate6 bounceIn">
									<label class='control-label col-sm-5'>Password</label>
									<input id="password" type="password" class="form-control" name="password" placeholder="Password">
								</div>
							</div>
							<p class="animate6 bounceIn">
								<button type="submit" class="btn btn-primary btn-block btn-flat">MASUK</button>
								
							</p>
								<!-----IN WAKTU----->
								<center>						
									<b><?php include "waktu.php"?></b>
									<h4>Pondok Modern Darunnadwah</h4><br>
								</center> 	
					</form>
								<!-----END WAKTU----->
				<!------------------END FORM LOGIN----------------------->
			</div>
		</div>
	</div>
</div>
<script type='text/javascript' src='bootstrap/js/bootstrap.js'></script>
		
</body>
</html>

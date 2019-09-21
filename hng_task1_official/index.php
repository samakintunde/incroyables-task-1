<?php
include_once 'process/process_include.php';
// validate page
if(isset($_SESSION['user_graph'])){
    // redirect back to index page
    header('Location:'.BASE_URL.'landing.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Les Incroyables</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--=====================CSS=================================-->
 <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/main.css">
	<style type="text/css">
	</style>
</head>
<body>
	<section class="web">
		<div class="panel-0 ">
			<div class="container-fluid fullvw">
				<div class="row">
					<div class="col-md-8 lefty">
						<div class="leftovalay"></div>
						<div class="inner">
							<div class="row content-0">
								<div class="col-12 statusw"><span href="landing.php">LOGIN</span></div>
							</div>
							<div class="row">
								<div class="col-12"><h2>WELCOME TO LES INCROYABLES</h2>
								<p>Join our community that have more than 10000 subscribers and<br>learn new things everyday</p>
								<a href="#"  class="btn btn-0 made-1">CREATE ACCOUNT</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 righty">
						<div class="row">
							<div class="col-9 righin">

								<center id="logo" ><img src="assets/logo-0.png" height="75"></center>
                                <?php if(isset($_SESSION['feed'])): ?>
                                    <?php print $_SESSION['feed']; unset($_SESSION['feed']) ?>
                                <?php endif ?>
								<div id="form" style="margin:auto">
									<form method="POST">
									  <div class="form-group">
									    <!--label for="exampleInputEmail1">Email address</label-->
									    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@email.xyz">
									  </div>
									  <div class="form-group">
									    <!--label for="exampleInputPassword1">Password</label-->
									    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Enter Password">
									  </div>
									  <button type="submit" name="signin_btn" class="btn btn-primary col-12">LOGIN</button>
									  <center><!-- Button trigger modal --><a href="#" class="btn forgot" data-toggle="modal" data-target="#exampleModalLong">Forgot password?</a></center>
									  
											<!-- Modal -->
											<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      
											      <div class="modal-body  col-10">
											        <div class="forgotText">
											        	<center><p>Input your email address to request
a new password.</p></center>
											        </div>
											        <div class="forgotForm">
											        	<form>
														  <div class="form-group">
														    <!--label for="exampleInputEmail1">Email address</label-->
														    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@email.xyz">
														  </div>
														  <button type="submit" class="btn btn-primary col-12">SEND</button>
														</form>
											        </div>
											      </div>
											      <div class="anns">
											        <center><a class="btn" data-dismiss="modal"><script>document.write('<< Go Back')</script></a></center>
											      </div>
											    </div>
											  </div>
											</div>
									</form>
								</div>
								<div class="down-0">
									<center><span>Don't have an account? <a class="made-01" href="#"><b>Sign up</b></a></span></center>
								</div>
							</div>
						</div>
					</div>
				</div>

				

			</div>
		</div>
		<div class="panel-1 mhide">
			<div class="container-fluid fullvw">
				<div class="row">
					<div class="col-md-4 leftyone">
						<div class="row">
							<div class="col-9 righin">

								<center id="logo" ><img src="assets/logo-1.png" height="75"></center>
								<div id="form" style="margin:auto">
									<center><h6>Fill the form below to<br><b>join us today!</b></h3></center>
									<form method="POST">
									  <div class="form-group">
									    <!--label for="exampleInputEmail1">Email address</label-->
									    <input type="text" class="form-control" name="name" placeholder="Full name">
									  </div><div class="form-group">
									    <!--label for="exampleInputEmail1">Email address</label-->
									    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@email.xyz">
									  </div>


									  <div class="form-group">
									    <!--label for="exampleInputPassword1">Password</label-->
									    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Enter Password">
									  </div>
									  <button type="submit" name="signup_btn" class="btn btn-primary col-12">REGISTER</button>
									  
											
									</form>
								</div>
								<div class="down-0">
									<center><span>Already have an account? <a class="made-00" href="#"><b>Sign in</b></a></span></center>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8 rightyone">
						<div class="rightovalay"></div>
						<div class="inner">
							<div class="row content-0">
								<div class="col-12 statusw"><span>CREATE AN ACCOUNT</span></div>
							</div>
							<div class="row">
								<div class="col-12"><h2>WELCOME BACK</h2>
								<p>Sign in to see what you've missed<br>while you was away.</p>
								<a href="#"  class="btn btn-0 made-0">SIGN IN</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="./assets/made.js"></script>
</body>
</html>
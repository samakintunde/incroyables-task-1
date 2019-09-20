<?php

use HNG_Internship\controller\controller;
use HNG_Internship\Methods\user_functions;


$func = new user_functions();

 if($func->is_post_request() && isset($_POST['regBtn'])){
 	$args = $_POST['user'];
	$user = new controller();
	$user->setArgs($args);
	$result = $user->save();

	print_r($result);
	
	if($result === true) {
		$func->redirect_to('Resources/Views/welcome.php');

	 } else {
		echo '
		<script >
			alert("The user was created successfully.");
		</script>	
		';
 	}
  
}

?>



<div class="panel-1 mhide">
			<div class="container-fluid fullvw">
				<div class="row">
					<div class="col-md-4 leftyone">
						<div class="row">
							<div class="col-9 righin">

								<center id="logo" ><img src="Resources/assets/logo-1.png" height="75"></center>
								<div id="form" style="margin:auto">
									<center><h6>Fill the form below to<br><b>join us today!</b></h3></center>
									<form method="POST">
									  <div class="form-group">
									    <!--label for="exampleInputEmail1">Email address</label-->
									    <input type="text" class="form-control" minlength="3" placeholder="Full name" name="user[fullname]" required >
									  </div>
									  <div class="form-group">
									    <!--label for="exampleInputEmail1">Email address</label-->
									    <input type="email" class="form-control" name="user[email]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@email.xyz" required>
									  </div>


									  <div class="form-group">
									    <!--label for="exampleInputPassword1">Password</label-->
									    <input type="password" class="form-control" minlength="6" name="user[password]" id="exampleInputPassword1" placeholder="Enter Password" required >
									  </div>
									  <button type="submit" class="btn btn-primary col-12" name="regBtn">REGISTER</button>
									  
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
								<div class="col-12 statusw"><span>SIGN IN</span></div>
							</div>
							<div class="row">
								<div class="col-12"><h2>WELCOME BACK</h2>
								<p>Sign in to see what you've missed<br>while you was away.</p>
								<a href="#"  class="btn btn-0 made-0">CREATE ACCOUNT</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button href="#" class="btn btn-0 made-1">switch</button>
		</div>
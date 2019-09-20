<?php

	use HNG_Internship\controller\controller;
	use HNG_Internship\Methods\user_functions;
	use HNG_Internship\model\userModel;

	$userLogin = new controller;
	$u_func = new user_functions;
	$u_model = new userModel;

	
	if ($u_func->is_post_request() && isset($_POST['login'])) {
		$email = $_POST['email'] ?? '';
  		$password = $_POST['password'] ?? '';
		$logger = $userLogin->login($email, $password);
		
		if($logger != false ){
			
			$u_func->redirect_to('Resources/Views/welcome.php');
		}else{
			echo "<script>alert('NOT LOGGED IN INCORRECT USERNAME OR PASSWORD');</script>";
		}
	}

?>


<div class="panel-0 ">
	<div class="container-fluid fullvw">
		<div class="row">
			<div class="col-md-8 lefty">
				<div class="leftovalay"></div>
					<div class="inner">
						<div class="row content-0">
							<div class="col-12 statusw"><span>LOGIN</span></div>
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

						<center id="logo" ><img src="Resources/assets/logo-0.png" height="75"></center>
							<div id="form" style="margin:auto">
								<form method="POST" >
									<div class="form-group">
									    <!--label for="exampleInputEmail1">Email address</label-->
									    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@email.xyz" required >
									  </div>
									  <div class="form-group">
									    <!--label for="exampleInputPassword1">Password</label-->
									    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password" required >
									  </div>
									  <button type="submit" class="btn btn-primary col-12" name="login">LOGIN</button>
									  <center><!-- Button trigger modal --><a href="#" class="btn forgot" data-toggle="modal" data-target="#exampleModalLong">Forgot password?</a></center>
								</form>
								<form method="POST">
											<!-- Modal -->
										<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
											<div class="modal-dialog" role="document">
											    <div class="modal-content">
											      
											    <div class="modal-body  col-10">
											        <div class="forgotText">
					                                    <center><p>Input your email address to request a new password.</p></center>
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
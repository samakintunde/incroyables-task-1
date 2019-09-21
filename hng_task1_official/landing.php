<?php
// processing script
include_once 'process/process_include.php';
// validate page
if(!isset($_SESSION['user_graph'])){
    // redirect back to index page
    header('Location:'.BASE_URL);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Les Incroyables - Landing Page</title>
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
<body id="landing">
		<div class="mycontent">
		<div class="overlay">
			<div class="container-fluid on-web fullvw">
					<div class="col-md-12 body-nofooter fullvw header">
						<nav class=" fullvw-1 navbar up navbar-expand-lg">
			 				<div class="col-md-5 col-sm-5 site-title1">
								<a class="made" href="#">LES INCROYABLES</a>
							</div>
							<div class="col-md-2 logo1 col-sm-2 float-left weblogo">
								<img src="assets/logo-0.png" height="50">
							</div>
							
							<div class="col-md-5 col-sm-5 float-right webmenu">
								<div class="menu-1 webmenu">
								  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
								    <span class="made navbar-toggler-icon"></span>
								  </button>
								  <div class="collapse navbar-collapse" id="navbarNavDropdown">
								    <ul class="navbar-nav">
								      <li class="nav-item">
								        <a class="nav-link" href="#">About Us</a>
								      </li>
								      <li class="nav-item">
								        <a class="nav-link" href="#">Gallery</a>
								      </li>
								      <li class="nav-item">
								        <a class="nav-link" href="#">Contact Us</a>
								      </li>
								    </ul>
								  </div>
								</div>
							</div>
						</nav>


						<div class="col-md-12">
							<div class="col-md-8 content-side" style="z-index: 1">
								<div class="made-texts">
								<div class="col-12"><h1>HELLO <?php print ucfirst($_SESSION['user_graph']['name']) ?>!</h1>
									<h4>What would you like to do today?</h4>
									<h2 class="typewrite font-weight-bolder mb-4" data-period="500" data-type='[ "Save the world😎?", "Help the community🏦?", "Rescue a girl👩?", "Party all night🥳?", "Go Crazy🤪?" ]'>
										<span class="wrap"></span>
									</h2>
									<a href="#"  class="btn btn-0" data-toggle="modal" data-target="#exampleModal"><b>Lets Go!</b></a>
										<!-- Modal -->
										<div class="modal fade lets go" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        <center><h1>Yay <?php print ucfirst($_SESSION['user_graph']['name']) ?>!!!</h1>
										        <h4>You are officially a super Hero now, let's kick some ass!!!</h4></center>
										      </div>
										    </div>
										  </div>
										</div>

									<a href="" class="btn forgot" data-toggle="modal" data-target="#exampleModalLong"><b style="color:#F0D90C">Log Out</b></a>
										  
												<!-- Modal -->
												<div class="modal fade logout" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      
												      <div class="modal-body  col-10">
												        <div class="forgotText">
												        	<center><p>Are you Sure?</p></center>
												        </div>
												       
															  <a href="<?php print BASE_URL.'landing.php/?signout=true' ?>" class="btn btn-primary  col-sm-6">Yes</a>
															  <button href="#" class="btn btn-primary blue bg col-sm-5" data-dismiss="modal">No</button>
														</div>
												     
												    </div>
												  </div>
												</div>
										</form>
									</div>	
									</div>
							</div></div>
						</div>
						</div>


				 <footer class=" fullvw-1 navbar down navbar-expand-lg">
				 	<a class="made" href="">© 2019 Les Incroyables. All Rights Reserved.</a>
				 </footer>
		</div>
	</div>		 
<body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="./assets/made.js"></script>
</body>
</html>
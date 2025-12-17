<?php session_start();  
  require_once("configs/db_config.php");
  if(isset($_SESSION["uid"])) header("location:home");
  //require_once("library/classes/system_log.class.php");
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
    //  $result=$db->query("select u.id,u.name,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.name='$username' and u.password='$password'");
     $result=$db->query("select u.id,u.password,u.email,u.photo,u.phone,u.role_id,r.name role from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.name='$username' ");
      
    
      $user=$result->fetch_object();

      if($user && password_verify($password,$user->password)){
        
        $_SESSION["uid"]=$user->id;
        $_SESSION["uname"]=$user->name;
        $_SESSION["uphoto"]=$user->img;
        $_SESSION["email"]=$user->email;
        $_SESSION["mobile"]=$user->phone; 
        $_SESSION["role_id"]=$user->role_id;
        $_SESSION["urole"]=$user->role;

        header("location:home");
      }else{
        echo "Incorrect username or password";
      }
        
        
        
         //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

               
  
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/pills_8507306.png">

    <title>Coup Admin - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/skin_color.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(assets/images/auth-bg/bg-1.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Let's Get Started</h2>
								<p class="mb-0">Sign in to continue.</p>							
							</div>
							<div class="p-40">
								<form action="" method="post">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="txtUsername" class="form-control ps-15 bg-transparent" placeholder="Username">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" name="txtPassword" class="form-control ps-15 bg-transparent" placeholder="Password">
										</div>
									</div>
								
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-danger mt-10" name="btnSignIn">SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0">Don't have an account? <a href="auth_register.html" class="text-warning ms-5">Sign Up</a></p>
								</div>	
							</div>						
						</div>
						<div class="text-center">
						  <p class="mt-20 text-white">- Sign With -</p>
						  <p class="gap-items-2 mb-20">
							  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
							  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
							</p>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="assets/js/vendors.min.js"></script>
	<script src="assets/js/pages/chat-popup.js"></script>
  	<script src="assets/icons/feather-icons/feather.min.js"></script>	

</body>
</html>

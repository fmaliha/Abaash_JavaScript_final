<html>
<head>
	<title>Admin</title>
	<link rel="icon"  href="img/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='css/style.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/adreg.js"></script>

</head>

<body>

<?php
	//Establishing Connection with Server
	$connection = mysqli_connect("localhost", "root", "","ab");

	//Selecting Database from Server

	
	if(isset($_POST['submit'])){
   
	//Fetching variables of the form which travels in URL
    
 
	$un=$_POST['uname'];
    $email = $_POST['email'];
    
    
    $pass=md5($_POST['password']);
    $conpass=md5($_POST['conpass']);

    $sql="SELECT * FROM admin WHERE (un='$un' OR email='$email');";
	$res=mysqli_query($connection,$sql);
      if (mysqli_num_rows($res) > 0)
	  {
		  $row = mysqli_fetch_assoc($res);
        if ($un==$row['un'])
        {
           echo '<script> alert("Username already exists")</script>';
        }
		else if($email==$row['email'])
        {
            echo '<script> alert("Email already exists")</script>';
        }
	  }
   else
   {
   
	mysqli_query($connection,"INSERT INTO admin(un,pw,email) VALUES ('$un','$pass','$email')")
	 or die("Could not execute the insert query.");
     echo '<script> alert("Admin Create successful")</script>';
   }
   header("Location:admin.php");
}

?>	

	<!-- Menu -->
	 <div class="logo_menu">
	    <div class="neon">
		    <img src="img/logo.png">
	    </div>
		<ul class="main-nav">
		    	
        	 <li><a href="admin.php">Go to Admin Panel</a></li> 
		</ul>
		
	 </div>
			<br/><br/><br/><br/><br/>
			<hr style="border:2px solid green"></hr>
			
<div class="product_area">
<div class="reg">
	<form name="myForm" onsubmit="return validateForm()" method="POST" action="">
		
            
               <h2>Add Admin</h2>
			   <br>
			   <label>User Name:</label>
			   <br>
               <input type="text" name="uname" class="input" >
			   <br>
			   <label>Email:</label>
			   <br>
               <input type="email" name="email" class="input" >
			   <br>
			   <label>Password:</label>
			   <br>
               <input type="password" name="password" class="input" >
			   <br>
			   <label>Confirm Password:</label>
			   <br>
               <input type="password" name="conpass" class="input" >
			   <br>
			   
				
			     
			<input type="submit" value="Register" name="submit" class="btn sbtn">

				
			
		
	</form>
</div>
</div>

  

</body>
<br/><br/><br/>
	<footer class="footer">
		
	<ul>
		<li>
		<div>
			<img src="img/logo.png">	
		</div>
		<div>
			<font face="serif" size="4" color="skyblue">Follow us:</font>
			<a href="#" class="call"><i class="fa fa-facebook-f" style="font-size:30px;width:23px;background-color:black;color:white;padding-right: 15px"></i></a>
			<a href="#" class="call"><i class="fa fa-google" style="font-size:30px;background-color:black;color:white;padding-right: 12px"></i></a>
			<a href="#" class="call"><i class="fa fa-twitter" style="font-size:30px;background-color:black;color:white;padding-right: 9px"></i></a>

		</div>
       </li>
	   <li>
		<div class="contact">
			<h1><a name="contact"></a>Contact With Us</h1><br>
			<p>Phone No: 0175263939</p><br>
			<p>Email: abash.bd@gmail.com</p>

		</div>
       </li>
	   
	</ul>
		
	</footer>
</html>

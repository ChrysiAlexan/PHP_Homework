<?php
	

	$con=mysqli_connect("localhost","root","","formdb");
	$submit=$_POST['submit'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($submit=="Sign Up"){
		$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$date=$_POST['date'];
	
	
		 $q=mysqli_query($con,"INSERT INTO user(fname,lname,date,email,password) values ('$fname','$lname','$date','$email','$password')");
		 	if(mysqli_connect_errno()){		
		echo"fail".mysqli_connect_errno;}
		 header('Location:form2.html');
	}else{
		$q=mysqli_query($con, "SELECT * from user where email='$email' and password='$password'");

		if(mysqli_connect_errno()){		
		echo"fail".mysqli_connect_errno;
	}
		if(mysqli_num_rows($q)>0){
			echo"Success!";
			$fetch=mysqli_fetch_array($q,MYSQLI_ASSOC);

			print_r($fetch);
		}else 
			{ 
				echo "Your email or password was wrong";
			}
	}

		mysqli_close($con);
?>
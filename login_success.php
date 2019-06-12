<?php
	
	include 'db_connect.php';

	$username=$_POST['username'];
	$password=$_POST['password'];
	//echo $_SESSION['username'];
	
	if (isset($_POST ['username']) and isset($_POST ['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$_SESSION['username'] = 'username';
		$query = "SELECT * FROM `customers` WHERE Username = '$username' and Password = '$password'";
		$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
		$count = mysqli_num_rows($result);
		
		if ($count == 1) {
            	session_start();
           $_SESSION['username'] = $username;
            if ($username == '101') {
            
			header("Location: admin.php");
			echo "Login Successful";
			echo "<br>";
			echo "Welcome ";
			echo $_SESSION['username'];
			echo "<br>";
			echo "<a href='index.php'>Go to Homepage</a>";
			
		} else {
            header("Location: back.php");
			echo "Login Successful";
			echo "<br>";
			echo "Welcome ";
			echo $_SESSION['username'];
			echo "<br>";
			echo "<a href='index.php'>Go to Homepage</a>";
			
            }
        }else  { 
			header("Location: signIn.php?error=1");            
			//echo " Invalid Username/Password" . "<br>" . "Please try again";
		}
	}	
?>

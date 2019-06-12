<?php

include ('db_connect.php');

                $NAME = $_POST['name'];
                $EMAIL = $_POST['email'];
                $UNAME = $_POST['username'];
                $PASS = $_POST['password'];



$result=mysqli_query($conn, "SELECT Username FROM customers WHERE Username='$UNAME'");
if(!mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
				$sqli = "Insert INTO customers SET name = '$NAME', Username = '$UNAME', Email = '$EMAIL', Password = '$PASS'";
				$retval = mysqli_query($conn, $sqli);
				
				if($retval) {
                    
                    
					//echo "You are registered. Congrats !!!";
                    //echo "<a href='signIn.php'> Go back to login page </a>"; 
                    
                    header("Location: signup2.php?un=$UNAME");
                    
                     
                    // header("Location: signIn.php?pass=1");
                    
					}else {
					die('User not Added: '. mysqli_error($conn));
					mysqli_close($conn);
				    }
}else {
    
    //$message = "Error : Phone Number Already Exists !";
  //echo "<script type='text/javascript'>alert('$message');</script>";
  header("Location: signIn.php?fault=1");  
    
    
  //die('Error : Phone Number Already Exists !'.mysqli_error($conn));
  //echo "Phone Number Already exists ! ";
}
?>
<?php $ID = $_GET['id'];
$UN = $_GET['un'];
include ('db_connect.php');
session_start();
?>


<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--Theme custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<?php 
                
        $query3 = "SELECT id FROM customers where Username = $UN"; 
        $result3 = mysqli_query($conn, $query3);  
               if(mysqli_num_rows($result3) > 0)  
                   {
                       while($row = mysqli_fetch_array($result3))  
                           {
                           
                           $id = $row['id'];


$sqli = "Insert INTO home SET user = '$id' ";

                
				$retval = mysqli_query($conn, $sqli);
				
				if($retval) {
					echo "User Added successfully";  
					}else {
					die('User not Added: '. mysqli_error($conn));
					mysqli_close($conn);
				}
                       }
               }
                           header("Location:adduser5.php?id=$ID&un=$UN");
			?>
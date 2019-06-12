<?php 
include ('db_connect.php');
session_start();

$user = $_SESSION['username'];
//echo $_SESSION['username'];


$query3 = "SELECT * FROM customers where Username = $user";  
                    $result3 = mysqli_query($conn, $query3);  
                        if(mysqli_num_rows($result3) > 0)  
                            {
                                while($row = mysqli_fetch_array($result3))  
                                    { 
                                        $ID = $row['id'];
                                                            }
}
?>
<?php
if ($_SESSION['username'])
{ 
  
                ?>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="assets/css/styles.css">
    
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
    
<style>
        table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}
</style>

<body>
    <div class='preloader'>
        <div class='loaded'>&nbsp;</div>
    </div>
    
    <!-- Sections -->
    <section id="social" class="social">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="social-wrapper">
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
			


        

			
			
			
			
                <?php if(isset($_SESSION['username'])){?>
                <li><font color="black">Welcome
                    <?php 
                            $query = "SELECT name FROM customers WHERE Username= ". $_SESSION['username'];    
                            $result = mysqli_query($conn, $query);                         
                                if(mysqli_num_rows($result) > 0)  
                                    {  
                                        while($row = mysqli_fetch_array($result))  
                                            {                          
                                                echo $row['name']; ?>
                </font></li>
                <li class="login"><a href="logout.php?id=<?php echo $ID ?>" style="text-decoration:none">logout</a>
                    <?php                   }
                                    }
                     }else{ ?>
                <li class="login"><a href="signIn.php?id=<?php echo $ID ?>" style="text-decoration:none">login</a>
                          <?php 
}

				

?>
            </ul>
        </div>
    </div>
    </nav>

    <a href="adduser.php?id=<?php echo $ID ?>"><button class="button button1">Add New User</button></a>
    
    

<table align='center'>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Password</th>

            <?php
                $sql = "SELECT * FROM customers";
                    $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) { ?>
        </tr>
        <tr>
            <td hidden>
                <?php echo $row["id"];?>
            </td>
            <td>
                <?php echo $row["name"];?>
            </td>
            <td>
                <?php echo $row["Username"];?>
            </td>
            <td>
                <?php echo $row["Email"];?>
            </td>
            <td>
                <?php echo $row["Password"];?>
            </td>
            <td><a href="userpage.php?id=<?php echo $row["id"];?>">View User's Pages</a></td>
            <td><a href="editusers.php?id=<?php echo $row["id"];?>">Edit</a></td>
            <td><a href="deleteUserConfirmation.php?id=<?php echo $row["id"];?>">Delete</a>
        </tr>
        <?php   }
} else {
    echo "0 results";
}
$conn->close();
?>
    </table>
    


    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
    
    <?php
        if(isset($_GET['fault'])==true){
        $message = "Error : Phone Number Already Exists !";
  echo "<script type='text/javascript'>alert('$message');</script>";
    }
	?>
    
</body>
</html>

<?php 

}else {
	header("Location: signIn.php");
}

?>
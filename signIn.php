<!DOCTYPE html>
<html>
<head>
  <title>CMS</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/login.css"> 
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="signup.php" id="signup" method="post" onsubmit="var text = document.getElementById('username').value; if(text.length < 11) { alert('Phone Number is incorrect.'); return false; }if(text.length > 11) { alert('Phone Number is incorrect.'); return false; } return true;">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Name<span class="req">*</span>
              </label>
              <input type="text" name="name" id="name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Phone Number<span class="req">*</span>
              </label>
              <input type="number" name="username" id="username"  required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" id="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="Password" required autocomplete="off"/>
          </div>
              <div class="field-wrap">
              <a onclick="myFunction2()">Show Password</a> 
              </div>
            
              <button type="submit" class="button button-block">Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="login_success.php" method="post" >
          
           <div class="field-wrap">
            <label>
              Phone Number<span class="req">*</span>
            </label>
            <input type="text" name="username" id="username" required autocomplete="off"/>
           </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="password" required autocomplete="off"/>
          </div>
              <div class="field-wrap">
                     <a onclick="myFunction()">Show Password</a> 
              </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block">Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    
    
    
                <?php
    
    if(isset($_GET['error'])==true){
        $message = "Username and/or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
    }
        
    if(isset($_GET['fault'])==true){
        $message = "Error : Phone Number Already Exists !";
  echo "<script type='text/javascript'>alert('$message');</script>";
    }
        
    if(isset($_GET['pass'])==true){
        $message = "You are registered. Congrats !!!";
  echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
    ?>
    
    
    
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/index.js"></script>
    
    
<script type="text/javascript">
$(document).ready(function(){
	  $('.tab a').on('click', function (e) {
	  e.preventDefault();
	  
	  $(this).parent().addClass('active');
	  $(this).parent().siblings().removeClass('active');
	  
	  var href = $(this).attr('href');
	  $('.forms > form').hide();
	  $(href).fadeIn(500);
	});
});
    
    
    
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    

</body>
</html>
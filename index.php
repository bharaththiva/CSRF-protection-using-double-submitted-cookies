<?php 
     session_start(); //starting a session

     //setting a cookie
     $sessionID = session_id(); //storing session id
 
     setcookie("user_login",$sessionID,time()+3600,"/","localhost",false,true); //cookie-sessionid terminates after 1 hour - HTTP only flag
     
    $_SESSION['key']=bin2hex(random_bytes(32)); 
    $token = hash_hmac('sha256',"token for user login",$_SESSION['key']);  
    $_SESSION['CSRF_TOKEN'] = $token;

    setcookie("cToken",$token,time()+3600,"/","localhost",false,true); //cookie-token terminates after 1 hour

?>


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SSS Assignment 02</title>
  <script type="text/javascript" src="config.js"> </script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="login-page">
  <div class="form">
    
    <form class="login-form" method="POST" action="server.php">
      <input type="text" placeholder="username" name="username"/>
	<input type="password" placeholder="password" name="pass"/>
	<div> <input type="hidden" name="user_csrf" id="IdOfToken" value="<?php echo $token ?>" /> </div>
      <button name="submit">login</button>
      <p class="message">Done by: <a href="http://bharathsec.blogspot.com/2018/06/csrf-protection-using-double-submitted.html">Bharath Thivagaren</a></p>
    </form>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>

</body>
</html>




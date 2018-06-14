<?php

session_start(); //server session starts


if(isset($_POST['submit']))
{
    ob_end_clean(); //clean outer buffer memory
    validate($_POST['username'],$_POST['pass'],$_POST['user_csrf'],$_COOKIE['user_login']);

}


//validate login 
function validate($username, $password,$user_token,$user_sessionCookie)
{

    if($username=="admin" && $password=="1234" && $user_token==$_SESSION['CSRF_TOKEN'] && $user_sessionCookie==session_id())
    {
              	echo "<script> alert('Successfully logged in') </script>";
		echo "Welcome user "."<br/>"; 
        	echo "For more info visit: ".'<a href="http://bharathsec.blogspot.com/2018/06/csrf-protection-using-double-submitted.html", target="_blank" >'. "https://www.bharathsec.blogspot.com"."</a>"; 
        
    }
    else
    {
	echo "<script> alert('Failed to Login. Try again') </script>"; 
        echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";

    }

    
}
?>



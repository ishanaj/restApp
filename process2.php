<?php
 $error='';
 
 if (isset($_POST['submit'])) {
  	if (empty($_POST['user']) || (empty($_POST['pass']))) {
  		echo "<script>alert('You Missed Something'); window.location.href='signup.php'</script>";
  	}
  	else{
  		$user= $_POST['user'];
  		$pass= $_POST['pass'];
  		
  	    $conn = mysqli_connect("localhost","root","");
        $db=mysqli_select_db($conn,'login');
        $query=mysqli_query($conn,"SELECT * FROM user WHERE username='$user'");
        $rows=mysqli_num_rows($query);
         if(!$rows==1){
          	newuser();
          }
          else
          	echo "<script>alert('You Are Already Registered'); window.location.href='signup.php'</script>";
    }
  }
  function newuser()
  		{
  	     
  	    $conn = mysqli_connect("localhost","root","");
        $db=mysqli_select_db($conn,'login');
        $user= $_POST['user'];
  		$pass= $_POST['pass'];
  	    $query=mysqli_query($conn,"INSERT INTO user VALUES('$user','$pass','0')");
  	    if($query)
  	     echo "<script>alert('Successfully Registered'); window.location.href='welcome.php'</script>";
  	    } 
 ?>
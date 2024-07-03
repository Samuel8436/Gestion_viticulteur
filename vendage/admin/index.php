
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
	<link rel="icon" href="admin/images/logo.jpg" type="image" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="hover_input.css">
</head>
<body>

<form method = "post" >
  <h1>Admin Login</h1>
  <div class="inset">
  <p>
    <label for="email">NOM D'UTILISATEUR</label>
    <input style = "color:white;"type="text" name="username" id="email" autocomplete='off'>
  </p>
  <p>
    <label for="password">MOT DE PASSE</label>
    <input style = "color:white;" type="password" name="password" id="password">
  </p>

  </div>
   <center><p class="p-container" >
  
    <input type="submit" name="go" id="go" value="Log in">
	
  </p>
  </center>
</form>
	<?php
							include('../connectPDO.php');
							
							if(isset($_POST['go']))
							{
							
							$username=$_POST['username'];
							$password=$_POST['password'];
							
								
								$result = "SELECT * FROM admine WHERE username = '$username' AND password = '$password'";
								$result =  $db->prepare($result);
								$result->execute();
								$row =  $result->fetch(PDO::FETCH_ASSOC);
								// $row = mysqli_fetch_array($result);
								// $numberOfRows = mysqli_num_rows($result);				
																	
																
		if ($row == 0) 
			{
				echo " <br><center><font color= 'red' size='3'>Nom d'utilisateur et mot de passe incorrecte</center></font>";
			} 
		else if ($row > 0)
			{
			session_start();
			$_SESSION['id'] = $row['id'];
		header("location:../index.php");
		
	}	
							
							}
							?>
	



</body>
</html>

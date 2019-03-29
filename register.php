<?php
//require "layout.php";
$title = "Register";
require 'db.php';
include "layout/header.php";

$db = new db('config.json');
$errors = [];
$success =[];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	# code...
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$com_password = htmlspecialchars($_POST['com_password']);
	$check = !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($com_password);
	if ($check) {
		if ($password !== $com_password) {
			array_push($errors, 'Password does not match');
		}

		if (count($errors) == 0) {
			$pass = password_hash($password, PASSWORD_DEFAULT);
			$sql = 'INSERT INTO users (firstname, lastname, email, password, created_at)
			VALUES ("'.$firstname.'","'.$lastname.'","'.$email.'","'.$pass.'", CURDATE())';
			$result = $db->insert($sql);
			if ($result['error']) {
				array_push($errors, $result['error']);
				
				
			}else{
				array_push($success, 'Account created successfully, You can now login');
				/*$URI = $_SERVER['REQUEST_URI'];
				header("location:$URI");*/
			}
		}
	}else{
		array_push($errors, 'All fields are required');
	}

	
}
?>

<div class="reg">
	<?php
	if (count($success) > 0) {

	echo'<div class="response alert-success"><ul>';
	foreach ($success as $suc) {
		echo '<li>'.$suc.'</li>';
	}
	echo'</ul></div>';
	}
	?>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<div class="form-group">
	      <label for="firstname">First Name <span class="text-danger">*</span></label>
	      <input type="text" class="form-control" id="firstname" name="firstname" required>
	    </div>

	<div class="form-group">
	      <label for="lastname">Last Name  <span class="text-danger">*</span></label>
	      <input type="text" class="form-control" id="lastname" name="lastname" required>
	    </div>

	  <div class="form-group">
	      <label for="exampleFormControlInput1">Email address  <span class="text-danger">*</span></label>
	      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
	    </div>
	    
	<div class="form-group">
	      <label for="password">Password  <span class="text-danger">*</span></label>
	      <input type="password" class="form-control" id="password" name="password" required>
	    </div>

	<div class="form-group">
	      <label for="password">Confirm Password  <span class="text-danger">*</span></label>
	      <input type="password" class="form-control" id="password" name="com_password" required>
	    </div>
	   <button class="btn btn-primary" type="submit">Submit</button>
	</form>

	<?php
	if (count($errors) > 0) {

	echo'<div class="response alert-danger"><ul>';
	foreach ($errors as $error) {
		echo '<li>'.$error.'</li>';
	}
	echo'</ul></div>';
	}
	?>
</div>


<?php include "layout/footer.php"?>
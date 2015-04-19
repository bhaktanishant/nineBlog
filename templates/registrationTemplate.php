<?php require 'templates/header.php';?>

<?php
echo '<div class="container">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<form action="/class/blog/registration" method="POST" role="form">
			<legend class="text-center">Registration Form</legend>
		
			<div class="form-group">
				<label for="">First Name</label>
				<input type="text" class="form-control" name="fName" placeholder="First Name" value = "'.$data['reFName'].'">
				<div class="text-right" style ="color: red; font-size: 13px;">'.$data['fNameError'].'</div>
				<label for="">Last Name</label>
				<input type="text" class="form-control" name="lName" placeholder="Last Name" value = "'.$data['reLName'].'">
				<div class="text-right" style ="color: red; font-size: 13px;">'.$data['lNameError'].'</div>
				<label for="">Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username" value = "'.$data['reUsername'].'">
				<div class="text-right" style ="color: red; font-size: 13px;">'.$data['usernameError'].'</div>
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" placeholder="Email" value = "'.$data['reEmail'].'">
				<div class="text-right" style ="color: red; font-size: 13px;">'.$data['emailError'].'</div>
				<label for="">Password</label>
				<input type="text" class="form-control" name="password" placeholder="Password">
				<div class="text-right" style ="color: red; font-size: 13px;">'.$data['passwordError'].'</div>
			</div>
	
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>';
?>

<?php require 'templates/footer.php'; ?>
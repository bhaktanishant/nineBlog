<?php require 'templates/header.php';?>

<?php
echo '<div class="container">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<form action="/class/blog/admin-login" method="POST" role="form">
		<legend  class="text-center">Login Form</legend>
	
		<div class="form-group">
			<label for="">Username</label>
			<input type="text" class="form-control" name="u_name" placeholder="Username" value="'.$data['reUsername'].'">
			<label for="">Password</label>
			<input type="password" class="form-control" name="pass" placeholder="Password">
		</div>';
		if ($data['loginError']) {
			echo '<div class="alert alert-danger">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    <strong>'.$data['loginError'].'</strong>
			</div>';
		}
echo	'<button type="submit" class="btn btn-primary">Login</button>
	</form>
		</div>
</div>';
?>


<?php require 'templates/footer.php'; ?>
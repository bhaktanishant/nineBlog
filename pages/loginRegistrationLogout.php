<?php
$dataArray["loginError"] = null;
$dataArray['fNameError'] = $dataArray['lNameError'] = $dataArray['emailError'] = 
$dataArray['passwordError'] = $dataArray['usernameError'] = $dataArray['reFName'] = 
$dataArray['reLName'] = $dataArray['reUsername'] = $dataArray['reEmail'] = null;

class LoginRegistration{

	function ifLogin(){
		if (isset($_SESSION['username']) and isset($_SESSION['password']) and !empty($_SESSION['username']) and !empty($_SESSION['password'])) {
			return true;
		}else{
			return false;
		}
	}

	function doLogin($username, $password){
		$data = $GLOBALS['database']->has('user', ['AND' => ['username' => $username, 'password' => $password]]);
		if (!empty($data) and $_SESSION['username'] = $username and $_SESSION['password'] = $password){
			return true;
		}else{
			return false;
		}
	}

	function doRegistration($fName, $lName, $username, $password, $email){
		if ($lastUserId = $GLOBALS['database']->insert('user', ['username'=>$username,
			'firstName'=>$fName, 'lastName'=>$lName, 'email'=>$email, 'password'=>$password])) {
			return true;
		}else{
			return false;
		}
	}
}

$LoginRegistration = new LoginRegistration();

if ($dataArray['callFor'] == "login") {
	if ($LoginRegistration->ifLogin()) {
	header('Location: /class/blog');
	exit();
	}elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['u_name']) && isset($_POST['pass']) && !empty($_POST['u_name']) && !empty($_POST['pass'])) {
			$final_uname = $dataArray['reUsername'] = htmlentities($_POST['u_name']);
			$final_pass = htmlentities($_POST['pass']);
			if ($LoginRegistration->doLogin($final_uname, $final_pass)) {
				header('Location: /class/blog');
				exit();
			}else{
				$dataArray["loginError"] = "Invalide Username or Password !!";
			}
		}else{
			$dataArray["loginError"] = "Enter both Username and Password to login";
		}
	}
}elseif ($dataArray['callFor'] == "registration") {
	if ($LoginRegistration->ifLogin()) {
	header('Location: /class/blog/manage-post');
	exit();
	}elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['username']) and !empty($_POST['username'])) {
			$rawUsername = $dataArray['reUsername'] = htmlentities($_POST['username']);
			if (strlen($rawUsername) > 4) {
				if ($found = $GLOBALS['database']->has('user', ['username'=>$rawUsername])) {
					$dataArray['usernameError'] = "This Username is already registered";
				}else{
					$username = $rawUsername;
				}
			}else{
				$dataArray['usernameError'] = "Username should at least 5 character long";
			}
		}else{
			$dataArray['usernameError'] = "Enter Username";
		}
		if (isset($_POST['fName']) and !empty($_POST['fName'])) {
			$rawFName = $dataArray['reFName'] = htmlentities($_POST['fName']);
			if (strlen($rawFName) > 2) {
				$foundInt = (int)($rawFName);
				if (empty($foundInt)) {
					$fName = $rawFName;
				}else{
					$dataArray['fNameError'] = "First Name must containe only alphabets";
				}
			}else{
				$dataArray['fNameError'] = "First Name must have at least 3 character";
			}
		}else{
			$dataArray['fNameError'] = "Enter First Name";
		}
		if (isset($_POST['lName']) and !empty($_POST['lName'])) {
			$rawLName = $dataArray['reLName'] = htmlentities($_POST['lName']);
			if (strlen($rawLName) > 2) {
				$foundInt = (int)($rawLName);
				if (!$foundInt) {
					$lName = $rawLName;
				}else{
					$dataArray['lNameError'] = "Last Name must containe only alphabets";
				}
			}else{
				$dataArray['lNameError'] = "Last Name must have at least 3 character";
			}
		}else{
			$dataArray['lNameError'] = "Enter Last Name";
		}
		if (isset($_POST['password']) and !empty($_POST['password'])) {
			$rawPassword = htmlentities($_POST['password']);
			if (strlen($rawPassword) > 5) {
				$password = $rawPassword;
			}else{
				$dataArray['passwordError'] = "Password must have at least 6 character";
			}
		}else{
			$dataArray['passwordError'] = "Enter Password";
		}
		if (isset($_POST['email']) and !empty($_POST['email'])) {
			$rawEmail = $dataArray['reEmail'] = htmlentities($_POST['email']);
			if ($GLOBALS['database']->has('user', ['email'=>$rawEmail])) {
					$dataArray['emailError'] = "This Email is already registered";
				}else{
					$email = $rawEmail;
				}
		}else{
			$dataArray['emailError'] = "Enter Email";
		}
		if (!empty($fName) and !empty($lName) and !empty($username) and !empty($email) and !empty($password)) {
			if ($LoginRegistration->doRegistration($fName, $lName, $username, $password, $email)) {
				if ($LoginRegistration->doLogin($username, $password)) {
					header("Location: /class/blog/manage-post");
					exit();
				}else{
					echo "Registered succesfully but login failed";
				}
			}else{
				echo "Somthing went worng";
			}
		}
	}
}elseif ($dataArray['callFor'] == "logout") {
	session_unset();
}

?>
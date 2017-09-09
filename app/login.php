<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/connection.php');

/**
 * User authorization
 *
 * @param $email
 * @param $password
 * @param $mysqli
 * @return array
 */
function login($email, $password, $mysqli) {
	// if email is valid email address - find user by email, else by login
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$query = "SELECT * FROM users WHERE email='$email'";
	} else {
		$query = "SELECT * FROM users WHERE login='$email'";
	}
	$user = $mysqli->query($query);
	
	$errors = [];
	
	// if user found
	if ($user) {
		$user = $user->fetch_assoc();
		
		if(password_verify($password, $user['password'])) {
			session_start();
			$_SESSION['user']['id'] = $user['id'];
			$_SESSION['user']['ip'] = $_SERVER['REMOTE_ADDR'];
			
			header("Location: http://".$_SERVER['HTTP_HOST']);
			exit;
		} else {
			$errors['not_found_user'] = 'Password is incorrect.';
			return $errors;
		}
	} else {
		$errors['not_found_user'] = 'User with this email or login not found.';
		return $errors;
	}
}

// login request
if (isset($_POST['email']) || isset($_POST['password'])) {
	
	// data from login form
	$formData = $_POST;
	
	// array with errors
	$errors = [];
	
	// validation of form data
	foreach($formData as $fieldName => $value) {
		$formData[$fieldName] = htmlspecialchars(strip_tags(trim($value)));
		if (empty($value)) {
			$errors[$fieldName] = 'The field "' . $fieldName . '" is required!' . '<br>';
		}
	}
	
	// if no errors - attempt login
	if(!count($errors)) {
		$result = login($formData['email'], $formData['password'], $mysqli);
		if(is_array($result)) {
			$errors = $result;
		}
	}
}
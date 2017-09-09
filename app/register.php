<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/connection.php');

// array with countries for select list
$countriesArray = $mysqli->query('SELECT * FROM countries');

// data from registration form
$formData = $_POST;

// array with errors
$errors = [];

// validation of form data
foreach($formData as $fieldName => $value) {
	$formData[$fieldName] = htmlspecialchars(strip_tags(trim($value)));
	if (empty($value)) {
		$errors[$fieldName] = 'The field "' . $fieldName . '" is required!' . '<br>';
	} else {
		if (strlen($value) > 100) {
			$errors[$fieldName] = 'The field "' . $fieldName . '" may not be greater than 100 characters!' . '<br>';
		}
	}
}

//check password confirmation
if(isset($formData['password']) && isset($formData['password_confirmation'])) {
	if ($formData['password_confirmation'] !== $formData['password']) {
		$errors['password_confirmation'] = 'Passwords do not match!' . '<br>';
	}
}

// check if valid email address
if(isset($formData['email'])) {
	if(!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'The email must be a valid email address!' . '<br>';
	}
}

// check user is already exist (unique email and login)
$user = $mysqli->query('SELECT * FROM users WHERE (email = "' . ($formData['email'] ?? '') . '" or login = "' . ($formData['login'] ?? '') . '") limit 1');
if($user) {
	$user = $user->fetch_assoc();
	if (isset($formData['email'] ) && $formData['email'] == $user['email']) {
		$errors['email'] = 'User with this email already exist!' . '<br>';
	}
	if (isset($formData['login'] ) && $formData['login'] == $user['login']) {
		$errors['login'] = 'User with this login already exist!' . '<br>';
	}
}

if (count($formData) && !count($errors)) {
	$createUserQuery = "INSERT INTO users SET
		email = '" . $formData['email'] . "',
		login = '" . $formData['login'] . "',
		name = '" . $formData['name'] . "',
		birth_date = '" . date('Y-m-d H:i:s', strtotime($formData['birth_date'])) . "',
		country_id = '" . $formData['country'] . "',
		password = '" . password_hash($formData['password'], PASSWORD_DEFAULT) . "',
		registration_date = '" . strtotime('now') . "'
		;";
	
	$newUser = $mysqli->query($createUserQuery);
	
	// check if new user create succesfully - login
    if($newUser) {
	    require_once($_SERVER['DOCUMENT_ROOT'] . '/app/login.php');
	    login($formData['email'], $formData['password'], $mysqli);
	}
}

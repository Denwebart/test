<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/connection.php');

session_start();

// check is not autorized user and redirect to login
if (empty($_SESSION['user'])) {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/login.php");
	die();
}

$user = $mysqli->query('SELECT * FROM users WHERE id = ' . $_SESSION['user']['id'] . ';');
if($user) {
	$user = $user->fetch_assoc();
}
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');

// connection to database
$mysqli = new mysqli($host, $user, $password, $database);

// checking connection to database
if ($mysqli->connect_errno) {
	printf("Error: %s\n", $mysqli->connect_error);
	exit();
}

// creating table "users" if not exist
$creatingUsersTable = "CREATE TABLE IF NOT EXISTS `users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `email` varchar(100) NOT NULL UNIQUE,
	  `login` varchar(100) NOT NULL UNIQUE,
	  `name` varchar(100) NOT NULL,
	  `password` varchar(255) NOT NULL,
	  `birth_date` TIMESTAMP NOT NULL,
	  `country_id` int(11) NOT NULL,
	  `registration_date` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$mysqli->query($creatingUsersTable);

// creating table "countries" if not exist
$creatingCountriesTable = "CREATE TABLE IF NOT EXISTS `countries` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `title` varchar(100) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$mysqli->query($creatingCountriesTable);

// filling in countries table if empty
$countries = $mysqli->query('SELECT * FROM countries');
if(!count($countries->fetch_all())) {
	$fillingCountriesQuery ="INSERT INTO countries (title) VALUES ('Ukraine'), ('Belarus'), ('Russia'), ('Germany'), ('France'), ('United Kingdom'), ('Spain'), ('Italy');";
	$result = $mysqli->query($fillingCountriesQuery);
}
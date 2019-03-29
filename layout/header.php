<?php
$company = "ActionAid";
echo '
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>'.$title.'</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="./css/style.css">
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		</head>
		<body>
			<nav class="navbar navbar-expand-xl navbar-dark bg-primary">
			        <a class="navbar-brand" href="#">'.$company.'</a>
			    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbarLg">
			        <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="navbar-collapse collapse" id="collapsingNavbarLg">
			        <ul class="navbar-nav">
			            <li class="nav-item">
			                <a class="nav-link" href="/home.php">Dashbord</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" href="/donate.php">Donate</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" href="/logout.php">Logout</a>
			            </li>
			        </ul>
			    </div>
			</nav>
		<div class="content container">
		

	';
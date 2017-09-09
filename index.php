<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/auth.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
<!--    <link rel="icon" href="../../favicon.ico">-->

    <title>Current user info</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Hello, <?php echo $user['name'] ?>!</h3>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            <h4>Email:</h4>
            <p><?php echo $user['email'] ?></p>
        </div>
        <div class="col-lg-6">
            <h4>Name:</h4>
            <p><?php echo $user['name'] ?></p>
        </div>
        <div class="col-lg-6">
            <h4>Login:</h4>
            <p><?php echo $user['login'] ?></p>
        </div>
        <div class="col-lg-6">
            <h4>Birth Date:</h4>
            <p><?php echo date('d.m.Y', strtotime($user['birth_date'])) ?></p>
        </div>
        <div class="col-lg-6">
            <h4>Registration Date:</h4>
            <p><?php echo date('d.m.Y H:i', $user['registration_date']) ?></p>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> Test task for CodeIt</p>
    </footer>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>
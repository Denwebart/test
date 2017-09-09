<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/login.php'); ?>

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
	
	<title>Login form</title>
	
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
	
	<div class="row">
		<form action="login.php" method="POST" class="form-signin">
			<h2 class="form-signin-heading">Please sign in</h2>
            <div class="form-group <?php if (isset($errors['email'])): ?> has-error <?php endif; ?>">
                <label for="email" class="sr-only">Email address</label>
                <input type="text" name="email" id="email" value="<?php echo $formData['email'] ?? '' ?>" class="form-control" placeholder="Email address">
	            <?php if(isset($errors['email'])): ?>
                    <span class="help-block"><?php echo $errors['email']; ?></span>
	            <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['password'])): ?> has-error <?php endif; ?>">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
	            <?php if(isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password']; ?></span>
	            <?php endif; ?>
            </div>
			<?php if(isset($errors['not_found_user'])): ?>
                <p class="text-danger"><?php echo $errors['not_found_user']; ?></p>
			<?php endif; ?>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <br>
            <a href="registration.php">Registration</a>
		</form>
	</div>

</div> <!-- /container -->

</body>
</html>

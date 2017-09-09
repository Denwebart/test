<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/register.php'); ?>

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

    <title>Registration form</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/plugins/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="row">
        <form action="registration.php" method="post" class="form-signin">
            <h2 class="form-signin-heading">Registration</h2>
            
            <div class="form-group <?php if (isset($errors['email'])): ?> has-error <?php endif; ?>">
                <label for="email">Email address</label>
                <input type="text" name="email" value="<?php echo $formData['email'] ?? '' ?>" class="form-control" id="email" placeholder="Email">
			    <?php if(isset($errors['email'])): ?>
                    <span class="help-block"><?php echo $errors['email']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['login'])): ?> has-error <?php endif; ?>">
                <label for="login">Login</label>
                <input type="text" name="login" value="<?php echo $formData['login'] ?? '' ?>" class="form-control" id="login" placeholder="Login">
			    <?php if(isset($errors['login'])): ?>
                    <span class="help-block"><?php echo $errors['login']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['name'])): ?> has-error <?php endif; ?>">
                <label for="name">Real Name</label>
                <input type="text" name="name" value="<?php echo $formData['name'] ?? '' ?>" class="form-control" id="name" placeholder="Real Name">
			    <?php if(isset($errors['name'])): ?>
                    <span class="help-block"><?php echo $errors['name']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['birth_date'])): ?> has-error <?php endif; ?>">
                <label for="birth_date">Birth date</label>
                <div class='input-group' id='birth_date'>
                    <input type='text' name="birth_date" value="<?php echo $formData['birth_date'] ?? '' ?>" id="birth_date" class="form-control datepicker" placeholder="Birth date" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
			    <?php if(isset($errors['birth_date'])): ?>
                    <span class="help-block"><?php echo $errors['birth_date']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['country'])): ?> has-error <?php endif; ?>">
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Select country</option>
                    <?php foreach ($countriesArray as $country): ?>
                        <option value="<?php echo $country['id'] ?>" <?php if(isset($formData['country']) && $formData['country'] == $country['id']): ?> selected <?php endif; ?>>
                            <?php echo $country['title'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
			    <?php if(isset($errors['country'])): ?>
                    <span class="help-block"><?php echo $errors['country']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['password'])): ?> has-error <?php endif; ?>">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
			    <?php if(isset($errors['password'])): ?>
                    <span class="help-block"><?php echo $errors['password']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="form-group <?php if (isset($errors['password_confirmation'])): ?> has-error <?php endif; ?>">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
			    <?php if(isset($errors['password_confirmation'])): ?>
                    <span class="help-block"><?php echo $errors['password_confirmation']; ?></span>
			    <?php endif; ?>
            </div>
            <div class="checkbox">
                <input type="hidden" name="is_agree" value="0">
                <label>
                    <input type="checkbox" name="is_agree" id="is_agree" value="1" <?php if(isset($formData['is_agree']) && $formData['is_agree']): ?> checked <?php endif; ?>> I agree with terms and conditions
                </label>
			    <?php if(isset($errors['is_agree'])): ?>
                    <div class="clearfix"></div>
                    <span class="text-danger"><?php echo $errors['is_agree']; ?></span>
			    <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
            <br>
            <a href="login.php">Sign in</a>
        </form>
    </div>
</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'mm.dd.yyyy'
    });
</script>

</body>
</html>
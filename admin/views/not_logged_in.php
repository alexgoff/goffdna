

<!-- login form box -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Goff Surname DNA Study</title>
    <meta name="description" content="Goff Surname DNA Study Admin">

	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Merriweather|Raleway:400,300,600' rel='stylesheet' type='text/css'>

	<!-- css -->
	<link rel="stylesheet" href="/css/normalize.min.css">
	<link rel="stylesheet" href="/css/skeleton.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="twelve columns">
                <h1>Goff DNA Results Administrator Login</h1>
				<?php
					// show potential errors / feedback (from login object)
					if (isset($login)) {
						if ($login->errors) {
							foreach ($login->errors as $error) {
								echo $error;
							}
						}
						if ($login->messages) {
							foreach ($login->messages as $message) {
								echo $message;
							}
						}
					}
				?>
                <form method="post" action="index.php" name="loginform">
                    <div class="row">
                        <label for="login_input_username">Username</label>
                        <input id="login_input_username" class="login_input" type="text" name="user_name" required />
                    </div>
                    <div class="row">
                        <label for="login_input_password">Password</label>
                        <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />                        
                    </div>
                    <div class="row">
                        <input class="button-primary" type="submit"  name="login" value="Log in" />                        
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
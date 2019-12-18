<?php
      include("includes/config.php");
      include("includes/classes/Account.php");
      include("includes/classes/Constants.php");
      $account = new Account($con);

      include("includes/handlers/register-handler.php");
      include("includes/handlers/login-handler.php");

      function getInputValue($name) {
            if (isset($_POST[$name])) {
                  echo $_POST[$name];
            }
      }
?>

<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>Welcome To MEDIO</title>
            <link rel="stylesheet" href="assets/css/register.css">
            <link href="https://fonts.googleapis.com/css?family=Dosis:400,800&display=swap" rel="stylesheet">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script type="text/javascript" src="assets/js/register.js"></script>
      </head>
      <body>
            <?php
                  if (isset($_POST['registerButton'])) {
                        echo '<script type="text/javascript">
                                    $(document).ready(function() {
                                          $("#loginForm").hide();
                                          $("#registerForm").show();
                                    });
                              </script>';
                  } else {
                        echo '<script type="text/javascript">
                                    $(document).ready(function() {
                                          $("#loginForm").show();
                                          $("#registerForm").hide();
                                    });
                              </script>';
                  }
            ?>


            <div class="" id="background">
                  <div class="" id="loginContainer">
                        <div class="" id="inputContainer">
                              <!-- Login form -->
                              <form id="loginForm" action="register.php" method="POST">
                                    <h2>Login to your account</h2>
                                    <p>
                                          <?php echo $account->getError(Constants::$loginFailed); ?>
                                          <label for="loginUsername">Username</label>
                                          <input type="text" name="loginUsername" value="<?php getInputValue('loginUsername'); ?>" id="loginUsername" placeholder="e.g. Bart Simpson" required>
                                    </p>
                                    <p>
                                          <label for="loginPassword">Password</label>
                                          <input type="password" name="loginPassword" value="" id="loginPassword" required>
                                    </p>

                                    <button type="submit" name="loginButton">Log In</button>

                                    <div class="hasAccountText" id="">
                                          <br>
                                          <span id="hideLogin">Don't have an account yet? Sign up here.</span>
                                    </div>
                              </form>

                              <!-- Register form -->
                              <form id="registerForm" action="register.php" method="POST">
                                    <h2>Create your free account</h2>
                                    <p>
                                          <?php echo $account->getError(Constants::$usernameCharacters); ?>
                                          <?php echo $account->getError(Constants::$usernameExists); ?>
                                          <label for="username">Username</label>
                                          <input type="text" name="username" value="<?php getInputValue('username'); ?>" id="username" placeholder="e.g. BartSimpson" required>
                                    </p>
                                    <p>
                                          <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                                          <label for="firstName">First name</label>
                                          <input type="text" name="firstName" value="<?php getInputValue('firstName'); ?>" id="firstName" placeholder="e.g. Bart" required>
                                    </p>
                                    <p>
                                          <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                                          <label for="lastName">Last Name</label>
                                          <input type="text" name="lastName" value="<?php getInputValue('lastName'); ?>" id="lastName" placeholder="e.g. Simpson" required>
                                    </p>
                                    <p>
                                          <?php echo $account->getError(Constants::$emailDoNotMatch); ?>
                                          <?php echo $account->getError(Constants::$emailInvalid); ?>
                                          <?php echo $account->getError(Constants::$emailExists); ?>
                                          <label for="email">Email</label>
                                          <input type="email" name="email" value="<?php getInputValue('email'); ?>" id="email" placeholder="e.g. Bart@Simpson.com" required>
                                    </p>
                                    <p>
                                          <label for="email2">Confirm Email</label>
                                          <input type="email" name="email2" value="<?php getInputValue('email2'); ?>" id="email2" placeholder="e.g. Bart@Simpson.com" required>
                                    </p>
                                    <p>
                                          <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                                          <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                                          <?php echo $account->getError(Constants::$passwordCharacters); ?>
                                          <?php echo $account->getError(Constants::$passwordNotNumber); ?>
                                          <label for="password">Password</label>
                                          <input type="password" name="password" value="" id="password" required>
                                    </p>
                                    <p>
                                          <label for="password2">Confirm Password</label>
                                          <input type="password" name="password2" value="" id="password2" required>
                                    </p>

                                    <p>
                                          <input type="checkbox" id="termsAndService" name="termsandservice" value="" required>
                                          By signing up, you agree to our Terms and Privacy policy.
                                    </p>

                                    <button type="submit" name="registerButton">Register</button>

                                    <div class="hasAccountText" id="">
                                          <br>
                                          <span id="hideRegister">Already have an account? Log in here.</span>
                                          <br>
                                          <br>
                                          <span><a id="hideTermsAndPrivacy">Our terms and privacy</a></span>
                                    </div>
                              </form>
                        </div>

                        <div class="" id="loginText">
                              <h1>Listen to great music, with Medio</h1>
                              <h2>Find what you like, and have a listen.</h2>
                              <ul>
                                    <li>Discover music fall in love with</li>
                                    <li>Create your own playlists</li>
                                    <li>Follow artists to keep up to date</li>
                              </ul>
                        </div>
                  </div>
            </div>
      </body>
</html>

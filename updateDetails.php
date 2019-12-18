<?php
      include("includes/includedFiles.php");
?>

<div class="entityInfo">
      <div class="centerSection">
            <div class="userInfo">
                  <h1><?php echo $userLoggedIn->getFirstAndLastName(); ?></h1>
            </div>
      </div>
</div>

<div class="userDetails">
      <div class="container borderBottom">
            <h2>Email</h2>
            <input type="text" class="email" name="email" value="<?php echo $userLoggedIn->getEmail(); ?>" placeholder="Email address">
            <span class="message"></span>
            <button class="button" type="button" name="button" onclick="updateEmail('email')">Change email</button>
      </div>

      <div class="container container2">
            <h2>Password</h2>
            <input type="password" class="oldPassword" name="oldPassword" value="" placeholder="Current password">
            <input type="password" class="newPassword1" name="newPassword1" value="" placeholder="New password">
            <input type="password" class="newPassword2" name="newPassword2" value="" placeholder="Confirm password">
            <span class="message"></span>
            <button class="button" type="button" name="button" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">Change password</button>
      </div>
</div>

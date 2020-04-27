<?php
include("dbConfig.php");
include("Include/classes/Account.php");
include("Include/classes/Constants.php");

$account = new Account($con);


include("Include/Handlers/register-handler.php");

?>

<html>
<head>
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="Assets/js/register.js"></script>
</head>
<body>
<?php
if (isset($_POST['registerButton'])) {
    echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
} else {
    echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
}

?>
<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">
            <form id="loginForm" action="register.php" method="POST">
                <h2>LOGIN TO YOUR ACCOUNT</h2>
                <p>
                    <?php echo $account->getError(Constants::$incorrectCredits) ?>
                    <label id="usernameLabel">Nazwa użytkownika</label>
                    <input id="usernameBox" name="usernameBox" type="text" placeholder="Nazwa użytkownika" required>
                </p>
                <p>
                    <label id="passwordLabel">Hasło</label>
                    <input id="passwordBox" name="passwordBox" type="password" placeholder="Hasło" required>
                </p>
                <button id="loginButton" type="submit" name="loginButton">Log In</button>

                <div class="hasAccountText">
                    <span id="hideLogin">Don't have an account yet? Signup here.</span>
                </div>
            </form>
            <form id="registerForm" action="register.php" method="POST">
                <h2>Create your free account</h2>
                <p>
                    <?php echo $account->getError(Constants::$usernameCharacters) ?>
                    <?php echo $account->getError(Constants::$checkUsernameQuery) ?>
                    <label id="loginLabel">Nazwa użytkownika</label>
                    <input id="loginBox" name="loginBox" type="text" placeholder="Nazwa użytkownika" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$checkEmailQuery) ?>
                    <label id="emailLabel">E-mail</label>
                    <input id="emailBox" name="emailBox" type="text" placeholder="E-mail" required>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>

                </p>
                <p>
                    <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
                    <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Constants::$passwordCharacters); ?>
                    <label id="passwordLabel">Hasło</label>
                    <input id="pswrdBox" name="pswrdBox" type="password" placeholder="Hasło" required>
                </p>
                <p>
                    <label id="pswrd2Label">Potwierdź hasło</label>
                    <input id="pswrd2Box" name="pswrd2Box" type="password" placeholder="Hasło" required>
                </p>
                <p>
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <label id="nameLabel">Imię</label>
                    <input id="nameBox" name="nameBox" type="text" placeholder="Imię">
                </p>
                <p>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <label id="surnameLabel">Nazwisko</label>
                    <input id="surnameBox" name="surnameBox" type="text" placeholder="Nazwisko">
                </p>
                <button id="registerButton" type="submit" name="registerButton">Sign Up</button>
                <div class="hasAccountText">
                    <span id="hideRegister">Already have an account? Log in here.</span>
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>

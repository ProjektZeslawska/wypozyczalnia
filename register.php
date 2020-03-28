<?php
?>

<html>
<head>
    <title>REGISTER</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="Assets/js/register.js"></script>
    <script>
        function pesel() {
            document.getElementById('person').style.display = 'block';
            document.getElementById('company').style.display = 'none';

        }

        function nip() {
            document.getElementById('person').style.display = 'none';
            document.getElementById('company').style.display = 'block';
        }
    </script>
</head>
<body>
<?php
if(isset($_POST['registerButton'])) {
    echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
}
else {
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
                    <label id="usernameLabel">Username</label>
                    <input id="usernameBox" name="usernameBox" type="text" placeholder="Username" required>
                </p>
                <p>
                    <label id="passwordLabel">Password</label>
                    <input id="passwordBox" name="passwordBox" type="password" placeholder="Password" required>
                </p>
                <button id="loginButton" type="submit" name="loginButton">Log In</button>

                <div class="hasAccountText">
                    <span id="hideLogin">Don't have an account yet? Signup here.</span>
                </div>
            </form>
            <form id="registerForm" action="register.php" method="POST">
                <h2>Create your free account</h2>
                <input type="radio" name="status" onclick="pesel()" > Person
                <input type="radio" name="status" onclick="nip()"> Company

                <p>
                    <label id="loginLabel">Login</label>
                    <input id="loginBox" name="loginBox" type="text" placeholder="Login" required>
                </p>
                <p>
                    <label id="emailLabel">E-mail</label>
                    <input id="emailBox" name="emailBox" type="text" placeholder="E-mail" required>
                </p>
                <p>
                    <label id="passwordLabel">Password</label>
                    <input id="pswrdBox" name="pswrdBox" type="text" placeholder="Password" required>
                </p>
                <p>
                    <label id="pswrd2Label">Confirm password</label>
                    <input id="pswrd2Box" name="pswrd2Box" type="text" placeholder="Password" required>
                </p>
                <div id="person" class="person">
                    <p>
                        <label id="peselLabel">Pesel</label>
                        <input id="peselBox" name="peselBox" type="text" placeholder="Pesel" required>
                    </p>
                    <p>
                        <label id="nameLabel">Imię</label>
                        <input id="nameBox" name="nameBox" type="text" placeholder="Name" required>
                    </p>
                    <p>
                        <label id="surnameLabel">Nazwisko</label>
                        <input id="surnameBox" name="surnameBox" type="text" placeholder="Surname" required>
                    </p>
                </div>
                <div id="company" class="company">
                    <p>
                        <label id="nipLabel">NIP</label>
                        <input id="nipBox" name="nipBox" type="text" placeholder="NIP" required>
                    </p>
                    <p>
                        <label id="companyNameLabel">Company name</label>
                        <input id="companyBox" name="companyBox" type="text" placeholder="Company name" required>
                    </p>
                </div>
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

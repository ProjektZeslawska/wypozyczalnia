<?php

class Account {
    /**
 * @var PDO
 */
    private $con;
    private $errorArray;

    public function __construct($con) {
        $this->errorArray = array();
        $this->con = $con;
    }

    public function login($login, $password) {
        $password = md5($password);
        $query = $this->con->prepare("SELECT * FROM users WHERE Username='$login' AND Password='$password'");
        $query->execute();

        if ($query->rowCount() == 1)
            return true;
        else {
            array_push($this->errorArray, Constants::$incorrectCredits);
            return false;
        }
    }

    public function register($login, $password, $password2, $email, $name, $surname) {
        $this->validateLogin($login);
        $this->validatePassword($password, $password2);
        $this->validateEmail($email);
        $this->validateName($name);
        $this->validateSurname($surname);

        if (empty($this->errorArray)) {
            return $this->insertData($login, $password, $email, $name, $surname);
        } else {
            return false;
        }
    }

    public function insertData($login, $password, $email, $name, $surname) {
        $encryptedPw = md5($password);

        $profiePic = "assets/images/ProfilePic.jpg";
        $date = date("Y-m-d");

        $result = $this->con->prepare("INSERT INTO users VALUES 
        ('', '$login', '$encryptedPw', '$name', '$surname', '$email', '$date', '$profiePic')");


        return $result->execute();
    }

    public function getError($error) {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    //region VALIDATE
    private function validateLogin($login) {
        if (strlen($login) > 25 || strlen($login) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $checkUsernameQuery = $this->con->prepare("SELECT Username FROM users WHERE Username='$login'");
        $checkUsernameQuery->execute();
        if ($checkUsernameQuery->rowCount() != 0) {
            array_push($this->errorArray, Constants::$checkUsernameQuery);
            return;
        }
    }

    private function validatePassword($password, $password2) {
        if ($password != $password2) {
            array_push($this->errorArray, Constants::$passwordsDoNoMatch);
        }
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
        }
        if (strlen($password) > 32 || strlen($password) < 5) {
            array_push($this->errorArray, Constants::$passwordCharacters);
        }
    }

    private function validateEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }
        $checkEmailQuery = $this->con->prepare("SELECT Email FROM users WHERE Email='$email'");
        if ($checkEmailQuery->rowCount() != 0) {
            array_push($this->errorArray, Constants::$checkEmailQuery);
            return;
        }

    }

    private function validateName($name) {
        if (strlen($name) > 30 || strlen($name) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validateSurname($surname) {
        if (strlen($surname) > 30 || strlen($surname) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;

        }
    }
//endregion
}
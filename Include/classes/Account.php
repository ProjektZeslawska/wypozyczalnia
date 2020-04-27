<?php


class Account
{
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->errorArray = array();
        $this->con = $con;
    }

    public function register($login, $password, $password2, $email, $name, $surname)
    {
        $this->validateLogin($login);
        $this->validatePassword($password, $password2);
        $this->validateEmail($email);
        $this->validateName($name);
        $this->validateSurname($surname);

        if(empty($this->errorArray) == true) {
            //Insert into db
            return true;
        }
        else {
            return false;
        }
    }
    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function validateLogin($login)
    {
        if (strlen($login) > 25 || strlen($login) < 5) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }
    }

    private function validatePassword($password, $password2)
    {
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

    private function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

    }
    private function validateName($name)
    {
        if (strlen($name) > 30 || strlen($name) < 2) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validateSurname($surname)
    {
        if (strlen($surname) > 30 || strlen($surname) < 2) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;

        }
    }

}
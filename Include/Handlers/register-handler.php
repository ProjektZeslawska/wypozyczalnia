<?php

function sanitizeMail($mail)
{
    $mail = strip_tags($mail);
    $mail = str_replace(" ", "", $mail);
    return $mail;
}

function sanitizeName($name)
{
    $name = strip_tags($name);
    $name = str_replace(" ", "", $name);
    $name = ucfirst(strtolower($name));

    return $name;
}

function sanitizePassword($password)
{
    $password = strip_tags($password);

    return $password;
}

if(isset($_POST['registerButton'])){
    $login = sanitizeMail('loginBox');
    $email = sanitizeMail('emailBox');
    $pswrd = sanitizePassword('pswrdBox');
    $pswrd2 = sanitizePassword('pswrd2Box');
    $pesel = sanitizePassword('peselBox');
    $name = sanitizeName('nameBox');
    $surname = sanitizeName('surnameBox');
    $nip = sanitizePassword('nipBox');
    $companyName = sanitizeName('companyBox');


}

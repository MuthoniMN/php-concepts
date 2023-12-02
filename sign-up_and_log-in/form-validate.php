<?php
function checkForEmpty($inputField)
{
    if (empty($inputField)) {
        return true;
    }
    return false;
}

function checkForInvalidText($string)
{
    if (!preg_match("/^[a-zA-z\s]*$/", $string)) {
        return true;
    }
    return false;
}

function checkForInvalidUsername($string)
{
    if (!preg_match("/^[A-Za-z0-9_]*$/", $string)) {
        return true;
    }
    return false;
}

function checkForInvalidEmail($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function checkForInvalidURL($str)
{
    if (!filter_var($str, FILTER_VALIDATE_URL)) {
        return true;
    }
    return false;
}

function checkForInvalidPassword($password)
{
    $regex = "#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
    if (!preg_match($regex, $password)) {
        return true;
    }
    return false;
}

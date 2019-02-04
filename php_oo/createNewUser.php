<?php

//Using the $_SERVER global variable to specify a file path
require($_SERVER['DOCUMENT_ROOT'] . "/comp0034-forms/php/User.php");

$newUser = new User($_POST);

$errors = $newUser->validate();

if (isEmpty($errors)) {
    $newUser->insert();
} else {
    echo "error";
    print_r($errors);
    header("Location: ../validation_php.php");
    exit;
}
if(isEmpty($errors)){
    header("Location: success.php");
    exit;
} else {
    echo "error";
    print_r($errors);
    header("Location: ../validation_php.php");
    exit;
}
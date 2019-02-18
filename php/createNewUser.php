<?php

//Using the $_SERVER global variable to specify a file path
require($_SERVER['DOCUMENT_ROOT'] . "/comp0034-forms/php/validation.php");
require($_SERVER['DOCUMENT_ROOT'] . "/comp0034-forms/php/dbConnection.php");

//Check all form fields are complete
foreach ($_POST as $key => $value) {
    if (isEmpty($value)) {
        $errors[] = $key . " cannot be blank";
    }
}

//Reformat the string data
$firstname = checkInput($_POST['firstname']);
$lastname = checkInput($_POST['lastname']);
$email = checkInput($_POST['email']);

//Check that the email format is valid
if (!isValidEmail($email)) {
    $errors[] = "Invalid email format";
}

//Hash the password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//Check if the user exists
$query = "SELECT userid FROM user WHERE email = '" .$email ."' LIMIT 1";

$connection = connectToDb();
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $errors[] = "An account already exists for this email address";
    mysqli_free_result($result);
}

//If there are errors return to form otherwise try to create the user
if (count($errors) > 0) {
    closeDb($connection);
    displayErrors($errors);
    //header("Location: ../validation_php.php");
    exit;
} else {
    $qryAdd = "INSERT INTO user (firstname, lastname, email, password) VALUES (";
    $qryAdd .= "'" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $password . "')";
    echo $qryAdd;
    $result = mysqli_query($connection, $qryAdd);
    if (!$result) {
        $errors[] = "Database error: " . mysqli_error($connection);
        closeDb($connection);
        header("Location: ../validation_php.php");
        exit;
    }
    closeDb($connection);
    header("Location: success.php");
    exit;
}
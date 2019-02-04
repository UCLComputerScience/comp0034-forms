<?php
function checkInput($data)
{
    $data = trim($data);
    $data = mysqli_real_escape_string($data);
    return $data;
}

// Empty if not set or is submitted only with spaces
function isEmpty($data)
{
    return !isset($data) || trim($data) === '';
}

// filter_var() to validate an email address
function isValidEmail($data)
{
    return filter_var($data, FILTER_VALIDATE_EMAIL);
}

function displayErrors($errors = array())
{
    $output = '';
    if (!empty($errors)) {
        $output .= "Fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . $error . "</li>";
        }
        $output .= "</ul>";
    }
}
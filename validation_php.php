<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="application/javascript" src="js/validation.js" defer></script>
    <title>COMP0034 Form validation using HTML, JavaScript and PHP</title>
</head>
<body>
<div class="container">
    <hr>
    <div id="errors" class="text-danger">
        <?php
        include('php/validation.php');
        $errors = [];
        echo displayErrors($errors);
        ?>
    </div>
    <form name="user" action="php/createNewUser.php" method="post"">
        <div class="form-group">
            <legend>Form</legend>
            <label for="firstname" class="control-label">First name</label>
            <input type="text" id="firstname" name="firstname" pattern="[A-Z][a-z]*" title="First letter must be capitalised" required>
            <label class="text-danger" id="firstnameError"></label>
            <label for="lastname" class="control-label">Last name</label>
            <input type="text" id="lastname" name="lastname" minlength="3" required>
            <label for="email" class="control-label">Email</label>
            <input type="email" name="email" id="email">
            <label for="password" class="control-label">Password</label>
            <input type="password" id="password" name="password">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col">
            <p>PHP validation applied:</p>
            <ul>
                <li>Prepares data to avoid common problems with format</li>
                <li>Checks that the email is a valid address format</li>
                <li>Checks that all fields are complete</li>
                <li>Error messages displayed at top of form</li>
            </ul>
        </div>
        <div class="col">
            <p>HTML validation applied:</p>
            <ul>
                <li>First name and last name are required</li>
                <li>Email requires email address format</li>
                <li>First name must begin with a capital letter followed by lowercase letters</li>
                <li>Last name length is between 3 and 10</li>
                <li>First name and last name must start with a capital letter followed by lowercase letters</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
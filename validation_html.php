<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>COMP0034 Form validation using HTML only</title>
</head>
<body>
<div class="container">
    <hr>
    <form>
        <legend>Form</legend>
        <label for="firstname">First name</label>
        <input type="text" id="firstname" name="firstname" pattern="[A-Z][a-z]+" required>
        <label for="lastname">Last name</label>
        <input type="text" id="lastname" name="lastname" minlength="3" maxlength="10" required>
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="18" max="30" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <hr>
    <p>HTML validation applied:</p>
    <ul>
        <li>First name, last name and age are required</li>
        <li>Email requires email address format</li>
        <li>First name must start with a capital letter followed by lowercase letters</li>
        <li>Last name min length is 3 and max length is 10</li>
        <li>Age must be a number and must be between 18 and 30</li>
    </ul>
    <br>
</div>
</body>
</html>
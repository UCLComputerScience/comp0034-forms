<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>COMP0034 Forms</title>
</head>
<body>
    <form>
        <fieldset>
            <legend>Input elements</legend>
            <label for="name">Text input</label>
            <input type="text" id="name" name="name" placeholder="Enter name"><br>
            Email input<input type="email" name="email" placeholder="email"><br>
            Password input<input type="password" name="password" placeholder="password"><br>
            Search input<input type="search" name="search" placeholder="search"><br>
            Checkbox input<input type="checkbox" name="checkbox"><br>
            Radio input (checked)<input type="radio" name="radio" checked="checked"/><br>
            Date input<input type="date" name="date"><br>
            Reset button<input type="reset"><br>
            Button input<input type="button" name="button" value="My button"><br>
            Submit input<input type="submit" name="submit" value="Go">
        </fieldset>
        <fieldset>
            <legend>Text area</legend>
            <textarea rows="3" cols="100" placeholder="Type your comments here."></textarea>
        </fieldset>
        <fieldset>
            <legend>Drop down lists</legend>
            Single selection with default value<select name="favoritecharacter">
                <option>Frodo</option>
                <option>Bilbo</option>
                <option selected="selected">Gandalf</option>
                <option>Galandriel</option>
            </select><br>
            Multiple selection<select multiple name="cars[]"> <!-- Note that cars is an array-->
                <option>Volvo</option>
                <option>VW</option>
                <option>Audi</option>
                <option>Ford</option>
            </select><br>
            Option groups<select name="favoritecharacter">
                <optgroup label="Major Characters">
                    <option>Frodo</option>
                    <option>Sam</option>
                    <option>Gandalf</option>
                    <option>Aragorn</option>
                </optgroup>
                <optgroup label="Minor Characters">
                    <option>Galandriel</option>
                    <option>Bilbo</option>
                </optgroup>
            </select><br>
        </fieldset>
        <fieldset>
            <legend>Radio group</legend>
            <!-- Use the same name="" attribute to group the selection-->
            <input type="radio" name="cc" value="visa" checked="checked" /> Visa<br>
            <input type="radio" name="cc" value="mastercard" /> MasterCard<br>
            <input type="radio" name="cc" value="amex" /> American Express<br>
        </fieldset>
    </form>
</body>
</html>
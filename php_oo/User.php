<?php
require_once('dbConnection.php');
require('validation.php');

class User
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $houseNum;
    public $street;
    public $city;
    public $postcode;

    protected $errors;

    public function __construct($args)
    {
        $this->firstName = $args['firstname'];
        $this->lastName = $args['lastname'];
        $this->email = $args['email'];
        $this->password = $args['password'];
        $this->houseNum = $args['houseNum'] ?? '';
        $this->street = $args['street'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->postcode = $args['postcode'] ?? '';

        /*
        foreach($args as $key => $value) {
           if(property_exists($this, $key)) {
             $this->$key = $value;
           }
        }
        */
    }

    function validate()
    {

        //Check all form fields are complete
        if (isEmpty($this->firstName) || isEmpty($this->lastName) || isEmpty($this->password) || isEmpty($this->email)) {
            array_push($errors, "All fields must be completed");
        }

        //Reformat the data
        $this->firstName = checkInput($this->firstName);
        $this->lastName = checkInput($this->lastName);
        $this->email = checkInput($this->email);

        //Check that the email format is valid
        if (!isValidEmail($this->password)) {
            array_push($errors, "Invalid email format");
        }

        //Hash the password
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        if (!isEmpty($errors)) {
            return $errors;
        }

    }

    function addAddress($houseNum, $street, $city, $postcode)
    {
        $this->houseNum = $houseNum;
        $this->street = $street;
        $this->city = $city;
        $this->postcode = $postcode;
    }

    function insert()
    {
        //check if user exists
        $result = $this->select();

        if (mysqli_num_rows($result) > 0) {
            $errors = "Sorry your details are already registered";
        } else {
            $connection = connectToDb();

            $qryAdd = "INSERT INTO user (firstname, lastname, email, password) VALUES (";
            $qryAdd .= "'" . $this->firstName . "', '" . $this->lastName . "', '" . $this->email . "', '" . $this->password . "')";

            $result = mysqli_query($connection, $qryAdd);
            // check the query worked
            if (!$result) {
                $errors = "Database error: " . mysqli_error($connection);
            }
            closeDb($connection);
        }
        return $errors;
    }

    function select()
    {
        $query = "SELECT userid FROM user ";
        $query .= "WHERE firstname = '" . $this->firstName . "' AND lastname = '" . $this->lastName . "' AND email = '" . $this->email . "'";
        echo $query;
        $connection = connectToDb();
        $result = mysqli_query($connection, $query);
        closeDb($connection);
        return $result;
    }

    //not implemented
    function delete()
    {

    }

    //not implemented
    function update()
    {

    }

    function insertAddress()
    {
        $result = $this->selectUser();
        $userid = $result['userid'];
        $qry = "INSERT INTO address (houseNum, street, city, postcode) VALUES (";
        $qry .= "'" . $this->houseNum . "', '" . $this->street . "', '" . $this->city . "', '" . $this->postcode . "')";
        $connection = connectToDb();
        mysqli_query($connection, $qry);
        $addressid = mysqli_insert_id($connection);
        $qry = "INSERT INTO user_address (userid, addressid) VALUES ('" . $userid . "'', '" . $addressid . "')";
        mysqli_query($connection, $qry);
        closeDb($connection);
    }
}
<?php
    namespace Models;

    use Models\Person as Person;

    class Admin extends Person
    {

       public function __construct($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber)
        {
            parent::__construct($email, $password,  $name, $lastName, $dni, $gender, $birthDate, $phoneNumber);
        }
 
    }
?>


<?php 
    namespace Model;

    require_once "./person.php";
    use Model\Person;

    class Admin extends Person
    {
        private $id_admin;

        public function __construct($email, $password, $name, $lastName, $dni, $gender, $dateOfBirth, $phoneNumber, $city, $street, $number, $floor, $apartment)
        {
            parent::__construct($email, $password, $name, $lastName, $dni, $gender, $dateOfBirth, $phoneNumber, $city, $street, $number, $floor, $apartment);
            $this->id_admin = 1;
        }

        /**
         * Get the value of id_admin
         */ 
        public function getId_admin()
        {
                return $this->id_admin;
        }
    }

?>
<?php 
    namespace Model;

    require_once "./user.php";
    require_once "./address.php";

    use Model\Address;
    use Model\User;

    class abstract Person extends User
    {
        private $name;
        private $lastName;
        private $dni;
        private $gender;
        private $dateOfBirth;
        private $phoneNumber;
        private $address;

        public function __construct($email, $password, $name, $lastName, $dni, $gender, $dateOfBirth, $phoneNumber, $city, $street, $number, $floor = null, $apartment = null)
        {
            parent::__construct($email, $password);
            $this->name = $name;
            $this->lastName = $lastName;
            $this->dni = $dni;
            $this->gender = $gender;
            $this->dateOfBirth = $dateOfBirth;
            $this->phoneNumber = $phoneNumber;
            $this->address = new Address($city, $street, $number, $floor, $apartment);
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of lastName
         */ 
        public function getLastName()
        {
                return $this->lastName;
        }

        /**
         * Set the value of lastName
         *
         * @return  self
         */ 
        public function setLastName($lastName)
        {
                $this->lastName = $lastName;

                return $this;
        }

        /**
         * Get the value of dni
         */ 
        public function getDni()
        {
                return $this->dni;
        }

        /**
         * Set the value of dni
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
                $this->dni = $dni;

                return $this;
        }

        /**
         * Get the value of gender
         */ 
        public function getGender()
        {
                return $this->gender;
        }

        /**
         * Set the value of gender
         *
         * @return  self
         */ 
        public function setGender($gender)
        {
                $this->gender = $gender;

                return $this;
        }

        /**
         * Get the value of dateOfBirth
         */ 
        public function getDateOfBirth()
        {
                return $this->dateOfBirth;
        }

        /**
         * Set the value of dateOfBirth
         *
         * @return  self
         */ 
        public function setDateOfBirth($dateOfBirth)
        {
                $this->dateOfBirth = $dateOfBirth;

                return $this;
        }

        /**
         * Get the value of phoneNumber
         */ 
        public function getPhoneNumber()
        {
                return $this->phoneNumber;
        }

        /**
         * Set the value of phoneNumber
         *
         * @return  self
         */ 
        public function setPhoneNumber($phoneNumber)
        {
                $this->phoneNumber = $phoneNumber;

                return $this;
        }

        /**
         * Get the value of address
         */ 
        public function getAddress()
        {
                return $this->address;
        }
    }

?>
<?php 
    namespace Model;

    require_once "./user.php";
    require_once "./address.php";

    use Model\Address;
    use Model\User;

    class Company extends User
    {
        private $name;
        private $cuil;
        private $address;

        public function __construct($email, $password, $name, $cuil, $city, $street, $number, $floor = null, $apartment = null)
        {
            parent::__construct($email, $password);
            $this->name = $name;
            $this->cuil = $cuil;
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
         * Get the value of cuil
         */ 
        public function getCuil()
        {
                return $this->cuil;
        }

        /**
         * Set the value of cuil
         *
         * @return  self
         */ 
        public function setCuil($cuil)
        {
                $this->cuil = $cuil;

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
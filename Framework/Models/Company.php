<?php 
    namespace Models;

    //use Models\Address as Address;
  
    class Company 
    {
        private $name;
        private $cuil;
        private $address;
        private $phoneNumber;
        private $email;

        public function __construct($name, $cuil, $address, $phoneNumber, $email)
        {
            
            $this->name = $name;
            $this->cuil = $cuil;
            $this->address = $address;
            //$this->address = new Address($city, $street, $number, $floor, $apartment);
            $this->phoneNumber = $phoneNumber;
            $this->email = $email;
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
        public function getPhoneNumber()
        {
                return $this->phoneNumber;
        }
        public function getEmail()
        {
                return $this->email;
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
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Set the value of address
         *
         * @return  self
         */ 
        public function setAddress($address)
        {
                $this->address = $address;

                return $this;
        }
    }

?>
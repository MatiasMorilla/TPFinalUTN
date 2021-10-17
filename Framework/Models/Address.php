<?php 
    namespace Models;

    class Address
    {
        private $city;
        private $street;
        private $number;
        private $floor;
        private $apartment;

        public function __construct($city, $street, $number, $floor = null, $apartment = null)
        {
            $this->city = $city;
            $this->street = $street;
            $this->floor = $floor;
            $this->apartment = $apartment;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }

        /**
         * Get the value of street
         */ 
        public function getStreet()
        {
                return $this->street;
        }

        /**
         * Set the value of street
         *
         * @return  self
         */ 
        public function setStreet($street)
        {
                $this->street = $street;

                return $this;
        }

        /**
         * Get the value of number
         */ 
        public function getNumber()
        {
                return $this->number;
        }

        /**
         * Set the value of number
         *
         * @return  self
         */ 
        public function setNumber($number)
        {
                $this->number = $number;

                return $this;
        }

        /**
         * Get the value of floor
         */ 
        public function getFloor()
        {
                return $this->floor;
        }

        /**
         * Set the value of floor
         *
         * @return  self
         */ 
        public function setFloor($floor)
        {
                $this->floor = $floor;

                return $this;
        }

        /**
         * Get the value of apartment
         */ 
        public function getApartment()
        {
                return $this->apartment;
        }

        /**
         * Set the value of apartment
         *
         * @return  self
         */ 
        public function setApartment($apartment)
        {
                $this->apartment = $apartment;

                return $this;
        }
    }

?>
<?php 
    namespace Model;

    require_once "./person.php";
    use Model\Person;

    class Student extends Person
    {
        private $docket;
        private $studyStatus;
        private $career;
        private $maritalStatus;

        public function __construct($email, $password, $name, $lastName, $dni, $gender, $dateOfBirth, $phoneNumber, $docket, $studyStatus, $career, $maritalStatus, $city, $street, $number, $floor = null, $apartment = null)
        {
            parent::__construct($email, $password, $name, $lastName, $dni, $gender, $dateOfBirth, $phoneNumber, $city, $street, $number, $floor, $apartment);
            $this->docket = $docket;
            $this->studyStatus = $studyStatus;
            $this->career = $career;
            $this->maritalStatus = $maritalStatus;
        }

        /**
         * Get the value of docket
         */ 
        public function getDocket()
        {
                return $this->docket;
        }

        /**
         * Set the value of docket
         *
         * @return  self
         */ 
        public function setDocket($docket)
        {
                $this->docket = $docket;

                return $this;
        }

        /**
         * Get the value of studyStatus
         */ 
        public function getStudyStatus()
        {
                return $this->studyStatus;
        }

        /**
         * Set the value of studyStatus
         *
         * @return  self
         */ 
        public function setStudyStatus($studyStatus)
        {
                $this->studyStatus = $studyStatus;

                return $this;
        }

        /**
         * Get the value of career
         */ 
        public function getCareer()
        {
                return $this->career;
        }

        /**
         * Set the value of career
         *
         * @return  self
         */ 
        public function setCareer($career)
        {
                $this->career = $career;

                return $this;
        }

        /**
         * Get the value of maritalStatus
         */ 
        public function getMaritalStatus()
        {
                return $this->maritalStatus;
        }

        /**
         * Set the value of maritalStatus
         *
         * @return  self
         */ 
        public function setMaritalStatus($maritalStatus)
        {
                $this->maritalStatus = $maritalStatus;

                return $this;
        }
    }
?>
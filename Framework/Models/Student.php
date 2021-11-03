<?php
    namespace Models;

    use Models\Person as Person;

    class Student extends Person
    {
        private $fileNumber;
        private $studyStatus;
        private $career;

       public function __construct($email, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career)
        {
            parent::__construct($email, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber);
            $this->fileNumber = $fileNumber;
            $this->studyStatus = $studyStatus;
            $this->career = $career;
            $this->idStudent = 0;
        }
 
        /**
         * Get the value of fileNumber
         */ 
        public function getFileNumber()
        {
                return $this->fileNumber;
        }

        /**
         * Set the value of fileNumber
         *
         * @return  self
         */ 
        public function setFileNumber($fileNumber)
        {
                $this->fileNumber = $fileNumber;

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
         * Get the value of idStudent
         */ 
        public function getIdStudent()
        {
                return $this->idStudent;
        }

        /**
         * Set the value of idStudent
         *
         * @return  self
         */ 
        public function setIdStudent($idStudent)
        {
                $this->idStudent = $idStudent;

                return $this;
        }
    }
?>


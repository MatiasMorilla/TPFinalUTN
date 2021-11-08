<?php
    namespace Models;

    use Models\Person as Person;

    class Student extends Person
    {
        private $fileNumber;
        private $studyStatus;
        private $career;

       public function __construct($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career)
        {
            parent::__construct($email, $password,  $name, $lastName, $dni, $gender, $birthDate, $phoneNumber);
            $this->fileNumber = $fileNumber;
            $this->studyStatus = $studyStatus;
            $this->career = $career;
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
                if($this->career == 1)
                {
                        $this->career = "Naval engineering";
                }
                elseif($this->career == 2)
                {
                        $this->career = "Fishing engineering";
                }
                elseif($this->career == 3)
                {
                        $this->career = "University technician in programming";
                }
                elseif($this->career == 4)
                {
                        $this->career = "University technician in computer systems";
                }
                elseif($this->career == 5)
                {
                        $this->career = "University technician in textile production";
                }
                elseif($this->career == 6)
                {
                        $this->career = "University technician in administration";
                }
                elseif($this->career == 7)
                {
                        $this->career = "Bachelor in environmental management";
                }
                elseif($this->career == 8)
                {
                        $this->career = "University technician in environmental procedures and technologies";
                }

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


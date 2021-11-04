<?php 
    namespace Models;

    class Aplicants 
    {
        private $idStudent;
        private $idjobOffer;
        private $cv;
        private $aplicantDescription;
        private $aplicantDate;

        public function __construct($idStudent, $idjobOffer, $cv, $aplicantDescription, $aplicantDate)
        {
            $this->idStudent = $idStudent;
            $this->idjobOffer = $idjobOffer;
            $this->cv = $cv;
            $this->aplicantDescription = $aplicantDescription;
            $this->aplicantDate =$aplicantDate;
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

        /**
         * Get the value of idjobOffer
         */ 
        public function getIdjobOffer()
        {
                return $this->idjobOffer;
        }

        /**
         * Set the value of idjobOffer
         *
         * @return  self
         */ 
        public function setIdjobOffer($idjobOffer)
        {
                $this->idjobOffer = $idjobOffer;

                return $this;
        }

        /**
         * Get the value of cv
         */ 
        public function getCv()
        {
                return $this->cv;
        }

        /**
         * Set the value of cv
         *
         * @return  self
         */ 
        public function setCv($cv)
        {
                $this->cv = $cv;

                return $this;
        }

        /**
         * Get the value of aplicantDescription
         */ 
        public function getAplicantDescription()
        {
                return $this->aplicantDescription;
        }

        /**
         * Set the value of aplicantDescription
         *
         * @return  self
         */ 
        public function setAplicantDescription($aplicantDescription)
        {
                $this->aplicantDescription = $aplicantDescription;

                return $this;
        }

        /**
         * Get the value of aplicantDate
         */ 
        public function getAplicantDate()
        {
                return $this->aplicantDate;
        }

        /**
         * Set the value of aplicantDate
         *
         * @return  self
         */ 
        public function setAplicantDate($aplicantDate)
        {
                $this->aplicantDate = $aplicantDate;

                return $this;
        }
    }

?>
<?php 
    namespace Models;

    class Job 
    {
        private $id_position;
        private $id_career;
        private $company;
        private $position;
        private $description;
        private $requirements;
        private $benefits;
        private $date;

        public function __construct($id_position, $id_career, $company, $position, $description, $requirements, $benefits, $date)
        {
            $this->id_position = $id_position;
            $this->id_career = $id_career;
            $this->company = $company;
            $this->position = $position;
            $this->description =$description;
            $this->requirements= $requirements;
            $this->benefits = $benefits;
            $this->date = $date;
        }

        /**
         * Get the value of id_position
         */ 
        public function getId_position()
        {
                return $this->id_position;
        }

        /**
         * Set the value of id_position
         *
         * @return  self
         */ 
        public function setId_position($id_position)
        {
                $this->id_position = $id_position;

                return $this;
        }

        /**
         * Get the value of id_career
         */ 
        public function getId_career()
        {
                return $this->id_career;
        }

        /**
         * Set the value of id_career
         *
         * @return  self
         */ 
        public function setId_career($id_career)
        {
                $this->id_career = $id_career;

                return $this;
        }

        /**
         * Get the value of company
         */ 
        public function getCompany()
        {
                return $this->company;
        }

        /**
         * Set the value of company
         *
         * @return  self
         */ 
        public function setCompany($company)
        {
                $this->company = $company;

                return $this;
        }

        /**
         * Get the value of position
         */ 
        public function getPosition()
        {
                return $this->position;
        }

        /**
         * Set the value of position
         *
         * @return  self
         */ 
        public function setPosition($position)
        {
                $this->position = $position;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of requirements
         */ 
        public function getRequirements()
        {
                return $this->requirements;
        }

        /**
         * Set the value of requirements
         *
         * @return  self
         */ 
        public function setRequirements($requirements)
        {
                $this->requirements = $requirements;

                return $this;
        }

        /**
         * Get the value of benefits
         */ 
        public function getBenefits()
        {
                return $this->benefits;
        }

        /**
         * Set the value of benefits
         *
         * @return  self
         */ 
        public function setBenefits($benefits)
        {
                $this->benefits = $benefits;

                return $this;
        }

        /**
         * Get the value of date
         */ 
        public function getDate()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }
    }

?>
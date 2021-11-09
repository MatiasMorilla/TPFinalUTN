<?php
    namespace Models;

    class  User
    {
        private $idUser = -1;
        private $email;
        private $password;
        private $idRol;

        public function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
        }


        /**
         * Get the value of idUser
         */ 
        public function getIdUser()
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @return  self
         */ 
        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
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
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of idRol
         */ 
        public function getIdRol()
        {
                return $this->idRol;
        }

        /**
         * Set the value of idRol
         *
         * @return  self
         */ 
        public function setIdRol($idRol)
        {
                $this->idRol = $idRol;

                return $this;
        }
    }
?>
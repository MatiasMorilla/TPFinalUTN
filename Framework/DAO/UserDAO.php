<?php
    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;
    use DAO\Connection as Connection;
    use \Exception as Exception;
    

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "USERS";

        public function Add(User $user)
        {
            try
            {
                $sql = "INSERT INTO $this->tableName (email, password, idRol) VALUES (:email, :password, :idRol)";
                        
                    $parameters["email"] = $user->getEmail();
                    $parameters["password"] = $user->getPassword();
                    $parameters["idRol"] = $user->getIdRol();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $userList = array();
                $sql = "SELECT * FROM $this->tableName";                        

                $this->connection = Connection::GetInstance();

                $arrayResult = $this->connection->Execute($sql);
                foreach($arrayResult as $row)
                {
                    $user = new User($row["email"], $row["password"]);
                    $user->setIdRol($row["idRol"]);
                    $user->setIdUser($row["idUser"]);
                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetuserByEmail($email)
        {
            try
            {
                $userList = array();
                $sql = "SELECT * FROM $this->tableName WHERE $this->tableName.email = '". $email . "'";                        

                $this->connection = Connection::GetInstance();

                $arrayResult = $this->connection->Execute($sql);
                foreach($arrayResult as $row)
                {
                    $user = new User($row["email"], $row["password"]);
                    $user->setIdRol($row["idRol"]);
                    $user->setIdUser($row["idUser"]);
                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function SetPassword($email, $password)
        {
            try
            {
                $sql = "UPDATE $this->tableName SET password = '" . $password ."' WHERE $this->tableName.email = '" . $email . "'";                        
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($sql);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>
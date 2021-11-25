<?php
    namespace DAO;

    use DAO\ICompanyDao as ICompanyDAO;
    use Models\Company as Company;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class CompanyDAO implements ICompanyDAO
    {
        private $connection;
        private $tableName = "COMPANIES";

        public function Add(Company $company)
        {
            try
            {
                $companyList = $this->GetAll();
                $exist = false;

                foreach($companyList as $comp)
                {
                    if($comp->getName() == $company->getName() || $comp->getCuil() == $company->getCuil())
                    {
                        $exist = true;
                    }
                }

                if(!$exist)
                {
                    $sql = "INSERT INTO $this->tableName (CompanyName, Cuil, Address, PhoneNumber,IdUser) 
                        VALUES (:CompanyName, :Cuil, :Address, :PhoneNumber,:IdUser)";
                        
                    $parameters["CompanyName"] = $company->getName();
                    $parameters["Cuil"] = $company->getCuil();
                    $parameters["Address"] = $company->getAddress();
                    $parameters["PhoneNumber"] = $company->getPhoneNumber();
                    $parameters["IdUser"] = $company->getIdUser();

                    $this->connection = Connection::GetInstance();

                    $this->connection->ExecuteNonQuery($sql, $parameters);
                }
                else
                {
                    echo "<script> if(confirm('El nombre o el cuil de la compania ya existe!'));</script>";
                }
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
                $companyList = array();
                $sql = "SELECT * FROM $this->tableName c inner join USERS on c.idUser = USERS.idUser";

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $company = new Company($row["CompanyName"], $row["Cuil"], $row["Address"], $row["PhoneNumber"], $row["email"], $row["password"], $row["IdUser"]);
                    array_push($companyList, $company);
                }

                return $companyList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function RemoveCompany ($cuil)
        {
            try
            {
                $sql = "DELETE FROM $this->tableName WHERE $this->tableName.Cuil = $cuil";

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($sql);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function modifyCompany($name, $attr, $newValue)
        {           
            try
            {
                $sql = "UPDATE $this->tableName SET $attr = '" . $newValue . "' WHERE $this->tableName.CompanyName = '" . $name . "'";

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($sql);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByEmail($email)
        {
            try
            {
                $companyList = array();
                $sql = "SELECT * FROM $this->tableName c inner join USERS on c.idUser = USERS.idUser WHERE USERS.Email = '". $email . "'";   

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $company = new Company($row["CompanyName"], $row["Cuil"], $row["Address"], $row["PhoneNumber"], $row["email"], $row["password"], $row["IdUser"]);
                    array_push($companyList, $company);
                }

                return $companyList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>


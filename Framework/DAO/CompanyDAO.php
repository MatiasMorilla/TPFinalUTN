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
                $sql = "INSERT INTO $this->tableName (CompanyName, Cuil, Address, PhoneNumber, Email) 
                        VALUES (:CompanyName, :Cuil, :Address, :PhoneNumber, :Email)";
                        
                $parameters["CompanyName"] = $company->getName();
                $parameters["Cuil"] = $company->getCuil();
                $parameters["Address"] = $company->getAddress();
                $parameters["PhoneNumber"] = $company->getPhoneNumber();
                $parameters["Email"] = $company->getEmail();

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
                $companyList = array();
                $sql = "SELECT * FROM $this->tableName";

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $company = new Company($row["CompanyName"], $row["Cuil"], $row["Address"], $row["PhoneNumber"], $row["Email"]);
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







        /* private $companyList = array();

        public function Add(Company $company)
        {
            $this->RetrieveData();
            
            array_push($this->companyList, $company);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->companyList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->companyList as $company)
            {
                $valuesArray["name"] = $company->getName();
                $valuesArray["cuil"] = $company->getCuil();
                $valuesArray["address"] = $company->getAddress();
                $valuesArray["phoneNumber"] = $company->getPhoneNumber();
                $valuesArray["email"] = $company->getEmail();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/companies.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->companyList = array();

            if(file_exists('Data/companies.json'))
            {
                $jsonContent = file_get_contents('Data/companies.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $name = $valuesArray["name"];
                    $cuil = $valuesArray["cuil"];
                    $address = $valuesArray["address"];
                    $phoneNumber = $valuesArray["phoneNumber"];
                    $email =  $valuesArray["email"];
                    
                    $company = new Company($name, $cuil, $address, $phoneNumber, $email);

                    array_push($this->companyList, $company);
                }
            }
        }
        public function RemoveCompany ($cuil)
        {
            $this->RetrieveData();
            $this->companyList;

            $company = $this->searchForCuil($cuil, $this->companyList);

            if (is_null($company))
            {
                echo "Compania no encontrada";
            }else
            {
                $index = array_search($company, $this->companyList);
                unset($this->companyList[$index]);
                $this->SaveData();
            }
        }

        private function searchForCuil($cuil, $array) {
            foreach ($array as $company) {
                if ($company->getCuil() === $cuil) {
                    return $company;
                }
            }
            return null;
         }
         
         public function modifyCompany($name, $attr, $newValue)
         {           
            $this->RetrieveData();
            $companyFinded = null;
            foreach($this->companyList as $company)
            {
                if($name == $company->getName()){
                    $companyFinded = $company;
                }
            }

            if(!is_null($companyFinded))
            {
                if($attr === "name")
                {
                    $companyFinded->setName($newValue);
                }
                elseif($attr === "address")
                {
                    $companyFinded->setAddress($newValue);
                }
                elseif($attr === "phoneNumber")
                {
                    $companyFinded->setPhoneNumber($newValue);
                }
                elseif($attr === "email")
                {
                    $companyFinded->setEmail($newValue);
                }
                
                $this->SaveData();
            }
         } */
    }
?>


<?php
    namespace DAO;

    use DAO\ICompanyDao as ICompanyDAO;
    use Models\Company as Company;

    class CompanyDAO implements ICompanyDAO
    {
        private $companyList = array();

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
    }
?>

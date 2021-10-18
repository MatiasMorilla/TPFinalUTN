<?php
    namespace Controllers;

    use DAO\CompanyDAO as companyDAO;
    use Models\Company as company;

    class CompanyController
    {
        private $CompanyDAO;

        public function __construct()
        {
            $this->CompanyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView()
        {
            $companyList = $this->CompanyDAO->GetAll();
            $name = null;
            require_once(VIEWS_PATH."company-list.php");
        }

        public function ShowCompany(){
            $name = null;
            if(isset($_GET["name"])){
                $name =$_GET["name"];
            }
            
            $companyList = $this->CompanyDAO->GetAll();
            $companyFinded = null;
            foreach($companyList as $company)
            {
                if($name == $company->getName()){
                    $companyFinded = $company;
                }
            }

            $companyName = $companyFinded->getName();
            $companyAddress =  $companyFinded->getAddress();
            $companyPhoneNumber =  $companyFinded->getPhoneNumber();
            $companyEmail =  $companyFinded->getEmail();
            $companyCuil=  $companyFinded->getCuil();

            require_once(VIEWS_PATH."company-perfil.php");

        }

        public function Search(){
            $name = null;
            if(isset($_GET["name"])){
                $name =$_GET["name"];
            }
            
            $companyList = $this->CompanyDAO->GetAll();
            $companyFinded = null;
            foreach($companyList as $company)
            {
                if($name == $company->getName()){
                    $companyFinded = $company;
                }
            }
            
            require_once(VIEWS_PATH."company-list.php");

            return $companyFinded;
        }        
        public function Add($name, $cuil, $address, $phoneNumber,$email)
        {
            $company = new Company($name,$cuil,$address,$phoneNumber,$email);
            
            $this->CompanyDAO->Add($company);

            $this->ShowAddView();
        }
    }
?>

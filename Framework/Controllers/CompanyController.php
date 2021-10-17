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

            require_once(VIEWS_PATH."company-list.php");
        }

        public function Add($name, $cuil, $address, $phoneNumber,$email)
        {
            $company = new Company($name,$cuil,$address,$phoneNumber,$email);
            
            $this->CompanyDAO->Add($company);

            $this->ShowAddView();
        }
    }
?>


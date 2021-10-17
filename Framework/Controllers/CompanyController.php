<?php
    namespace Controllers;

    use DAO\CompanyDAO as companyDAO;
    use Models\Company as company;

    class StudentController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list.php");
        }

        public function Add($name, $cuil, $address, $phoneNumber,$email)
        {
            $company = new Company($name,$cuil,$address,$phoneNumber,$email);
            
            $this->companyDAO->Add($company);

            $this->ShowAddView();
        }
    }
?>


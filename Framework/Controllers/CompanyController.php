<?php
    namespace Controllers;

    use DAO\CompanyDAO as companyDAO;
    use DAO\UserDAO as UserDAO;
    use Models\Company as company;
    use Controllers\UserController as UserController;

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

        public function ShowDeleteView ()
        {
            require_once(VIEWS_PATH."company-remove.php");
        }

        public function ShowModify($name)
        {
            require_once(VIEWS_PATH."company-modify.php");
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

                if(strcasecmp($name,$company->getName()) == 0){
                    $companyFinded = $company;
                }
            }
            
            require_once(VIEWS_PATH."company-list.php");
            return $companyFinded;
        }       

        public function Add($name, $cuil, $address, $phoneNumber, $email)
        {
            // Creamos el user
            $userCrontroller = new UserController();
            $userDAO = new UserDAO();
            $userCrontroller->AddUser($email, "1234", "3");
            $userBD = $userDAO->GetuserByEmail($email);
            $idUser = $userBD[0]->getIdUser();

            // Creamos la company
            $company = new Company($name, $cuil, $address, $phoneNumber, $email, "1234", $idUser);
            $this->CompanyDAO->Add($company);

            ?>
                <script>alert("Empresa creado con exito :)")</script>
            <?php

            $this->ShowAddView();
        }

        public function RemoveCompany ($cuil)
        {
            $this->CompanyDAO->RemoveCompany($cuil);
            $this->ShowListView();
        }

        public function ModifyCompany($name, $attr, $newValue)
        {
            $this->CompanyDAO->ModifyCompany($name, $attr, $newValue);
            $this->ShowListView();
        }
    }
?>


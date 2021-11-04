<?php
    namespace Controllers;

    use DAO\AplicantsDAO as AplicantsDAO;
    use Models\Aplicants as Aplicants;

    class AplicantsController
    {
        private $AplicantsDAO;

        public function __construct()
        {
            $this->AplicantsDAO = new AplicantsDAO();
        }


        public function ShowApply($IdjobOffer, $fileNumber)
        {
            require_once(VIEWS_PATH."aplicants-apply.php");
        }

        public function ShowListView()
        {
            $aplicantsList = $this->AplicantsDAO->GetAll();
            $name = null;
            require_once(VIEWS_PATH."aplicants-list.php");
        }

        public function Apply($IdjobOffer, $fileNumber, $CV, $AplicantDescription, $AplicantDate)
        {
            $aplicant = new Aplicants($fileNumber, $IdjobOffer, $CV, $AplicantDescription, $AplicantDate);
            $this->AplicantsDAO->Add($aplicant);
            $this->ShowListView();
        }

    }
?>


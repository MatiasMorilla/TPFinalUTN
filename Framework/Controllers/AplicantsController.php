<?php
    namespace Controllers;

    use DAO\AplicantsDAO as AplicantsDAO;
    use Models\Aplicants as Aplicants;
    use Controllers\MailController as MailController;

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
            require_once(VIEWS_PATH."aplicants-list.php");
        }

        public function ShowMyList($idStudent)
        {
            $aplicantsList = $this->AplicantsDAO->GetMyList($idStudent);
            require_once(VIEWS_PATH."aplicants-list.php");
        }


        public function Apply($IdjobOffer, $fileNumber, $CV, $AplicantDescription, $AplicantDate)
        {
            $aplicant = new Aplicants($fileNumber, $IdjobOffer, $CV, $AplicantDescription, $AplicantDate);
            $this->AplicantsDAO->Add($aplicant);
            $this->ShowMyList($fileNumber);
        }

        public function Remove($email, $id, $info = "Tu postulacion a sido rechazada")
        {
            $mail = new MailController();
            $mail->SendDeclineInfo($email);
            $this->AplicantsDAO->Remove($id);
            $this->ShowListView();
        }
    }
?>


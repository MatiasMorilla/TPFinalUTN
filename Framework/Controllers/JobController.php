<?php
    namespace Controllers;

    use DAO\JobDAO as JobDAO;
    use Models\Job as Job;
    use Models\PDF as PDF;
    use DAO\CompanyDAO as CompanyDAO;
    use DAO\AplicantsDAO as AplicantsDAO;


    class JobController
    {
        private $JobDAO;

        public function __construct()
        {
            $this->JobDAO = new JobDAO();
        }

        public function ShowAddView()
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://utn-students-api.herokuapp.com/api/JobPosition");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08"));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $respuesta = curl_exec($ch);

            $json = json_decode($respuesta, true);

            curl_close($ch);

            $arrayPositions = $json;

            $CompanyDAO = new CompanyDAO();
            $companyList = $CompanyDAO->GetAll();

            require_once(VIEWS_PATH."job-add.php");
        }

        public function ShowListView()
        {
            $jobList = $this->JobDAO->GetAll();
            $career = null;

            require_once(VIEWS_PATH."job-list.php");
        }

        public function ShowModify($id_position)
        {
            $job = $this->JobDAO->getJobByIdPosition($id_position);
            require_once(VIEWS_PATH."job-modify.php");
        }
            
        
        public function Add($position, $date, $company, $description, $requirements, $benefits)
        {
            $id_position = $this->getIdPosition($position);
            $id_career = $this->getIdCareer($position);
            
            if($id_position != -1 && $id_career != -1)
            {
                $job = new Job($id_position, $id_career, $company, $position, $description, $requirements, $benefits, $date);
                $this->JobDAO->Add($job);
            }
            
            $this->ShowAddView();
        }

        public function ShowRemove()
        {
            $jobList = $this->JobDAO->GetAll();
            $CompanyDAO = new CompanyDAO();
            $companyList = $CompanyDAO->GetAll();
                        
            require_once(VIEWS_PATH."job-remove.php");
        }
        
        public function getIdPosition($position)
        {
            $id_position = -1;
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://utn-students-api.herokuapp.com/api/JobPosition");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08"));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $respuesta = curl_exec($ch);

            $json = json_decode($respuesta, true);

            curl_close($ch);

            $arrayPositions = $json;

            foreach($arrayPositions as $positionApi)
            {
                if($positionApi["description"] == $position)
                {
                    $id_position = $positionApi["jobPositionId"];
                }
            }

            return $id_position;
        }

        public function getIdCareer($position)
        {
            $id_career = -1;
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://utn-students-api.herokuapp.com/api/JobPosition");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08"));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $respuesta = curl_exec($ch);

            $json = json_decode($respuesta, true);

            curl_close($ch);

            $arrayPositions = $json;

            foreach($arrayPositions as $positionApi)
            {
                if($positionApi["description"] == $position)
                {
                    $id_career = $positionApi["careerId"];
                }
            }

            return $id_career;
        }

        public function ModifyJob($IdJobOffer, $attr, $newValue)
        {
            $this->JobDAO->ModifyJob($IdJobOffer, $attr, $newValue);
            $this->ShowListView();
        }

        public function RemoveJob($IdJobOffer)
        {
            $this->JobDAO->RemoveJob($IdJobOffer);
            $this->ShowListView();
        }

        public function SearchJob($position)
        {
            $jobList = $this->JobDAO->SearchJob($position);
            $career = null;
            require_once(VIEWS_PATH."job-list.php");
        }

        public function PrintAplicants($IdJobOffer)
        {
            $aplicantsDAO = new AplicantsDAO();
            $aplicantsList = $aplicantsDAO->GetStudentsByJobOffer($IdJobOffer);

            ob_start();
            // Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',12);

            if(!is_null($aplicantsList))
            {
                for($i = 0; $i < count($aplicantsList); $i++)
                {
                    $pdf->Cell(38,10, $aplicantsList[$i]->getFileNumber(), 1, 0, 'C', 0);
                    $pdf->Cell(38,10, $aplicantsList[$i]->getName(), 1, 0, 'C', 0);
                    $pdf->Cell(38,10, $aplicantsList[$i]->getLastName(), 1, 0, 'C', 0);
                    $pdf->Cell(38,10, $aplicantsList[$i]->getDni(), 1, 0, 'C', 0);
                    $pdf->Cell(38,10, $aplicantsList[$i]->getPhoneNumber(), 1, 1, 'C', 0);
                }
            }
            else
            {
                $pdf->Cell(0,10, "No hay estudiantes postulados para este trabajo", 1, 0, 'C', 0);
            }

            $pdf->Output();
            ob_end_flush(); 
        }

    }
?>
<?php
    namespace DAO;

    use DAO\IJobDAO as IJobDAO;
    use Models\Job as Job;
    

    class JobDAO implements IJobDAO
    {
        private $jobList = array();

        public function Add(Job $job)
        {
            $this->RetrieveData();
            
            array_push($this->jobList, $job);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->jobList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->jobList as $job)
            {
                $valuesArray["id_position"] = $job->getId_position();
                $valuesArray["id_career"] = $job->getId_career();
                $valuesArray["company"] = $job->getCompany();
                $valuesArray["position"] = $job->getPosition();
                $valuesArray["description"] = $job->getDescription();
                $valuesArray["requirements"] = $job->getRequirements();
                $valuesArray["benefits"] = $job->getBenefits();
                $valuesArray["date"] = $job->getDate();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/jobs.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->jobList = array();

            if(file_exists('Data/jobs.json'))
            {
                $jsonContent = file_get_contents('Data/jobs.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $id_position = $valuesArray["id_position"];
                    $id_career = $valuesArray["id_career"];
                    $company = $valuesArray["company"];
                    $position = $valuesArray["position"];
                    $description = $valuesArray["description"];
                    $requirements = $valuesArray["requirements"];
                    $benefits = $valuesArray["benefits"];
                    $date = $valuesArray["date"];
                    
                    $job = new Job($id_position, $id_career, $company, $position, $description, $requirements, $benefits, $date);
                   
                    array_push($this->jobList, $job);
                }
            }
        }
        
    }
?>
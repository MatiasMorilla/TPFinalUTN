<?php
    namespace DAO;

    use DAO\IJobDAO as IJobDAO;
    use Models\Job as Job;
    use DAO\Connection as Connection;
    use \Exception as Exception;
    

    class JobDAO implements IJobDAO
    {
        private $connection;
        private $tableName = "JOBS";

        public function Add(Job $job)
        {
            try
            {
                $sql = "INSERT INTO $this->tableName (IdPosition, IdCareer, NameCompany, JobPosition, JobDescription, JobBenefits, JobRequirements, JobDate) 
                        VALUES (:IdPosition, :IdCareer, :NameCompany, :JobPosition, :JobDescription, :JobBenefits, :JobRequirements, :JobDate)";
                        
                $parameters["IdPosition"] = $job->getId_position();
                $parameters["IdCareer"] = $job->getId_career();
                $parameters["NameCompany"] = $job->getCompany();
                $parameters["JobPosition"] = $job->getPosition();
                $parameters["JobDescription"] = $job->getDescription();
                $parameters["JobBenefits"] = $job->getBenefits();
                $parameters["JobRequirements"] = $job->getRequirements();
                $parameters["JobDate"] = $job->getDate();

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
                $jobList = array();
                $sql = "SELECT * FROM $this->tableName";

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $job = new Job($row["IdPosition"], $row["IdCareer"], $row["NameCompany"], $row["JobPosition"], $row["JobDescription"], $row["JobBenefits"], $row["JobRequirements"], $row["JobDate"]);
                    $job->setIdJobOffer($row["IdJobOffer"]);
                    array_push($jobList, $job);
                }

                return $jobList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getJobByIdPosition($id_position)
        {
            try
            {
                $jobList = array();
                $sql = "SELECT * FROM $this->tableName WHERE $this->tableName.IdPosition = $id_position";

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $job = new Job($row["IdPosition"], $row["IdCareer"], $row["NameCompany"], $row["JobPosition"], $row["JobDescription"], $row["JobBenefits"], $row["JobRequirements"], $row["JobDate"]);
                    $job->setIdJobOffer($row["IdJobOffer"]);
                    array_push($jobList, $job);
                }

                return $jobList[0];
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function ModifyJob($IdJobOffer, $attr, $newValue)
        {
            try
            {
                $sql = "UPDATE $this->tableName SET $attr = '" . $newValue . "' WHERE $this->tableName.IdJobOffer = $IdJobOffer";                  

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($sql);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function RemoveJob ($IdJobOffer)
        {
            try
            {
                $sql = "DELETE FROM $this->tableName WHERE $this->tableName.IdJobOffer = $IdJobOffer";                  

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($sql);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function SearchJob ($id_position)
        {
            try
            {
                $jobList = array();
                
                $sql = "SELECT FROM $this->tableName WHERE $this->tableName.Id_position = $id_position"; 

                $this->connection = Connection::GetInstance();

                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $job = new Job($row["IdPosition"], $row["IdCareer"], $row["NameCompany"], $row["JobPosition"], $row["JobDescription"], $row["JobBenefits"], $row["JobRequirements"], $row["JobDate"]);
                    $job->setIdJobOffer($row["IdJobOffer"]);
                    array_push($jobList, $job);
                }

                return $jobList[0];
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

        }

    }


    

    /*  public function Add(Job $job)
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

        public function ModifyJob($id_position, $attr, $newValue)
        {
            $this->RetrieveData();
            $jobFinded = $this->getJobByIdPosition($id_position);

            if($jobFinded != null)
            {
                if($attr == "position")
                {
                    $jobFinded->setPosition($newValue);
                }
                elseif($attr == "description")
                {
                    $jobFinded->setDescription($newValue);
                }
                elseif($attr == "requirements")
                {
                    $jobFinded->setRequirements($newValue);
                }
                elseif($attr == "benefits")
                {
                    $jobFinded->setBenefits($newValue);
                }
                elseif($attr == "date")
                {
                    $jobFinded->setDate($newValue);
                }
            }

            $this->SaveData();
        }


        public function getJobByIdPosition($id_position)
        {
            $jobFinded = null;
            $this->RetrieveData();
            foreach($this->jobList as $job)
            {
                if($id_position == $job->getId_position())
                {
                    $jobFinded = $job;
                }
            }

            return $jobFinded;
        }

        public function RemoveJob ($company, $position)
        {
            $this->RetrieveData();

            $job = $this->getJobByPositionCompany($company, $position);

            if (is_null($job))
            {
                echo "Empleo no encontrado";
            }else
            {
                $index = array_search($job, $this->jobList);
                unset($this->jobList[$index]);
                $this->SaveData();
            }
        }

        public function getJobByPositionCompany($company, $position)
        {
            $jobFinded = null;
            $this->RetrieveData();
            foreach($this->jobList as $job)
            {
                if($position == $job->getPosition() && $company == $job->getCompany())
                {
                    $jobFinded = $job;
                }
            }

            return $jobFinded;
        }
        
    } */
?>




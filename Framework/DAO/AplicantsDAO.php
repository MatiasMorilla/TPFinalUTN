<?php
    namespace DAO;

    use DAO\IAplicantsDao as IAplicantsDAO;
    use Models\Aplicants as Aplicants;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class AplicantsDAO implements IAplicantsDAO
    {
        private $connection;
        private $tableName = "APLICANTS";

        public function Add(Aplicants $aplicants)
        {
            try
            {

                $aplicantsList = $this->GetAll();
                $exist = false;

                foreach($aplicantsList as $aplicantBD)
                {
                    if($aplicantBD->getIdStudent() == $aplicants->getIdStudent() && $aplicantBD->getIdJobOffer() == $aplicants->getIdJobOffer())
                    {
                        $exist = true;
                    }
                }

                if(!$exist)
                {
                    $sql = "INSERT INTO $this->tableName (IdStudent, IdJobOffer, CV, AplicantDescription, AplicantDate) 
                        VALUES (:IdStudent, :IdJobOffer, :CV, :AplicantDescription, :AplicantDate)";
                        
                    $parameters["IdStudent"] = $aplicants->getIdStudent();
                    $parameters["IdJobOffer"] = $aplicants->getIdjobOffer();
                    $parameters["CV"] = $aplicants->getCv();
                    $parameters["AplicantDescription"] = $aplicants->getAplicantDescription();
                    $parameters["AplicantDate"] = $aplicants->getAplicantDate();

                    $this->connection = Connection::GetInstance();

                    $this->connection->ExecuteNonQuery($sql, $parameters);
                }
                else
                {
                    echo "<script> if(confirm('Ya se a postulado a una oferta!'));</script>";
                }
                
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
                $aplicantsList = array();
                $sql = "SELECT * FROM $this->tableName";

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $aplicantBD = new Aplicants($row["IdStudent"], $row["IdJobOffer"], $row["CV"], $row["AplicantDescription"], $row["AplicantDate"]);
                    array_push($aplicantsList, $aplicantBD);
                }

                return $aplicantsList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetMyList($idStudent)
        {
            try
            {
                $aplicantsList = array();
                $sql = "SELECT * FROM $this->tableName WHERE $this->tableName.IdStudent = '". $idStudent ."'";

                $this->connection = Connection::GetInstance();
                $arrayResult = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $aplicantBD = new Aplicants($row["IdStudent"], $row["IdJobOffer"], $row["CV"], $row["AplicantDescription"], $row["AplicantDate"]);
                    array_push($aplicantsList, $aplicantBD);
                }

                return $aplicantsList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

    }
?>


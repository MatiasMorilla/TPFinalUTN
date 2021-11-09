<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    use DAO\Connection as Connection;
    use \Exception as Exception;
    

    class StudentDAO implements IStudentDAO
    {
        private $connection;
        private $tableName = "STUDENTS";

        public function Add(Student $student, $idUser)
        {
            try
            {
                $sql = "INSERT INTO $this->tableName (name, lastName, idUser, dni, gender, birthDate, phoneNumber, fileNumber, studyStatus, career) 
                        VALUES (:name, :lastName, :idUser, :dni, :gender, :birthDate, :phoneNumber, :fileNumber, :studyStatus, :career)";

                $parameters["name"] = $student->getName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["idUser"] = $idUser;
                $parameters["dni"] = $student->getDni();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["fileNumber"] = $student->getFileNumber();
                $parameters["studyStatus"] = $student->getStudyStatus();
                $parameters["career"] = $student->getCareer();

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
            $this->RetrieveDataAPI();

            return $this->studentList;
        }

        public function GetStudentByEmail($email)
        {
            try
            {
                $studentList = array();
                $sql = "SELECT * FROM $this->tableName WHERE $this->tableName.email = '". $email . "'";                        

                $this->connection = Connection::GetInstance();

                $arrayResult = $this->connection->Execute($sql);
                foreach($arrayResult as $row)
                {
                    $student = new Student($row["email"], $row["password"], $row["name"], $row["lastName"], $row["dni"], $row["gender"],
                     $row["birthDate"], $row["phoneNumber"], $row["fileNumber"], $row["studyStatus"], $row["career"]);
                    array_push($studentList, $student);
                }

                return $studentList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function SetPassword($email, $password)
        {
            try
            {
                $sql = "UPDATE $this->tableName SET password = '" . $password ."' WHERE $this->tableName.email = '" . $email . "'";                        
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($sql);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function SearchStudentByEmail($email)
        {
            if(!empty($email))
            {
                $studentList = $this->GetAll();
                $studentFinded = null;
                foreach($studentList as $student)
                {
                    if($email == $student->getEmail()){
                        $studentFinded = $student;
                    }
                }

                return $studentFinded;
            } 
        }    

        private function RetrieveDataAPI()
        {
            $this->studentList = array();
            
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, "https://utn-students-api.herokuapp.com/api/Student");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-api-key: 4f3bceed-50ba-4461-a910-518598664c08"));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $respuesta = curl_exec($ch);

                $json = json_decode($respuesta, true);

                curl_close($ch);

                $arrayToDecode =  $json;

                foreach($arrayToDecode as $parameters)
                {
                    $email = $parameters["email"];
                    //$password = $parameters["password"];
                    $name = $parameters["firstName"];
                    $lastName = $parameters["lastName"];
                    $dni = $parameters["dni"];
                    $gender = $parameters["gender"];
                    $birthDate = $parameters["birthDate"];
                    $phoneNumber = $parameters["phoneNumber"];
                    $fileNumber = $parameters["fileNumber"];
                    $studyStatus = $parameters["active"];
                    $career = $parameters["careerId"];
                    $idStudent = $parameters["studentId"];
                    
                    $student = new Student($email, 12345, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent);

                    array_push($this->studentList, $student);
                }
             
        }          
    }
?>
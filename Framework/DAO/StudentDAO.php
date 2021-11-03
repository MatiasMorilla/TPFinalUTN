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

        public function Add(Student $student)
        {
            try
            {
                $sql = "INSERT INTO $this->tableName (email, password, name, lastName, dni, gender, birthDate, phoneNumber, fileNumber, studyStatus, career) 
                        VALUES (:email, :password, :name, :lastName, :dni, :gender, :birthDate, :phoneNumber, :fileNumber, :studyStatus, :career)";
                        
                    $parameters["email"] = $student->getEmail();
                    $parameters["password"] = $student->getPassword();
                    $parameters["name"] = $student->getName();
                    $parameters["lastName"] = $student->getLastName();
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

                $arrayResul = $this->connection->Execute($sql);

                foreach($arrayResult as $row)
                {
                    $student = new Student($row["email"], $row["password"], $row["name"], $row["lasName"], $row["dni"], $row["gender"],
                     $row["birthDate"], $row["phoneNumer"], $row["fileNumber"], $row["studyStatus"], $row["career"], );
                    array_push($studentList, $student);
                }

                return $studentList[0];
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

       /*  private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->studentList as $student)
            {
                $parameters["email"] = $student->getEmail();
                $parameters["password"] = $student->getPassword();
                $parameters["name"] = $student->getName();
                $parameters["lastName"] = $student->getLastName();
                $parameters["dni"] = $student->getDni();
                $parameters["gender"] = $student->getGender();
                $parameters["birthDate"] = $student->getBirthDate();
                $parameters["phoneNumber"] = $student->getPhoneNumber();
                $parameters["fileNumber"] = $student->getFileNumber();
                $parameters["studyStatus"] = $student->getStudyStatus();
                $parameters["career"] = $student->getCareer();
                $parameters["idStudent"] = $student->getIdStudent();

                array_push($arrayToEncode, $parameters);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/students.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->studentList = array();

            if(file_exists('Data/students.json'))
            {
                $jsonContent = file_get_contents('Data/students.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $parameters)
                {
                    $email = $parameters["email"];
                    $password = $parameters["password"];
                    $name = $parameters["name"];
                    $lastName = $parameters["lastName"];
                    $dni = $parameters["dni"];
                    $gender = $parameters["gender"];
                    $birthDate = $parameters["birthDate"];
                    $phoneNumber = $parameters["phoneNumber"];
                    $fileNumber = $parameters["fileNumber"];
                    $studyStatus = $parameters["studyStatus"];
                    $career = $parameters["career"];
                    $idStudent = $parameters["idStudent"];
                    
                    $student = new Student($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent);
                
                    array_push($this->studentList, $student);
                }
            }
        }*/
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
                    
                    $student = new Student($email, 1234, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent);

                    array_push($this->studentList, $student);
                }
             
        }          
    }
?>
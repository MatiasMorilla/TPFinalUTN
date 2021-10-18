<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    /* require_once('Views\curl.php');

    var_dump($json); */

    class StudentDAO implements IStudentDAO
    {
        private $studentList = array();

        public function Add(Student $student)
        {
            $this->RetrieveData();
            
            array_push($this->studentList, $student);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveDataAPI();

            return $this->studentList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->studentList as $student)
            {
                $valuesArray["email"] = $student->getEmail();
                $valuesArray["password"] = $student->getPassword();
                $valuesArray["name"] = $student->getName();
                $valuesArray["lastName"] = $student->getLastName();
                $valuesArray["dni"] = $student->getDni();
                $valuesArray["gender"] = $student->getGender();
                $valuesArray["birthDate"] = $student->getBirthDate();
                $valuesArray["phoneNumber"] = $student->getPhoneNumber();
                $valuesArray["fileNumber"] = $student->getFileNumber();
                $valuesArray["studyStatus"] = $student->getStudyStatus();
                $valuesArray["career"] = $student->getCareer();
                $valuesArray["idStudent"] = $student->getIdStudent();

                array_push($arrayToEncode, $valuesArray);
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

                foreach($arrayToDecode as $valuesArray)
                {
                    $email = $valuesArray["email"];
                    $password = $valuesArray["password"];
                    $name = $valuesArray["name"];
                    $lastName = $valuesArray["lastName"];
                    $dni = $valuesArray["dni"];
                    $gender = $valuesArray["gender"];
                    $birthDate = $valuesArray["birthDate"];
                    $phoneNumber = $valuesArray["phoneNumber"];
                    $fileNumber = $valuesArray["fileNumber"];
                    $studyStatus = $valuesArray["studyStatus"];
                    $career = $valuesArray["career"];
                    $idStudent = $valuesArray["idStudent"];
                    
                    $student = new Student($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent);
                   

                    /* $student = new Student();
                    $student->setEmail($valuesArray["email"]);
                    $student->setPassword($valuesArray["password"]);
                    $student->setName($valuesArray["name"]);
                    $student->setLastName($valuesArray["lastName"]);
                    $student->setDni($valuesArray["dni"]);
                    $student->setGender($valuesArray["gender"]);
                    $student->setBirthDate($valuesArray["birthDate"]);
                    $student->setPhoneNumber($valuesArray["phoneNumber"]);
                    $student->setFileNumber($valuesArray["fileNumber"]);
                    $student->setStudyStatus($valuesArray["studyStatus"]);
                    $student->setCareer($valuesArray["career"]);
                    $student->setIdStudent($valuesArray["idStudent"]); */

                    array_push($this->studentList, $student);
                }
            }
        }
        private function RetrieveDataAPI()
        {
            $this->studentList = array();

            if(file_exists("https://utn-students-api.herokuapp.com/api/Student"))
            {
                $opt = array(
                    "http" =>array(
                        "method" => "GET",
                        "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n",
                    )
                );
                $ctx = stream_context_create($opt);

                $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/Student", false, $ctx);

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $email = $valuesArray["email"];
                    $password = $valuesArray["password"];
                    $name = $valuesArray["name"];
                    $lastName = $valuesArray["lastName"];
                    $dni = $valuesArray["dni"];
                    $gender = $valuesArray["gender"];
                    $birthDate = $valuesArray["birthDate"];
                    $phoneNumber = $valuesArray["phoneNumber"];
                    $fileNumber = $valuesArray["fileNumber"];
                    $studyStatus = $valuesArray["studyStatus"];
                    $career = $valuesArray["career"];
                    $idStudent = $valuesArray["idStudent"];
                    
                    $student = new Student($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent);

                    array_push($this->studentList, $student);
                }
            } 
        }         
    }
?>
<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();
            $email = null;

            require_once(VIEWS_PATH."student-list.php");
        }

        public function Add($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent)
        {
            $student = new Student($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career, $idStudent);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }

        public function Search(){
            $email = null;
            if(isset($_GET["email"])){
                $email =$_GET["email"];
            }
            
            $studentList = $this->studentDAO->GetAll();
            $studentFinded = null;
            foreach($studentList as $student)
            {
                if($email == $student->getEmail()){
                    $studentFinded = $student;
                }
            }
            
            require_once(VIEWS_PATH."student-list.php");
        }     
    }
?>
<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;

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

        public function ShowLogout()
        {
            require_once(VIEWS_PATH."logout.php");
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

        public function Search($email, $password){

            if(!empty($email) && !empty($password))
            {
                $studentList = $this->studentDAO->GetAll();
                $studentFinded = null;
                foreach($studentList as $student)
                {
                    if($email == $student->getEmail()){
                        $studentFinded = $student;
                    }
                }

                

                if($email === "admin@utn.com")
                {
                    if($password === "12345")
                    {
                        $email = "admin@utn.com";
                        $_SESSION["admin"] = $email;

                        require_once(VIEWS_PATH."student-add.php");
                    }
                    else
                    {
                        $homeController = new HomeController();
                         $homeController->Index("Los datos son incorrectos!");
                    }
                    
                }
                else
                {
                    $_SESSION["student"] = $studentFinded;
                
                    require_once(VIEWS_PATH."student-perfil.php");
                }
            }
            else
            {
                $homeController = new HomeController();
                $homeController->Index("Debes completar los datos!");
            }
            
        }     
    }
?>
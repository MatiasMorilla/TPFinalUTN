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

        public function Add($email, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career)
        {
            $student = new Student($email, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career);

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

                
                $homeController = new HomeController();

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
                         $homeController->Index("Los datos son incorrectos!");
                    }
                    
                }
                elseif (!is_null($studentFinded))
                {
                    $arrayStudents = $this->studentDAO->GetAll();
                    $_SESSION["student"] = $studentFinded;
                
                    require_once(VIEWS_PATH."student-perfil.php");
                } else
                {
                    $homeController->Index("Los datos ingresados no son validos!");
                }
            }
            else
            {
                
                $homeController->Index("Debes completar los datos!");
            }
            
        }     

        public function Search132($email){
            if(!empty($email))
            {
                $studentList = $this->studentDAO->GetAll();
                $studentFinded = null;
                foreach($studentList as $student)
                {
                    if($email == $student->getEmail()){
                        $studentFinded = $student;
                    }
                }
                
                $homeController = new HomeController();

                if(is_null($studentFinded))
                {
                    $homeController->Index("El email no es valido!");
                }
                elseif($email == "admin@utn.com")
                {
                    require_once(VIEWS_PATH."login.php");
                }
                else
                {
                    $student = $this->studentDAO->GetStudentByEmail();

                    if(!empty($student))
                    {
                        require_once(VIEWS_PATH."login.php");
                    }
                    elseif()
                    {
                        /// completrar
                    }
                }
            }
        }     
    }
?>
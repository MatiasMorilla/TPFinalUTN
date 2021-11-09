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

        public function ShowPerfil()
        {
            $studentFinded =  $_SESSION["student"];
            require_once(VIEWS_PATH."student-perfil.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();
            $email = null;

            require_once(VIEWS_PATH."student-list.php");
        }

        public function Add($email, $password,  $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career)
        {
            $student = new Student($email, $password, $name, $lastName, $dni, $gender, $birthDate, $phoneNumber, $fileNumber, $studyStatus, $career);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }

        // public function Search($email, $password){

        //     $homeController = new HomeController();

        //     if(!empty($email) && !empty($password))
        //     {
        //         $studentList = $this->studentDAO->GetAll();
        //         $studentFinded = null;
        //         foreach($studentList as $student)
        //         {
        //             if($email == $student->getEmail()){
        //                 if($student->getStudyStatus() === true)
        //                 {
        //                     $studentFinded = $student;
        //                 }
        //                 else
        //                 {
        //                     $studentFinded = null;
        //                     $homeController->Index("El email no es valido o el usuario no esta activo!");
        //                 }
        //             }
        //         }

        //         $studentBD = $this->studentDAO->GetStudentByEmail($email);
        //         if(!is_null($studentFinded) || $email === "admin@utn.com")
        //         {
        //             if($email === "admin@utn.com")
        //             {
        //                 if($password === "12345")
        //                 {
        //                     $email = "admin@utn.com";
        //                     $_SESSION["admin"] = $email;

        //                     require_once(VIEWS_PATH."student-add.php");
        //                 }
        //                 else
        //                 {
        //                     $homeController->Index("Los datos son incorrectos!");
        //                 }
                        
        //             }
        //             elseif(!empty($studentBD))
        //             {
        //                 if($password == $studentBD[0]->getPassword())
        //                 {
        //                     $_SESSION["student"] = $studentBD[0];
        //                     $this->ShowPerfil();
        //                 }
        //                 else
        //                 {
        //                     $homeController->Index("Contraseña incorrecta!");
        //                 }
        //             }
        //             elseif (!is_null($studentFinded))
        //             {
        //                 $arrayStudents = $this->studentDAO->GetAll();
        //                 $_SESSION["student"] = $studentFinded;
                    
        //                 $this->ShowPerfil();
        //             } 
        //             else
        //             {
        //                 $homeController->Index("Los datos ingresados no son validos!");
        //             }
        //         }
        //     }
        //     else
        //     {
        //         $homeController->Index("Debes completar los datos!");
        //     }
            
        // }     

        // public function LogIn($email){
        //     if(!empty($email))
        //     {
        //         $studentList = $this->studentDAO->GetAll();
        //         $studentFinded = null;
        //         foreach($studentList as $student)
        //         {
        //             if($email == $student->getEmail() && $student->getStudyStatus() === true){
        //                 $studentFinded = $student;
        //             }
        //         }
                
        //         $homeController = new HomeController();
        //         $student = $this->studentDAO->GetStudentByEmail($email);

        //         if(is_null($studentFinded) && empty($student) )
        //         {
        //             $homeController->Index("El email no es valido o el usuario no esta activo!");
        //         }
        //         elseif($email == "admin@utn.com")
        //         {
        //             require_once(VIEWS_PATH."login2.php");
        //         }
        //         else
        //         {
        //             if(empty($student) || $student[0]->getPassword() == "12345")
        //             {
        //                 require_once(VIEWS_PATH."singIn.php");
        //             }
        //             else
        //             {
        //                 require_once(VIEWS_PATH."login2.php");
        //             }
        //         }
        //     }
        // }     

        // public function CreateStudent($email, $password)
        // {
        //     $studentFinded = $this->studentDAO->SearchStudentByEmail($email);
        //     $studentBD = $this->studentDAO->GetStudentByEmail($email);

        //     if(!is_null($studentFinded) || !empty($studentBD))
        //     {
        //         if(empty($studentBD))
        //         {
        //             $this->studentDAO->Add($studentFinded);
        //             $this->studentDAO->SetPassword($email, $password);
        //             $_SESSION["student"] = $studentFinded;
        //             $this->ShowPerfil();
        //         }
        //         else
        //         {
        //             $this->studentDAO->SetPassword($email, $password);
        //             $_SESSION["student"] = $studentBD[0];
        //             $this->ShowPerfil();
        //         }
        //     }

        // }
    }
?>
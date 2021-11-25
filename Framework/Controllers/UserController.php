<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use DAO\studentDAO as studentDAO;
    use DAO\CompanyDAO as CompanyDAO;
    use Models\Student as Student;
    use Controllers\HomeController as HomeController;

    class UserController
    {
        private $UserDAO;
        private $studentDAO;

        public function __construct()
        {
            $this->UserDAO = new UserDAO();
            $this->studentDAO = new studentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."user-add.php");
        }

        public function ShowPerfil()
        {
            $studentFinded =  $_SESSION["student"];
            require_once(VIEWS_PATH."student-perfil.php");
        }


        public function ShowPerfilCompany()
        {
            $companyFinded =  $_SESSION["company"];
            $companyName = $companyFinded->getName();
            $companyAddress =  $companyFinded->getAddress();
            $companyPhoneNumber =  $companyFinded->getPhoneNumber();
            $companyEmail =  $companyFinded->getEmail();
            $companyCuil=  $companyFinded->getCuil();

            require_once(VIEWS_PATH."company-perfil.php");
        }

        public function ShowLogout()
        {
            require_once(VIEWS_PATH."logout.php");
        }

        // public function ShowListView()
        // {
        //     $UserList = $this->UserDAO->GetAll();
        //     $email = null;

        //     require_once(VIEWS_PATH."User-list.php");
        // }

        public function Add($email, $password,  $idRol)
        {
            $user = new User($email, $password);
            $user->setIdRol($idRol);

            $this->UserDAO->Add($user);
            ?>
            <script>alert("admin creado con exito :)")</script>
            <?php
            $this->ShowAddView();
        }

        public function AddUser($email, $password,  $idRol)
        {
            $user = new User($email, $password);
            $user->setIdRol($idRol);

            $this->UserDAO->Add($user);
        }

        public function Search($email, $password){
            $homeController = new HomeController();

            if(!empty($email) && !empty($password))
            {
                $studentList = $this->studentDAO->GetAll();
                $studentFinded = null;
                foreach($studentList as $student)
                {
                    if($email == $student->getEmail()){
                        if($student->getStudyStatus() === true)
                        {
                            $studentFinded = $student;
                        }
                        else
                        {
                            $studentFinded = null;
                            $homeController->Index("El email no es valido o el usuario no esta activo!");
                        }
                    }
                }

                $userBD = $this->UserDAO->GetUserByEmail($email);
                if(!is_null($studentFinded) || !empty($userBD))
                {
                    if(!empty($userBD))
                    {
                        if($userBD[0]->getIdRol() == "1")
                        {
                            if($password == $userBD[0]->getPassword())
                            {
                                $_SESSION["student"] = $studentFinded;
                                $this->ShowPerfil();
                            }
                            else
                            {
                                $homeController->Index("Contraseña incorrecta!");
                            }
                        }
                        elseif($userBD[0]->getIdRol() == "2")
                        {
                            if($password == $userBD[0]->getPassword())
                            {
                                $_SESSION["admin"] = $userBD[0];
                                $this->ShowAddView();
                            }
                            else
                            {
                                $homeController->Index("Contraseña incorrecta!");
                            }
                        }
                        elseif($userBD[0]->getIdRol() == "3")
                        {
                            if($password == $userBD[0]->getPassword())
                            {
                                $companyDAO = new CompanyDAO();
                                $companyFinded = $companyDAO->GetByEmail($email);
                                $_SESSION["company"] = $companyFinded[0];
                                $this->ShowPerfilCompany();
                            }
                            else
                            {
                                $homeController->Index("Contraseña incorrecta!");
                            }
                        }
                        
                    }
                    else
                    {
                        $homeController->Index("Los datos ingresados no son validos!");
                    }
                }
            }
            else
            {
                $homeController->Index("Debes completar los datos!");
            }
            
        }     

        public function LogIn($email){
            $homeController = new HomeController();
            if(!empty($email))
            {
                // Verificamos si el user es un estudiante de la API
                $studentList = $this->studentDAO->GetAll();
                $studentFinded = null;
                foreach($studentList as $student)
                {
                    if($email == $student->getEmail() && $student->getStudyStatus() === true){
                        $studentFinded = $student;
                    }
                }

                // Buscamos al user en la base de datos
                $userBD = $this->UserDAO->GetUserByEmail($email);

                if(is_null($studentFinded) && empty($userBD))
                {
                    $homeController->Index("El email no es valido o el usuario no esta activo!");
                }
                elseif(!empty($userBD))
                {
                    if($userBD[0]->getPassword() == "1234" && $userBD[0]->getIdRol() == "3")
                    {
                        require_once(VIEWS_PATH."singIn.php");
                    }
                    else
                    {
                        require_once(VIEWS_PATH."login2.php");
                    }
                    
                }
                else
                {
                    if(empty($userBD))
                    {
                        require_once(VIEWS_PATH."singIn.php");
                    }
                }
            }
        }     

        public function CreateUser($email, $password)
        {
            // Verificamos si es un estudiante
            $studentFinded = $this->studentDAO->SearchStudentByEmail($email);
            // Verificamos si es una empresa
            $userBD = $this->UserDAO->GetUserByEmail($email);

            if(!is_null($studentFinded) && is_null($userBD))
            {
                //Creamos el user
                $this->AddUser($email, $password, "1");
                $userBD = $this->UserDAO->GetuserByEmail($email);
                $idUser = $userBD[0]->getIdUser();
                //Creamo el estudiante
                $studentFinded->setPassword($password);
                $this->studentDAO->Add($studentFinded, $idUser);

                $_SESSION["student"] = $studentFinded;
                $this->ShowPerfil();
            }
            else
            {
                $companyDAO = new CompanyDAO();
                $this->UserDAO->SetPassword($email, $password);
                $companyFinded = $companyDAO->GetByEmail($email);
                $_SESSION["company"] = $companyFinded[0];
                $this->ShowPerfilCompany();
            }

        }
    }
?>
<?php
  require_once "Config/Autoload.php";

  use Models\Student as Student;
  use DAO\StudentDao as StudentDao;

  if ($_POST) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $StudentDao = new StudentDao();

    $studentList = $StudentDao->GetAll();

    $i = 0;

    while ($i < count($studentList) && ($studentList[$i]->getEmail() != $email || !password_verify($password, $userList[$i]->getPassword()))) {
      $i++;
    }

    if ($i < count($studentList)) {
      //session_start();
      $_SESSION["email"] = $email;
      header("location: index.php");
    } else {
      header("location: login.php?msg=incorrect");
    }
  }
?>
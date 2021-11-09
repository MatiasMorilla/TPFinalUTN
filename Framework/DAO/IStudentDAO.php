<?php
    namespace DAO;

    use Models\Student as Student;

    interface IStudentDAO
    {
        function Add(Student $student, $idUser);
        function GetAll();
    }
?>
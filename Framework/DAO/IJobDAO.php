<?php
    namespace DAO;

    use Models\Job as Job;

    interface IJobDAO
    {
        function Add(Job $job);
        function GetAll();
    }
?>
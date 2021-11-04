<?php
    namespace DAO;

    use Models\Aplicants as Aplicants;

    interface IAplicantsDAO
    {
        function Add(Aplicants $aplicant);
        function GetAll();
    }
?>
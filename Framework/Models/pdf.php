<?php
    namespace Models;
    use FPDF\fpdf as FPDF;

    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(65);
            // Título
            $this->Cell(60,10,'Lista de Postulantes',1,0,'C');
            // Salto de línea
            $this->Ln(20);
        }
        
        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
?>
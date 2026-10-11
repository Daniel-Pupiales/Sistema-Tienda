<?php
date_default_timezone_set('America/Guayaquil');
require_once "fpdf/fpdf.php";

class PDF extends FPDF
{
  function Header()
  {

    $this->Image("img/iconos/logoTienda.png", 10, 10, 75);

    // Encabezado empresa
    $this->SetFont("Arial", "B", 18);
    $this->SetTextColor(0, 51, 102);
    $this->Cell(0, 10, "SUPERTIENDA S.A.", 0, 1, "R");

    $this->SetFont("Arial", "", 10);
    $this->SetTextColor(80, 80, 80);
    $this->Cell(0, 5, "RUC: 9999999999999 | Sangolqui, Ecuador", 0, 1, "R");
    $this->Cell(0, 5, "Fecha de emision: " . date("d/m/Y H:i"), 0, 1, "R");

    $this->Ln(10);
    // Línea separadora
    $this->SetDrawColor(0, 51, 102);
    $this->Line(10, 45, 200, 45);
    $this->Ln(10);
  }

  function Footer()
  {
    $this->SetY(-25);
    $this->SetDrawColor(0, 51, 102);
    $this->Line(10, 270, 200, 270);
    $this->SetFont("Arial", "I", 8);
    $this->SetTextColor(100);
    $this->Ln(5);
    $this->Cell(0, 10, "Pagina " . $this->PageNo() . "/{nb}", 0, 0, "C");
  }
}

<?php
//ob_start();
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . 'fpdf181/fpdf.php';
require_once root . '1_Organisation/classes/ThingsInBuildingDataClass.php';

new SessionManager();

abstract class PDFReport extends FPDF
{
	var $title;
	var $today_date;
	var $col_width;
	var $header;

	public function __construct()
	{
		GLOBAL $DB_CONN;
		$this->today_date = date("d-m-Y");
		try{	
			parent::__construct('p','mm','A4');
			$this->SetMargins(15,5);
		}
		catch(Exception $e){
			echo $e;
			die;
		}
	}
	public function __destruct()
	{
		$this->Output("D","Things outside Room Report".$this->today_date);
		//$this->Output();
	}
	
	public function Header()
	{
		//$this->write(15," Student Report ");
		$this->Ln();
		$this->SetFont('Arial','',14);
		$this->Cell(170,7,"Date :: ". $this->today_date ,1,0,'C');
		$this->Ln();
		$this->SetFont('Arial','',14); 
		$this->MultiCell(170,8,"Things outside Room Report \n".$this->title,1,'C');
		$this->Ln(5);

	}
	
	protected function addTableHeaderRow()
	{
		$this->SetFont('Arial','',12);
		$i=0;
		foreach($this->header as $col_name)
		{
			$this->Cell($this->col_width[$i++],8,$col_name,1);
		} 	
		$this->Ln();
	}
}

class PDFClassStudentReport extends PDFReport
{

	public function __construct($class_id)
	{
		parent::__construct();
		$this->col_width = array(80,90);
		$this->header = array('Building Name', 'Thing Name');
	
		$ThingsInBuildingData_object_array = ThingsInBuildingData::getAllThingsInBuildingData();
		
		$first=0;
		foreach($ThingsInBuildingData_object_array as $ThingsInBuildingData_object)
		{
			if($first==0)
			{
				$this->AddPage();
				$this->addTableHeaderRow();
				$first=1;
			}
			$i=0;
			$this->Cell($this->col_width[$i++],7,$ThingsInBuildingData_object->BuildingData_object->NAME,1);
			$this->Cell($this->col_width[$i++],7,$ThingsInBuildingData_object->ThingData_object->NAME,1);
			$this->Ln();
			
		}
	}
}
new PDFClassStudentReport(1);
?>
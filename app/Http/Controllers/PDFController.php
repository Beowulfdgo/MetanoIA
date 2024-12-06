<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use PDF;
    
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $patient = Patient::findOrFail($id); // Encuentra al paciente por su ID
    
        $data = [
            'title' => 'Reporte del Paciente',
            'date' => date('m/d/Y'),
            'patient' => $patient
        ]; 
              
        $pdf = PDF::loadView('myPDF', $data);
       
        return $pdf->download('reporte_paciente.pdf');
    }
}

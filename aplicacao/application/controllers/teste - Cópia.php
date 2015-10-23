
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Teste extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
     $this->load->library('mpdf/mpdf');


   
}

 
 function index()
 {//load our new PHPExcel library
 
    $this->load->model('curso_m');

  $data = $this->curso_m->selecionar();
 
  foreach ($data as $linha){
   $codcurso=$linha->codcurso;
 $nome =$linha->nome;
    $modulo =$linha->modulo; 
    $descricao=$linha->descricao;
  $cargahr  =$linha->cargahr; 
   $areatema  =$linha->areatema;
   $competencia  =$linha->competencia; 
    $estado =$linha->estado;
   
   
   
  $html = '
<table border="1" >
     
            <tr>
            <td>
                '.$codcurso.' 
            </td>
            <td>
                '.$nome.' 
            </td>
            <td>
                '.$modulo.'
            </td>
             <td>
                '.$descricao.'
            </td>
             <td>
                '.$cargahr.' 
            </td>
             <td>
                '.$areatema.'
            </td>
             <td>
                '.$competencia.' 
            </td>
             <td>
                '.$estado.'
            </td>
              
            
          
             <td background="'.base_url().'figuras/editar.jpeg" > 
			teste
               <td>    
               teste
                  
           
          
            
            
            
            
        </tr>
       
   
</table>




';
 
        
}

 

$mpdf=new mPDF();

$mpdf->WriteHTML($html);
//Colocando o rodape
$mpdf->SetFooter('{DATE j/m/Y H:i}|Página {PAGENO} de {nb}|www.gqferreira.com.br');
$mpdf->Output();
$mpdf->charset_in='windows-1252';
exit;
}





 }


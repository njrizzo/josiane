
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Testexml extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  


   
}

 
 function index()
 {//load our new PHPExcel library

   $this->load->model('curso_m');

  $data = $this->curso_m->selecionar();
 
 
   
   
   
$html = '';
  $html .= "<body>";
  $html .=  "<table border='1'>";
 
  $html .=    "<tr>";
  $html .=      "<td><strong>curso</strong></td>";
  $html .=      "<td><strong>Nome</strong></td>";
  $html .=      "<td><strong>modulo</strong></td>";
  $html .=      "<td><strong>descricao</strong></td>";
  $html .=      "<td><strong>cargahr</strong></td>";
  $html .=      "<td><strong>areatema</strong></td>";
  $html .=      "<td><strong>competencian</strong></td>";
  $html .=      "<td><strong>estado</strong></td>";

  $html .=    "</tr>";
 

    foreach ($data as $linha){
            $html .=   "<tr>";
              $html .=  "<td>   $linha->codcurso </td>";
            $html .=   "<td> $linha->nome</td>";
          $html .=   "<td> $linha->modulo</td>";
        $html .=     "<td> $linha->descricao </td>";
         $html .= "<td> $linha->cargahr</td>";
          $html .=    "<td> $linha->areatema</td>";
         $html .=    " <td> $linha->competencia</td>";
        $html .=       "<td>$linha->estado</td>";
}              
            
          
    $html .=  "</table>";       
   

 $html .=    "</body>";








$nome_arquivo = "Cadastro";
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");
echo $html;


 
        


 /*

   // Determina que o arquivo é uma planilha do Excel
   header("Content-type: application/vnd.ms-excel");   

   // Força o download do arquivo
   header("Content-type: application/force-download");  

   // Seta o nome do arquivo
   header("Content-Disposition: attachment; filename=file.xls");

   header("Pragma: no-cache");
   // Imprime o conteúdo da nossa tabela no arquivo que será gerado
   echo $html;

*/


}
 }


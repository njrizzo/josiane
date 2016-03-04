
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorio extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  
   $this->load->model('Relatorio_m','relatorio_m');

       $this->load->model('Admin_m','admin_m',TRUE);
   $this->admin_m->logged();
}

 
 function index()
 {
$this->load->view('relatorio_v');       
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

public function matricula_curso(){
	
	$data = $this->relatorio_m->r_matri_c();
	
	   
$html = '';
  $html .= "<body>";
	 $html .= "<strong><h2><font color='#000000' size='+2'>Relat&oacute;rio Geral dos Matriculados -  CODEP-DP/PROAD </font></h2></strong>";
	 $html .= "<table width='1467' border='1' cellpadding='0' cellspacing='0' style='font-size:12px'>";
	 $html .= "<tr>";
     $html .= " <td width='70' bgcolor='#FFCC66'><span style='color:#000000'>N&ordm; Cadastro</span></td>";
     $html .= " <td width='122' bgcolor='#FFCC66'><span style='color:#000000'>Nome</span></td>";
     $html .= "<td width='122' bgcolor='#FFCC66'><span style='color:#000000'>CPF:</span></td>";
     $html .= "<td width='143' bgcolor='#FFCC66'><span style='color:#000000'>Nome da Unidade</span></td>";
     $html .= "<td width='125' bgcolor='#FFCC66'><span style='color:#000000'>Nome do Setor</span></td>";
     $html .= "<td width='170' bgcolor='#FFCC66'><span style='color:#000000'>Nome do Curso/M&oacute;dulo</span></td>";
     $html .= "<td width='75' bgcolor='#FFCC66'><span style='color:#000000'>Nome da Turma</span></td>";
     $html .= "<td width='110' bgcolor='#FFCC66'><span style='color:#000000'>Situa&ccedil;&atilde;o </span></td>";
     $html .= "<td width='172' bgcolor='#FFCC66'><span style='color:#000000'>M&oacute;dulo</span></td>";
     $html .= " <td width='145' bgcolor='#FFCC66'><span style='color:#000000'>Data da Matr&iacute;cula</span></td>";
     $html .= " <td width='145' bgcolor='#FFCC66'><span style='color:#000000'>Data do in&iacute;cio do curso</span></td>";
     $html .= " <td width='145' bgcolor='#FFCC66'><span style='color:#000000'>Data do fim do curso</span></td>";
     $html .= " <td width='145' bgcolor='#FFCC66'><span style='color:#000000'>Nome do Chefe</span></td>";
     $html .= "<td width='145' bgcolor='#FFCC66'><span style='color:#000000'>E-mail do Chefe</span></td>";
  $html .= " </tr>";
	 foreach ($data as $linha){
            $html .=   "<tr>";
            $html .=  		"<td> $linha->codserv </td>";
            $html .=   		"<td> $linha->nomeserv</td>";
            $html .=   		"<td> $linha->cpfl</td>";
			$html .=    	"<td> $linha->unidade </td>";
			$html .=		"<td> $linha->setor </td>";
			$html .=    	"<td> $linha->nome - $linha->modulo </td>";
			$html .=    	"<td> $linha->nometurma</td>";
			$html .=    	"<td> $linha->situacao</td>";
			$html .=       	"<td> $linha->modulo</td>";
			$html .=       	"<td> $linha->datamat</td>";
			$html .=       	"<td> $linha->datainicio </td>";
			$html .=       	"<td> $linha->datafim</td>";
			$html .=       	"<td> $linha->nomechefe</td>";
			$html .=       	"<td> $linha->emailchefe</td>";
			$html .=   "</tr>";
        
        
}//endforeach    
	    $html .=  "</table>";       
		$html .=    "</body>";	
$nome_arquivo = "RelatorioMatriculados";
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");
echo $html;

	}//endfuncao



public function aprovados_curso(){
	$data = $this->relatorio_m->r_aprovados_c();
	$html = '';
    $html .= "<body>";
	$html .= "<table width='1245' border='1' align='center' cellpadding='0'>";
	$html .= "<caption><h2>Relat&oacute;rio dos Aprovados nos Cursos/M&oacute;dulos </h2></caption>";
	$html .= "<tr>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>Curso/M&oacute;dulo</strong></td>";
    $html .="<td  align='center' bgcolor='#999999'><strong>Turma</strong></td>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>CH</strong></td>";
    $html .= "<td align='center' bgcolor='#999999'><strong>Per&iacute;odo</strong></td>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>N&ordm; aprovados</strong></td>";
    //$html .= "<td width='318' align='center' bgcolor='#999999'><strong>Nº Concluintes por unidade</strong></td>";
 $html .= "</tr>";
 
  foreach ($data as $linha){
 
 
  $html .=   "<tr>";
              $html .=  "<td>   $linha->nome - $linha->modulo </td>";
			  $html .=   "<td> $linha->nometurma</td>";
			  $html .=   "<td> $linha->cargahr</td>";
			  $html .=     "<td> $linha->datainicio a $linha->datafim </td>";
			  $html .= "<td> $linha->count </td>";
         
}//endforeach

  $html .=  "</table>";       
  $html .=    "</body>";	
$nome_arquivo = "RelatorioAprovados";
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");
echo $html;

}//endfuncao


public function inscritos_curso(){
	$data = $this->relatorio_m->r_inscritos_c();
	$html = '';
    $html .= "<body>";
	$html .= "<table width='1245' border='1' align='center' cellpadding='0'>";
	$html .= "<caption><h2>Relat&oacute;rio dos Inscritos nos Cursos/M&oacute;dulos </h2></caption>";
	$html .= "<tr>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>Curso</strong></td>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>M&oacute;dulo</strong></td>";
    $html .="<td  align='center' bgcolor='#999999'><strong>Turma</strong></td>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>CH</strong></td>";
    $html .= "<td align='center' bgcolor='#999999'><strong>Per&iacute;odo</strong></td>";
	$html .= "<td  align='center' bgcolor='#999999'><strong>N&ordm; Inscritos</strong></td>";
    //$html .= "<td width='318' align='center' bgcolor='#999999'><strong>Nº Concluintes por unidade</strong></td>";
	$html .= "</tr>";
 
  foreach ($data as $linha){
 
 
  $html .=   "<tr>";
              $html .=  "<td>   $linha->nome  </td>";
              $html .=  "<td>   $linha->modulo </td>";
			  $html .=   "<td> $linha->nometurma</td>";
			  $html .=   "<td> $linha->cargahr</td>";
			  $html .=     "<td> $linha->datainicio a $linha->datafim </td>";
			  $html .= "<td> $linha->count </td>";
         
}//endforeach

  $html .=  "</table>";       
  $html .=    "</body>";	
$nome_arquivo = "RelatorioInscritos";
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");
echo $html;

}//endfuncao





public function servidores_total(){
	
	$data = $this->relatorio_m->r_servidores_ch();
	
	   
$html = '';
  $html .= "<body>";
  $html .= "<strong ><h2><font color='#000000' size='+2'>Relat&oacute;rio dos Servidores -  CODEP-DP/PROAD </font></h2></strong>";
  $html .= "<table width='1467' border='1' cellpadding='0' cellspacing='0' style='font-size:12px'>";
  $html .= "<tr>";
    
     $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>Nome</span></td>";
     $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>SIAPE:</span></td>";
	 $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>Nome do Setor</span></td>";
     $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>Fun&ccedil;&atilde;o</span></td>";
     $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>Nome do Chefe</span></td>";
     $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>Total de cursos conclu&iacute;dos</span></td>";
     $html .= "<td  bgcolor='#FFCC66'><span style='color:#000000'>Carga hor&aacute;ria total</span></td>";
     

     
  $html .= " </tr>";
	 foreach ($data as $linha){
            $html .=   "<tr>";
			$html .=   		"<td> $linha->nomeserv</td>";
            $html .=   		"<td> $linha->siape</td>";
			$html .=		"<td> $linha->setor </td>";
			$html .=    	"<td> $linha->funcao</td>";
			$html .=       	"<td> $linha->nomechefe</td>";
			$html .=    	"<td> $linha->count</td>";
			$html .=    	"<td> $linha->sum</td>";
			$html .=   "</tr>";
        
        
}//endforeach    
	    $html .=  "</table>";       
		$html .=    "</body>";
$nome_arquivo = "RelatorioServidores";
    header("Content-type: application/vnd.ms-excel");
    header("Content-type: application/force-download");
    header("Content-Disposition: attachment; filename=$nome_arquivo.xls");
    header("Pragma: no-cache");
echo $html;

	}//endfuncao














 }//endcontroler


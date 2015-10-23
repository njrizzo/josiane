
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
<style type="text/css">
	<!--
table {
  border-collapse: collapse;
  font-size:30pt; 
 
background-image: url("figuras/fundo.png");
}
 th {
 width: 189px; 

  background-image: url("figuras/lado.png");
  }


-->
</style>
<table border="0"   >
     
     
       <tr   >
<th  rowspan="4"   ></th>
<td width="45"  lign="left"><img src="  '.base_url().'figuras/logor.png"   /></td>
<td   width="745" lign="left"><P>
	<b><h6><font color="#61380B"  >Universidade Federal Rural do Rio de Janeiro<br>
	Decanato de Assuntos Administrativos<br>
	Departamento Pessoal<br>
	Coordenação de Desenvolvimento de pessoas<br> </P></b></font></h6><br></td>
</tr >
 
<tr>
<td  colspan="2" valign="top"  align="center"  ><font color="#61380B" size="7" ><i>Certificado</i></font><br><br><font color="#61380B" size="-1" ><p>Certifico que <u>'.$nome.' </u> , participou da <strong>'.$modulo.'</strong>, oferecido pela Coordenação de Desenvolviento de Pessoas -DP/DDA, no período de 20 a 24 de Setembro de 2010 com carga horaria de '.$cargahr.' horas.<br ></p></font><br></td>
</tr>
<tr>

<td  colspan="2" align="right" valign="top" ><font color="#61380B" size="1">UFRRJ, 06 de outubro de 2015<br></font>  </td>


</tr>
<tr>

<td   width="745" colspan="2" align="center" valign="top" ><img src="  '.base_url().'figuras/base.png"   />  </td>

<br>
</tr>
</table>






';
 
        
}

 

$mpdf=new mPDF('utf-8', 'A4-L');

$mpdf->WriteHTML($html);
//Colocando o rodape

$mpdf->Output();
$mpdf->charset_in='windows-1252';
exit;
}





 }


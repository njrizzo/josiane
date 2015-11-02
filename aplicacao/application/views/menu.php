<?php
//$this->load->view('template/cabecalho');  
//$this->load->view('template/menucurso');  
//<a href="home/logout">Logout</a>
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost/test/aplicacao/" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href="figuras/favicon.gif">
<title>SICAP - CODEP - DP/DAA</title>
<style type="text/css">
<!--
body {
	background-image:  url(figuras/back2.jpg);
	background-repeat: repeat-y;
	background-position: center center;
}
div.whatever{
	background: url(figuras/logon.gif) no-repeat top left;
	margin:0;
	padding:15px 0 0 15px;
}
table#logon{
	font-size:10pt;
	font:Verdana, Geneva, sans-serif;
	}
#logon .input_text{
	margin:0;
	padding:1px;
	border:1px solid #666;
	width:70%;
	}
	#logon .input_bt{
	margin:0;
	padding:1px;
	border:1px solid #666;
	background-color:#FFF;
	margin-right:8px;
	color: #666;
	}
-->
</style>
</head>

   
<body ><table width="665" height="518" border="0" align="center" >
	
  <tr>
    <td height="514"><table width="668" height="435" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="668" height="31" colspan="2" align="center" valign="middle" background="figuras/top.gif" scope="col"><font color="#FFFFFF"  size="-1"><strong>CODEP</strong> -<strong> DP/DAA</strong> - <strong>SICAP</strong> - Sistema Integrado de Capacita&ccedil;&atilde;o </font></th>
      </tr>
      <tr>
        <th height="371" colspan="2" align="center" valign="middle" scope="row">
		
   <h2>Administrador: <?php echo $username; ?>!</h2>
   
  

		
        <table width="200" border="0" align="center">
          <tr>
            <th scope="col" colspan="2"><?php echo anchor('servidor','<img src="figuras/btnc.gif" name="curso" width="117" height="111" border="0" id="curso" />')?>
            Painel</th>
            <th scope="col" colspan="2"><?php echo anchor('curso',' <img src="figuras/btnrr.gif" name="cadastro" width="117" height="111" border="0" id="cadastro" />')?>
            Administrador</th>
            <th width="58" colspan="2" scope="col"><?php echo anchor('curso','<img src="figuras/btnca.gif" name="inscricao" width="117" height="111" border="0" id="inscricao" />')?>
            Créditos</th>
          </tr>
          <tr>
             <th scope="col" colspan="2"><?php echo anchor('curso','<img src="figuras/btni.gif" name="matricula" width="117" height="111" border="0" id="matricula" />')?>
            Certificados</th>
            <th scope="col" colspan="2"><?php echo anchor('curso',' <img src="figuras/btnii.gif" name="relatorio" width="117" height="111" border="0" id="relatorio" />')?>
            Relatórios</th>
            <th scope="col" colspan="2"><?php echo anchor('home/logout','<img src="figuras/btnd.gif" alt="Sair do Sistema" name="sair" width="117" height="111" border="0" id="sair" />')?>
            Sair</th>
          </tr>
          
             
             
        </table>
        </th>
      </tr>
      <tr>
        <th height="23" colspan="2" scope="row" background="figuras/dow.gif"><font color="#FFFFFF"  size="-4">SICAP | Copyright &copy; 2010 - Coordena&ccedil;&atilde;o de Desenvolvimento de Pessoas - DP/DAA/UFRRJ - www.ufrrj.br/codep</font></th>
      </tr>
    </table></td>  
  </tr>
  
</table>

</body>
</html>

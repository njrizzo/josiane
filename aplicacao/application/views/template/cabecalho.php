<?php
defined('BASEPATH') OR exit('No direct script access allowed');


date_default_timezone_set( 'America/Sao_Paulo' );
?><!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="http://localhost:8080/test/aplicacao/" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href='figuras/favicon.gif'>
<link href="style.css" rel="stylesheet" type="text/css" />


<title>SICAP - CODEP - DP/DAA</title>

</head>

<body ><table width="665" height="518" border="1" align="center" >
  <tr>
    <td height="514"><table width="668" height="435" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <th width="668" height="31" colspan="2" align="center" valign="middle" background="figuras/top.gif" scope="col"><font color="#FFFFFF"  size="-1"><strong>CODEP</strong> -<strong> DP/DAA</strong> - <strong>SICAP</strong> - Sistema Integrado de Capacita&ccedil;&atilde;o </font></th>
      </tr>
       <tr>
        <th width="668" height="31" colspan="2" align="center" valign="middle" scope="col" background="figuras/abc.gif">
        
        <li class="menu"><?php echo anchor('servidor/listar',' _<font color="#FFFFFF">SERVIDOR</font>_')?></li>
        <li class="menu"><?php echo anchor('curso',' _<font color="#FFFFFF">CURSO</font>_')?></li>
        <li class="menu"><?php echo anchor('turma',' _<font color="#FFFFFF">TURMA</font>_')?></li>
        <li class="menu"><?php echo anchor('inscricao',' _<font color="#FFFFFF">INSCRI&Ccedil;&Atilde;O</font>_')?></li>
        <li class="menu"><?php echo anchor('matricula',' _<font color="#FFFFFF">MATR&Iacute;CULA</font>_')?></li>
        
  
        </th>
      </tr>
      
		
    <tr>
        <th height="371" colspan="2" align="center" valign="middle" scope="row">


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://localhost/test/aplicacao/" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href="figuras/favicon.gif">
<link href="style.css" rel="stylesheet" type="text/css" />

<title>SICAP - CODEP - DP/DAA</title>


</script>
</head>

<body ><table width="665" height="518" border="0" align="center" >
  <tr>
    <td height="514"><table width="668" height="435" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <th width="668" height="31" colspan="2" align="center" valign="middle" background="figuras/top.gif" scope="col"><font color="#FFFFFF"  size="-1"><strong>CODEP</strong> -<strong> DP/DAA</strong> - <strong>SICAP</strong> - Sistema Integrado de Capacita&ccedil;&atilde;o </font></th>
      </tr>
       <tr>
        <th width="668" height="31" colspan="2" align="center" valign="middle" scope="row">
        
        <li class="menu"><a href=index.php style="text-decoration:none" > _<font  color="#FFFFFF">SERVIDOR</font>_</li></a>
        <li class="menu"><a href=index.php style="text-decoration:none" > _<font color="#FFFFFF">CURSO</font>_</li></a>
        <li class="menu"><a href=index.php style="text-decoration:none" > _<font color="#FFFFFF">TURMA</font>_</li></a>
        <li class="menu"><a href=index.php style="text-decoration:none" > _<font color="#FFFFFF">INSCRI&Ccedil;&Atilde;O</font>_</li></a>
        <li class="menu"><a href=index.php style="text-decoration:none" > _<font color="#FFFFFF">MATR&Iacute;CULA</font>_</li></a>
       
        
        
        
        
        
        
        
        </th>
      </tr>
      
		
        
         <tr>
        <th height="371" colspan="2" align="left" valign="top" scope="row"><table width="670" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="117" height="527" valign="top"><table border="1" cellpadding="0" cellspacing="0">
            
            <tr>
                 <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font size="-1" color="#FFFFFF">PRINCIPAL</font></a></th>
              </tr>
              <tr>
                <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font  size="-1" color="#FFFFFF">CADASTRAR</font></a></th>
              </tr>
              <tr>
                 <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font  size="-1" color="#FFFFFF">CONSULTAR</font></a></th>
              </tr>
              <tr>
                 <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font  size="-1" color="#FFFFFF">ALTERAR</font></a></th>
              </tr>
              <tr>
                 <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font  size="-1" color="#FFFFFF">EXCLUIR</font></a></th>
              </tr>
              <tr>
                 <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font size="-1" color="#FFFFFF">IN&Iacute;CIO</font></a></th>
              </tr>
              <tr>
                 <th width="106"   height="20" background="figuras/menut.gif" colspan="2" align="center" valign="middle"  scope="col"><a href= curso/index.php style="text-decoration:none" > <font size="-1" color="#FFFFFF">SAIR</font></a></th>
              </tr>
            
              <tr>
                <th  height="379" bgcolor="#00009C" scope="row">&nbsp;</th>
              </tr>
            </table></td>



            
            
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1>Cadastrar novo curso   </h1>
            
            <form id="form1" name="form1" method="post" action="confirmacao.php">
<table width="472" border="0" id="logon">
  <tr>
    <td width="101">Nome:</td>
    <td width="361">
        <input name="nome" type="text" class="input_text" id="nome" />
    </td>
  </tr>
  <tr>
    <td>M&oacute;dulo:</td>
    <td>
      <input name="modulo" type="text" class="input_text" id="modulo" />
     </td>
  </tr>
  <tr>
    <td>Descri&ccedil;&atilde;o:</td>
    <td>
      <textarea name="descricao" cols="45" rows="5" id="descricao"></textarea>
      <br />
      </td>
  </tr>
  <tr>
    <td>Carga hor&aacute;ria:</td>
    <td>
    <input type="text" name="carga" id="carga" size="5"/>
    <br />
    </td>
  </tr>
  <tr>
    <td>&Aacute;rea tem&aacute;tica:</td>
    <td>
      <input name="tematica" type="text" class="input_text" id="tematica" />
      </td>
  </tr>
  <tr>
    <td>Compet&ecirc;ncia:</td>
    <td>
      <textarea name="competencia" id="competencia" cols="45" rows="5"></textarea><br />
      
      </td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
      <select name="estado" id="estado">
        <option value="0">--selecione--</option>
        <option value="ativo">ativo</option>
        <option value="inativo">inativo</option>
      </select><br />
      
      
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td align="right"><input name="proximo" type="submit" class="input_bt" id="proximo" value="Confirmar" /></td>
  </tr>
</table>
</form>

            	
				
				
				</td>

           
            </tr>
         </table></th>
         </tr>
      <tr>
        <th height="23" colspan="2" scope="row" background="figuras/dow.gif"><font color="#FFFFFF"  size="-4">SICAP | Copyright &copy; 2010 - Coordena&ccedil;&atilde;o de Desenvolvimento de Pessoas - DP/DAA/UFRRJ - www.ufrrj.br/codep</font></th>
      </tr>
    </table></td>  
  </tr>
  
</table>

</body>
</html>

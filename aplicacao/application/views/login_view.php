<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	 <base href="http://localhost:8080/test/aplicacao/" />
  
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/gif" href='figuras/favicon.gif'>
<link href="style.css" rel="stylesheet" type="text/css" />
 <title>SICAP - CODEP - DP/DAA</title>
 <?php echo validation_errors('<h4 align="center">','</h4>'); ?>
 </head>
 <body>
   
   
   <?php echo form_open('login/verifylogin'); ?>
     <table width="302" height="160" border="0" align="center" cellpadding="0" cellspacing="0" background="figuras/logon.gif"  id="logon">
		 
          <tr>
            <td width="89" scope="col">&nbsp;</td>
             
            <td width="213" scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" valign="bottom" scope="row">  Usu&aacute;rio:</td>
            <td align="center" valign="bottom"><span id="sprytextfield1">
              
                <input name="username" type="text" class="input_text" id="username" />
            <br />
             
          </tr>
          
          <tr>
            <td align="right" valign="bottom" scope="row">Senha:</td>
            <td align="center" valign="bottom"><span id="sprypassword1">
              
                <input name="password" type="password" class="input_text" id="password" />
              <br/>
             
          </tr>
          <tr>
            <td height="40" colspan="2" align="center" scope="row">
                <input name="enviar" type="submit" class="input_bt" id="enviar" value="Entrar no SICAP" />
            </td>
          </tr>
         
        </table>
        
   </form>
 </body>
</html>

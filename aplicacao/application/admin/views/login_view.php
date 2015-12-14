<?php  $this->load->view('template/head'); ?>
 
 <body>
   <table width="665" height="518" border="0" align="center" >
	
  <tr>
    <td height="514"><table width="668" height="435" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="668" height="31" colspan="2" align="center" valign="middle" background="figuras/top.gif" scope="col"><font color="#FFFFFF"  size="-1"><strong>CODEP</strong> -<strong> DP/DAA</strong> - <strong>SICAP</strong> - Sistema Integrado de Capacita&ccedil;&atilde;o </font></th>
      </tr>
      <tr>
        <th height="371" colspan="2" align="center" valign="middle" scope="row">
 <?php echo validation_errors('<h4 align="center">','</h4>'); ?>   
   <?php echo form_open('login/verifylogin'); ?>
     <table width="302" height="160" border="0" align="center" cellpadding="0" cellspacing="0" background="figuras/logon.gif"  id="logon">
		 
          <tr>
            <td width="89" scope="col">&nbsp;</td>
             
            <td width="213" scope="col">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" valign="bottom" scope="row">  Usu&aacute;rio:</td>
            <td align="center" valign="bottom"><span id="sprytextfield1">
              
                <input name="usuario" type="text" class="input_text" id="usuario" />
            <br />
             
          </tr>
          
          <tr>
            <td align="right" valign="bottom" scope="row">Senha:</td>
            <td align="center" valign="bottom"><span id="sprypassword1">
              
                <input name="senha" type="password" class="input_text" id="senha" />
              <br/>
             
          </tr>
          <tr>
            <td height="40" colspan="2" align="center" scope="row">
                <input name="enviar" type="submit" class="input_bt" id="enviar" value="Entrar no SICAP" />
            </td>
          </tr>
         
        </table>
        <tr>
        <th height="23" colspan="2" scope="row" background="figuras/dow.gif"><font color="#FFFFFF"  size="-4">SICAP | Copyright &copy; 2010 - Coordena&ccedil;&atilde;o de Desenvolvimento de Pessoas - DP/DAA/UFRRJ - www.ufrrj.br/codep</font></th>
      </tr>
    </table></td>  
  </tr>
   </form>
 </body>
</html>

<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuserv'); 
//echo validation_errors();
echo form_open('servidor/cadastrar');


?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
		<?php	
            if($this->session->flashdata('cadservok')):
echo'<p>'.$this->session->flashdata('cadservok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Cadastrar novo Servidor </font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	
    <td width="101" >Nome:</td>
    <td width="361" colspan="3">
		<?php echo form_error('nomeserv'); ?>
        <input name="nomeserv" type="text" value="<?php echo set_value('nomeserv'); ?>"  id="nomeserv" size="55"/>
        
    </td>
  </tr>
  <tr>
    <td>Sexo:</td>
    
		
    <td>
		<?php echo form_error('sexo'); ?>
		<input type="radio" name="sexo" value="masculino" <?php echo set_radio('sexo', 'masculino'); ?>/>Masculino
		<br>
<input type="radio" name="sexo" value="feminino" <?php echo set_radio('sexo', 'feminino'); ?> />Feminino
  
    
     </td>
 
    <td>Data de nascimento:</td>
    <td>
		<?php echo form_error('dltnasc'); ?>
      <input name="dltnasc" type="date" value="<?php echo set_value('dltnasc'); ?>"  id="dltnasc" />
      <br />
      
  </tr>
  <tr>
	 <td><font color="red">*</font>Identidade:  </td>
    <td>
		
		<?php echo form_error('rgl'); ?>
    <input name="rgl" type="text" value="<?php echo set_value('rgl'); ?>" id="rgl" size="10"/>
   
   </td>
 <td><font color="red">*</font>CPF:</td>
    <td>
		<?php echo form_error('cpfl'); ?>
      <input name="cpfl" type="text" value="<?php echo set_value('cpfl'); ?>"  id="cpfl" size="10"/>
      </td>

     
  </tr>
  <tr>
    <td>Nacilonalidade:</td>
    <td>
		<?php echo form_error('nacilonalidade'); ?>
      <input name="nacilonalidade" type="text" value="<?php echo set_value('nacilonalidade'); ?>" id="nacilonalidade"  >
      </td>
 
    <td>Naturalidade:</td>
    <td>
		<?php echo form_error('naturalidade'); ?>
		 <input  name="naturalidade" type="text" value="<?php echo set_value('naturalidade'); ?>" id="naturalidade"  >
     </td>
  </tr>
   <tr>
    <td>Estado Civil:</td>
    <td>
		<?php echo form_error('estcivil'); ?>
		<select id="estcivil" name="estcivil" >
		<option value=''>----selecione----</option>
	  <option value="solteiro(a)" <?php echo set_select('estcivil','solteiro(a)'); ?>>Solteiro(a)</option>
      <option value="sasado(a)" <?php echo set_select('estcivil','casado(a)'); ?> >Casado(a)</option>
      <option value="divorciado(a)" <?php echo set_select('estcivil','divorciado(a)'); ?>>Divorciado(a)</option>
      <option value="vi&uacute;vo(a)" <?php echo set_select('estcivil','viúfcv vo(a)'); ?>>Vi&uacute;vo(a)</option>
    </select>
     </td>
     
     <td  >Forma&ccedil;&atilde;o:</td>
   
 <td>
	 <?php echo form_error('ensino'); ?>
             <select id="ensino" name="ensino">
			 <option value=''>------------selecione------------</option>
             <option value="Ensino M&eacute;dio Completo" <?php echo set_select('ensino','Ensino M&eacute;dio Completo'); ?>>Ensino M&eacute;dio Completo</option>
             <option value="Ensino M&eacute;dio Incompleto"<?php echo set_select('ensino','Ensino M&eacute;dio Incompleto'); ?>>Ensino M&eacute;dio Incompleto</option>
             <option value="Ensino Fundamental Incompleto" <?php echo set_select('ensino','Ensino Fundamental Incompleto'); ?>>Ensino Fundamental Incompleto</option>
             <option value="Ensino Fundamental completo" <?php echo set_select('ensino','Ensino Fundamental completo'); ?>>Ensino Fundamental completo</option>
             <option value="Ensino Superior Incompleto"<?php echo set_select('ensino','Ensino Superior Incompleto'); ?>>Ensino Superior Incompleto</option>
             <option value="Ensino Superior Completo"<?php echo set_select('ensino','Ensino Superior Completo'); ?>>Ensino Superior Completo</option>
             <option value="P&oacute;s-Gradua&ccedil;&atilde;o"<?php echo set_select('ensino','P&oacute;s-Gradua&ccedil;&atilde;o'); ?>>P&oacute;s-Gradua&ccedil;&atilde;o</option>
             <option value="Mestrado" <?php echo set_select('ensino','Mestrado'); ?>>Mestrado</option>
             <option value="Doutorado" <?php echo set_select('ensino','Doutorado'); ?>>Doutorado</option>
             </select>
             </td>
     
  </tr>
  <tr>
	  
    <td width="101">Endere&ccedil;o - Rua:</td>
    <td width="361">
		<?php echo form_error('endereco'); ?>
        <input name="endereco" type="text" value="<?php echo set_value('endereco'); ?>" id="endereco" />
        
    </td>
 
	  
    <td width="101">N&uacute;mero da casa:</td>
    <td width="361">
		<?php echo form_error('numcasa'); ?>
        <input name="numcasa" type="text" value="<?php echo set_value('numcasa'); ?>" id="numcasa" size="5" />
        
    </td>
  </tr>
  <tr>
	  
    <td width="101">Bairro:</td>
    <td width="361">
		<?php echo form_error('bairro'); ?>
        <input name="bairro" type="text" value="<?php echo set_value('bairro'); ?>"  id="bairro" />
        
    </td>
  
	  
    <td width="101">Cidade:</td>
    <td width="361">
		<?php echo form_error('cidade'); ?>
        <input name="cidade" type="text" value="<?php echo set_value('cidade'); ?>"  id="cidade" />
        
    </td>
  </tr>
  <tr>
	  
    <td width="101">Complemento:</td>
    <td width="361">
		<?php echo form_error('complemento'); ?>
        <input name="complemento" type="text" value="<?php echo set_value('complemento'); ?>"  id="complemento" size="5"/>
        
    </td>
  
	  
    <td width="101">Estado:</td>
    <td width="361">
		<?php echo form_error('estado'); ?>
        <select name="estado">
<option value=''>----selecione----</option>					
<option value="RJ" <?php echo set_select('estado','RJ'); ?> >RJ</option>
<option value="AC" <?php echo set_select('estado','AC'); ?>>AC</option>
<option value="AL" <?php echo set_select('estado','AL'); ?>>AL</option>
<option value="AM" <?php echo set_select('estado','AM');  ?>>AM</option>
<option value="AP" <?php echo set_select('estado','AP'); ?>>AP</option>
<option value="BA" <?php echo set_select('estado','BA'); ?>>BA</option>
<option value="CE" <?php echo set_select('estado','CE'); ?>>CE</option>
<option value="DF" <?php echo set_select('estado','DF'); ?>>DF</option>
<option value="ES" <?php echo set_select('estado','ES'); ?>>ES</option>
<option value="GO" <?php echo set_select('estado','GO'); ?>>GO</option>
<option value="MA" <?php echo set_select('estado','MA'); ?> >MA</option>
<option value="MG" <?php echo set_select('estado','MG'); ?> >MG</option>
<option value="MS" <?php echo set_select('estado','MS'); ?> >MS</option>
<option value="MT" <?php echo set_select('estado','MT'); ?> >MT</option>
<option value="PA" <?php echo set_select('estado','PA'); ?>>PA</option>
<option value="PB" <?php echo set_select('estado','PB'); ?> >PB</option>
<option value="PE" <?php echo set_select('estado','PE'); ?>>PE</option>
<option value="PI" <?php echo set_select('estado','PI'); ?> >PI</option>
<option value="PR" <?php echo set_select('estado','PR'); ?> >PR</option>
<option value="RN" <?php echo set_select('estado','RN'); ?>>RN</option>
<option value="RO" <?php echo set_select('estado','RO'); ?> >RO</option>
<option value="RR" <?php echo set_select('estado','RR'); ?>>RR</option>
<option value="RS" <?php echo set_select('estado','RS'); ?>>RS</option>
<option value="SC" <?php echo set_select('estado','SC'); ?> >SC</option>
<option value="SE" <?php echo set_select('estado','SE'); ?>>SE</option>
<option value="SP" <?php echo set_select('estado','SP'); ?>>SP</option>
<option value="TO" <?php echo set_select('estado','TO'); ?>>TO</option>
</select>
    </td>
  </tr>
   <tr>
	  
    <td width="101"><font color="red">*</font>CEP:</td>
    <td width="361">
		<?php echo form_error('cep'); ?>
        <input name="cep" type="text" value="<?php echo set_value('cep'); ?>"  id="cep" size="10" />
        
    </td>
 
	  
    <td width="101">Email:</td>
    <td width="361">
		<?php echo form_error('email'); ?>
        <input name="email" type="text" value="<?php echo set_value('email'); ?>"  id="email"  />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101"><font color="red">*</font>Telefone:</td>
    <td width="361">
		<?php echo form_error('telcontato'); ?>
        <input name="telcontato" type="text" value="<?php echo set_value('telcontato'); ?>"  id="telcontato" size="10" />
        
    </td>
    
    <td><font color="red">*</font>SIAPE:</td>
    <td>
		<?php echo form_error('siape'); ?>
       <input name="siape" type="text" value="<?php echo set_value('siape'); ?>" id="siape" size="10" >
       
     </td>
  </tr>
   <tr>
	  
    <td width="101">Unidade:</td>
    <td width="361">
		<?php echo form_error('unidade'); ?>
        <input name="unidade" type="text" value="<?php echo set_value('unidade'); ?>" id="unidade"  />
        
    </td>

    <td width="101">Setor:</td>
    <td width="361">
		<?php echo form_error('setor'); ?>
        <input name="setor" type="text" value="<?php echo set_value('setor'); ?>"  id="setor"  />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">Fun&ccedil;&atilde;o:</td>
    <td width="361">
		<?php echo form_error('funcao'); ?>
        <input name="funcao" type="text" value="<?php echo set_value('funcao'); ?>"  id="funcao"  />
        
    </td>
 
	  
    <td width="101">Cargo:</td>
    <td width="361">
		<?php echo form_error('cargo'); ?>
        <input name="cargo" type="text" value="<?php echo set_value('cargo'); ?>"  id="cargo"  />
        
    </td>
  </tr>
     <tr>
	  
    <td width="101">Nome do Chefe:</td>
    <td width="361">
		<?php echo form_error('nomechefe'); ?>
        <input name="nomechefe" type="text" value="<?php echo set_value('nomechefe'); ?>"  id="nomechefe"  />
        
    </td>

	  
    <td width="101">Email do chefe:</td>
    <td width="361">
		<?php echo form_error('emailchefe'); ?>
        <input name="emailchefe" type="text" value="<?php echo set_value('emailchefe'); ?>" id="emailchefe"  />
        
    </td>
    
    
    <tr>
	  
    <td width="101"><font color="red">*</font>Telefone do chefe:</td>
    <td width="361">
		<?php echo form_error('telchefe'); ?>
        <input name="telchefe" type="text" value="<?php echo set_value('telchefe'); ?>"  id="telchefe" size="6" />
        
    </td>
     <td ><font color="red">*</font> Siape do Chefe: </td>
     <td> <?php echo form_error('siapechefe'); ?>
        <input name="siapechefe" type="text" value="<?php echo set_value('siapechefe'); ?>"  id="siapechefe" size="6" /></td>
  </tr>
   <tr>
	  
    <td width="101">Senha:</td>
    <td width="361">
		<?php echo form_error('senha'); ?>
        <input name="senha" type="password" value="<?php echo set_value('senha'); ?>"  id="senha" size="10" />
        
    </td>
     <td > Repita a senha: </td>
     <td> <?php echo form_error('repetesenha'); ?>
        <input name="repetesenha" type="password" value="<?php echo set_value('repetesenha'); ?>"  id="repetesenha" size="10" /></td>
  </tr>
  <tr>
	  <tr>
	  
    <td width="101">Lembrete de Senha:</td>
    <td width="361" colspan="2">
		<?php echo form_error('lembrasenha'); ?>
        <input name="lembrasenha" type="text" value="<?php echo set_value('lembrasenha'); ?>"  id="lembrasenha"  />
        
    </td>
     <td ><span><font color="red">*</font>Digite somente n&uacute;meros.</span> </td>
     <td>   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;  </td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="cadastrar" type="submit" class="input_bt" id="cadastrar" value="Cadastrar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_close();
$this->load->view('template/rodape');
?>

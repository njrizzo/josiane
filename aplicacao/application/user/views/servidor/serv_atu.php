<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
//$id = $this->uri->segment(3);
if ($codserv==NULL) redirect('home/index'); 
$query = $this ->serv_m->atualizar($codserv)->row();

echo validation_errors();
echo form_open("home/editar/$codserv");

//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            <?php	
            if($this->session->flashdata('editarok')):
echo'<p>'.$this->session->flashdata('editarok').'</p>';
endif
?>
            <h1 align="center" ><font color="#00009C">Alterar Dados Cadastrais</font>   </h1>

<table width="472" border="0" id="logon">
  <tr>
	
    <td width="101" >Nome:</td>
    <td width="361"colspan="3">
		<?php echo form_error('nomeserv'); ?>
        <input name="nomeserv" type="text" value="<?php echo set_value('nomeserv',$query->nomeserv); ?>"  id="nomeserv" />
        
    </td>
  </tr>
  <tr>
    <td>Sexo:</td>
    <?php echo form_error('sexo'); ?>
		
    <td>
		
		<input type="radio" name="sexo" value="masculino" <?= $query->sexo=='masculino'? set_radio('sexo', '$query->sexo',TRUE,$query->sexo):'';?> <?php echo set_radio('sexo', 'masculino'); ?> />Masculino
   <br>
<input type="radio" name="sexo" value="feminino" <?= $query->sexo=='feminino'?   set_radio('sexo', '$query->sexo',TRUE,$query->sexo):'';?> <?php echo set_radio('sexo', 'feminino'); ?> />Feminino

    
     </td>
 
    <td>Data de nascimento:</td>
    <td>
		<?php echo form_error('dltnasc'); ?>
      <input name="dltnasc" type="date" value="<?php echo set_value('dltnasc',$query->dltnasc); ?>"  id="dltnasc" />
      <br />
      
  </tr>
  <tr>
	 <td>*Identidade:  </td>
    <td>
		
		<?php echo form_error('rgl'); ?>
    <input name="rgl" type="text" value="<?php echo set_value('rgl',$query->rgl); ?>" id="rgl" size="10"/>
   
   </td>
 <td>*CPF:</td>
    <td>
		<?php echo form_error('cpfl'); ?>
      <input name="cpfl" type="text" value="<?php echo set_value('cpfl',$query->cpfl); ?>"  id="cpfl" size="10"/>
      </td>

     
  </tr>
  <tr>
    <td>Nacilonalidade:</td>
    <td>
		<?php echo form_error('nacilonalidade'); ?>
      <input name="nacilonalidade" type="text" value="<?php echo set_value('nacilonalidade',$query->nacilonalidade); ?>" id="nacilonalidade"  >
      </td>
 
    <td>Naturalidade:</td>
    <td>
		<?php echo form_error('naturalidade'); ?>
		 <input  name="naturalidade" type="text" value="<?php echo set_value('naturalidade',$query->naturalidade); ?>" id="naturalidade"  >
     </td>
  </tr>
   <tr>
    <td>Estado Civil:</td>
    <td>
		<?php echo form_error('estcivil'); ?>
		<select id="estcivil" name="estcivil">
	
	
    <option value="solteiro(a)" <?= $query->estcivil=='solteiro(a)'? 'selected':'';?> >Solteiro(a)</option>
      <option value="casado(a)" <?= $query->estcivil=='casado(a)'? 'selected':'';?>  >Casado(a)</option>
      <option value="divorciado(a)" <?= $query->estcivil=='divorciado(a)'? 'selected':'';?> >Divorciado(a)</option>
      <option value="vi&uacute;vo(a)" <?= $query->estcivil=='viúvo(a)'? 'selected':'';?> >Vi&uacute;vo(a)</option>
    </select>
     </td>
     <td  >Forma&ccedil;&atilde;o:</td>
   
 <td>
	 
	 <?php echo form_error('ensino'); ?>
             <select id="ensino" name="ensino">
				
             <option value="Ensino M&eacute;dio Completo" <?=  (strcasecmp(trim($query->ensino), 'Ensino Médio Completo')==0)? 'selected':'';?> >Ensino M&eacute;dio Completo</option>
             <option value="Ensino M&eacute;dio Incompleto" <?= (strcasecmp(trim($query->ensino), 'Ensino Médio Incompleto')==0)? 'selected':'';?> >Ensino M&eacute;dio Incompleto</option>
             <option value="Ensino Fundamental Incompleto" <?= (strcasecmp(trim($query->ensino), 'Ensino Fundamental Incompleto')==0)? 'selected':'';?> >Ensino Fundamental Incompleto</option>
             <option value="Ensino Fundamental completo" <?= (strcasecmp(trim($query->ensino), 'Ensino Fundamental completo')==0)? 'selected':'';?> >Ensino Fundamental completo</option>
             <option value="Ensino Superior Incompleto"<?= (strcasecmp(trim($query->ensino), 'Ensino Superior Incompleto')==0)? 'selected':'';?>>Ensino Superior Incompleto</option>
             <option value="Ensino Superior Completo" <?= (strcasecmp(trim($query->ensino), 'Ensino Superior Completo')==0)? 'selected':'';?> >Ensino Superior Completo</option>
             <option value="P&oacute;s-Gradua&ccedil;&atilde;o" <?= (strcasecmp(trim($query->ensino), 'Pós-Graduação')==0)? 'selected':'';?> >P&oacute;s-Gradua&ccedil;&atilde;o</option>
             <option value="Mestrado" <?= (strcasecmp(trim($query->ensino), 'Mestrado')==0)? 'selected':'';?> >Mestrado</option>
             <option value="Doutorado" <?= (strcasecmp(trim($query->ensino), 'Doutorado')==0)? 'selected':'';?> >Doutorado</option>
             </select>
             </td>
     
  </tr>
  <tr>
	  
    <td width="101">Endere&ccedil;o - Rua:</td>
    <td width="361">
		<?php echo form_error('endereco'); ?>
        <input name="endereco" type="text" value="<?php echo set_value('endereco',$query->endereco); ?>" id="endereco" />
        
    </td>
 
	  
    <td width="101">N&uacute;mero da casa:</td>
    <td width="361">
		<?php echo form_error('numcasa'); ?>
        <input name="numcasa" type="text" value="<?php echo set_value('numcasa',$query->numcasa); ?>" id="numcasa" size="5" />
        
    </td>
  </tr>
  <tr>
	  
    <td width="101">Bairro:</td>
    <td width="361">
		<?php echo form_error('bairro'); ?>
        <input name="bairro" type="text" value="<?php echo set_value('bairro',$query->bairro); ?>"  id="bairro" />
        
    </td>
  
	  
    <td width="101">Cidade:</td>
    <td width="361">
		<?php echo form_error('cidade'); ?>
        <input name="cidade" type="text" value="<?php echo set_value('cidade',$query->cidade); ?>"  id="cidade" />
        
    </td>
  </tr>
  <tr>
	  
    <td width="101">Complemento:</td>
    <td width="361">
		<?php echo form_error('complemento'); ?>
        <input name="complemento" type="text" value="<?php echo set_value('complemento',$query->complemento); ?>"  id="complemento" size="5"/>
        
    </td>
  
	  
    <td width="101">Estado:</td>
    <td width="361">
		<?php echo form_error('estado'); ?>
        <select name="estado">
						


<option value="RJ" <?= $query->estado=='RJ'? 'selected':'';?><?php echo set_select('estado','RJ'); ?> >RJ</option>
<option value="AC" <?= $query->estado=='AC'? 'selected':'';?><?php echo set_select('estado','AC'); ?>>AC</option>
<option value="AL" <?= $query->estado=='AL'? 'selected':'';?><?php echo set_select('estado','AL'); ?>>AL</option>
<option value="AM" <?= $query->estado=='AM'? 'selected':'';?><?php echo set_select('estado','AM');  ?>>AM</option>
<option value="AP" <?= $query->estado=='AP'? 'selected':'';?><?php echo set_select('estado','AP'); ?>>AP</option>
<option value="BA" <?= $query->estado=='BA'? 'selected':'';?><?php echo set_select('estado','BA'); ?>>BA</option>
<option value="CE" <?= $query->estado=='CE'? 'selected':'';?><?php echo set_select('estado','CE'); ?>>CE</option>
<option value="DF" <?= $query->estado=='DF'? 'selected':'';?><?php echo set_select('estado','DF'); ?>>DF</option>
<option value="ES" <?= $query->estado=='ES'? 'selected':'';?><?php echo set_select('estado','ES'); ?>>ES</option>
<option value="GO" <?= $query->estado=='GO'? 'selected':'';?><?php echo set_select('estado','GO'); ?>>GO</option>
<option value="MA" <?= $query->estado=='MA'? 'selected':'';?><?php echo set_select('estado','MA'); ?> >MA</option>
<option value="MG" <?= $query->estado=='MG'? 'selected':'';?><?php echo set_select('estado','MG'); ?> >MG</option>
<option value="MS" <?= $query->estado=='MS'? 'selected':'';?><?php echo set_select('estado','MS'); ?> >MS</option>
<option value="MT" <?= $query->estado=='MT'? 'selected':'';?><?php echo set_select('estado','MT'); ?> >MT</option>
<option value="PA" <?= $query->estado=='PA'? 'selected':'';?><?php echo set_select('estado','PA'); ?>>PA</option>
<option value="PB" <?= $query->estado=='PB'? 'selected':'';?><?php echo set_select('estado','PB'); ?> >PB</option>
<option value="PE" <?= $query->estado=='PE'? 'selected':'';?><?php echo set_select('estado','PE'); ?>>PE</option>
<option value="PI" <?= $query->estado=='PI'? 'selected':'';?><?php echo set_select('estado','PI'); ?> >PI</option>
<option value="PR" <?= $query->estado=='PR'? 'selected':'';?><?php echo set_select('estado','PR'); ?> >PR</option>
<option value="RN" <?= $query->estado=='RN'? 'selected':'';?><?php echo set_select('estado','RN'); ?>>RN</option>
<option value="RO" <?= $query->estado=='RO'? 'selected':'';?><?php echo set_select('estado','RO'); ?> >RO</option>
<option value="RR" <?= $query->estado=='RR'? 'selected':'';?><?php echo set_select('estado','RR'); ?>>RR</option>
<option value="RS" <?= $query->estado=='RS'? 'selected':'';?><?php echo set_select('estado','RS'); ?>>RS</option>
<option value="SC" <?= $query->estado=='SC'? 'selected':'';?><?php echo set_select('estado','SC'); ?> >SC</option>
<option value="SE" <?= $query->estado=='SE'? 'selected':'';?><?php echo set_select('estado','SE'); ?>>SE</option>
<option value="SP" <?= $query->estado=='SP'? 'selected':'';?><?php echo set_select('estado','SP'); ?>>SP</option>
<option value="TO" <?= $query->estado=='TO'? 'selected':'';?><?php echo set_select('estado','TO'); ?>>TO</option>
</select>
    </td>
  </tr>
   <tr>
	  
    <td width="101">CEP:</td>
    <td width="361">
		<?php echo form_error('cep'); ?>
        <input name="cep" type="text" value="<?php echo set_value('cep',$query->cep); ?>"  id="cep" size="10" />
        
    </td>
 
	  
    <td width="101">Email:</td>
    <td width="361">
		<?php echo form_error('email'); ?>
        <input name="email" type="text" value="<?php echo set_value('email',$query->email); ?>"  id="email"  />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">Telefone:</td>
    <td width="361">
		<?php echo form_error('telcontato'); ?>
        <input name="telcontato" type="text" value="<?php echo set_value('telcontato',$query->telcontato); ?>"  id="telcontato" size="10" />
        
    </td>
    <td><font color="red"></font>Telefone para Recado:</td>
    <td width="361">
        <input name="telcontato2" type="text" value="<?php echo set_value('telcontato2',$query->telcontato2); ?>"  id="telcontato2" size="10"   />
       </tr>
       
       <tr>
		<td width="101" height="25"  >Rede social:</td>
        <td  height="25">
		<input name="redesocial" type="text" value="<?php echo set_value('redesocial',$query->redesocial); ?>"  id="redesocial"   />
        </td>
    <td>*SIAPE:</td>
    <td>
		<?php echo form_error('siape'); ?>
       <input name="siape" type="text" value="<?php echo set_value('siape',$query->siape); ?>" id="siape" size="10" >
       
     </td>
  </tr>
   <tr>
	  
    <td width="101">Unidade:</td>
    <td width="361">
		<?php echo form_error('unidade'); ?>
        <input name="unidade" type="text" value="<?php echo set_value('unidade',$query->unidade); ?>" id="unidade"  />
        
    </td>

    <td width="101">Setor:</td>
    <td width="361">
		<?php echo form_error('setor'); ?>
        <input name="setor" type="text" value="<?php echo set_value('setor',$query->setor); ?>"  id="setor"  />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">Fun&ccedil;&atilde;o:</td>
    <td width="361">
		<?php echo form_error('funcao'); ?>
        <input name="funcao" type="text" value="<?php echo set_value('funcao',$query->funcao); ?>"  id="funcao"  />
        
    </td>
 
	  
    <td width="101">Cargo:</td>
    <td width="361">
		<?php echo form_error('cargo'); ?>
        <input name="cargo" type="text" value="<?php echo set_value('cargo',$query->cargo); ?>"  id="cargo"  />
        
    </td>
  </tr>
     <tr>
	  
    <td width="101">Nome do Chefe:</td>
    <td width="361">
		<?php echo form_error('nomechefe'); ?>
        <input name="nomechefe" type="text" value="<?php echo set_value('nomechefe',$query->nomechefe); ?>"  id="nomechefe"  />
        
    </td>

	  
    <td width="101">Email do chefe:</td>
    <td width="361">
		<?php echo form_error('emailchefe'); ?>
        <input name="emailchefe" type="text" value="<?php echo set_value('emailchefe',$query->emailchefe); ?>" id="emailchefe"  />
        
    </td>
    
    
    <tr>
	  
    <td width="101">Telefone do chefe:</td>
    <td width="361">
		<?php echo form_error('telchefe'); ?>
        <input name="telchefe" type="text" value="<?php echo set_value('telchefe',$query->telchefe); ?>"  id="telchefe" size="10" />
        
    </td>
   
    <td ><font color="red">*</font> Siape do Chefe: </td>
     <td> <?php echo form_error('siapechefe'); ?>
        <input name="siapechefe" type="text" value="<?php echo set_value('siapechefe',$query->siapechefe); ?>"  id="siapechefe" size="6" /></td>
       
  </tr>
   <tr>
	  
    <td width="101" >Lembrete de Senha:</td>
    <td width="361" >
		<?php echo form_error('lembrasenha'); ?>
        <input name="lembrasenha" type="text" value="<?php echo set_value('senha',$query->lembrasenha); ?>"  id="lembrasenha"  disabled/>
        
    </td>
     
     <td colspan="2"><span><font color="red">*</font>Digite somente n&uacute;meros.</span> </td>
     <td>   </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;  </td>
  </tr>
  <tr>
    <td>
       <td align="left"> <?php echo anchor("home/alterar_senha/$codserv","<input name='Alterar' type='button' class='input_bt' id='Alterar' value='Alterar Senha' />")?>
    </td>
    <td align="right"><input name="alterar" type="submit" class="input_bt" id="alterar" value="Alterar" /></td>
  </tr>
</table>

				
				</td>


           
          <?php
          echo form_hidden('$idserv',$query->codserv);
         echo form_close();
$this->load->view('template/rodape');
?>

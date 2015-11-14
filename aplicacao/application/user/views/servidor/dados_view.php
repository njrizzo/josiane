<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuser'); 
//$id = $this->uri->segment(3);
if ($codserv==NULL) redirect('servidor/index'); 
$query = $this ->serv_m->atualizar($codserv)->row();
//echo form_open("servidor/deletar/$id");
 // echo form_hidden('$idserv',$query->codserv);
//echo form_close();
?>
          <td>
			
            
            <h1 align="center" ><font color="#00009C">Dados Cadastrais </font>  </h1>

<table width="472" border="0" id="logon">
  <tr>
	
    <td width="101" >Nome:</td>
    <td colspan="3">
		
        <input name="nomeserv" type="text" value="<?php echo set_value('nomeserv',$query->nomeserv); ?>"  id="nomeserv" readonly />
        
    </td>
  </tr>
  <tr>
    <td>Sexo:</td>
    
		
    <td>
		
		<input type="radio" name="sexo" value="<?=$query->sexo ?>" <?php echo  set_radio('sexo', '$query->sexo',TRUE,$query->sexo); ?>readonly /><?=$query->sexo ?>
		<br>

    
     </td>
 
    <td>Data de nascimento:</td>
    <td>
		
      <input name="dltnasc" type="date" value="<?php echo set_value('dltnasc',$query->dltnasc); ?>"  id="dltnasc" readonly />
      <br />
      
  </tr>
  <tr>
	<td>Identidade:  </td>
    <td height="25">
	<input name="rgl" type="text" value="<?php echo set_value('rgl',$query->rgl); ?>" id="rgl" size="10" readonly />
	</td>
 <td>CPF:</td>
    <td>
	<input name="cpfl" type="text" value="<?php echo set_value('cpfl',$query->cpfl); ?>"  id="cpfl" size="10" readonly />
    </td>
  </tr>
  <tr>
    <td>Nacilonalidade:</td>
    <td height="25">
	<input name="nacilonalidade" type="text" value="<?php echo set_value('nacilonalidade',$query->nacilonalidade); ?>" id="nacilonalidade"  readonly>
    </td>
 
    <td>Naturalidade:</td>
    <td>
	<input  name="naturalidade" type="text" value="<?php echo set_value('naturalidade',$query->naturalidade); ?>" id="naturalidade"  readonly>
    </td>
  </tr>
  
   <tr>
    <td>Estado Civil:</td>
    <td height="25">
		<input  name="estcivil" type="text" value="<?php echo set_value('estcivil',$query->estcivil); ?>" id="estcivil"  readonly>
	</td>
     <td>Forma&ccedil;&atilde;o:</td>
    <td>
	<input  name="ensino" type="text" value="<?php echo set_value('ensino',$query->ensino); ?>" id="ensino"  readonly>
    </td>
     
  </tr>
  <tr>
	  
    <td width="101">Endere&ccedil;o - Rua:</td>
    <td height="25">
	<input name="endereco" type="text" value="<?php echo set_value('endereco',$query->endereco); ?>" id="endereco" readonly />
    </td>
 
	  
    <td width="101">N&uacute;mero da casa:</td>
    <td width="361">
	<input name="numcasa" type="text" value="<?php echo set_value('numcasa',$query->numcasa); ?>" id="numcasa" size="5" readonly />
    </td>
  </tr>
  
  <tr>
	  
    <td width="101">Bairro:</td>
    <td height="25">
	<input name="bairro" type="text" value="<?php echo set_value('bairro',$query->bairro); ?>"  id="bairro" readonly />
    </td>
  
	  
    <td width="101">Cidade:</td>
    <td width="361">
	<input name="cidade" type="text" value="<?php echo set_value('cidade',$query->cidade); ?>"  id="cidade" readonly />
    </td>
    
  </tr>
  <tr>
	  
    <td width="101">Complemento:</td>
    <td height="25">
	<input name="complemento" type="text" value="<?php echo set_value('complemento',$query->complemento); ?>"  id="complemento" size="5" readonly />
    </td>
  
	  
    <td width="101">Estado:</td>
    <td width="361">
		<input  name="estado" type="text" value="<?php echo set_value('estado',$query->estado); ?>" id="estado" size="5" readonly>
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">CEP:</td>
    <td height="25">
	<input name="cep" type="text" value="<?php echo set_value('cep',$query->cep); ?>"  id="cep" size="10" readonly />
    </td>
 
	  
    <td width="101">Email:</td>
    <td width="361">
		
        <input name="email" type="text" value="<?php echo set_value('email',$query->email); ?>"  id="email" readonly />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">Telefone:</td>
    <td height="25">
	<input name="telcontato" type="text" value="<?php echo set_value('telcontato',$query->telcontato); ?>"  id="telcontato" size="10" readonly />
    </td>
    <td><font color="red"></font>Telefone para Recado:</td>
    <td width="361">
        <input name="telcontato2" type="text" value="<?php echo set_value('telcontato2',$query->telcontato2); ?>"  id="telcontato2" size="10"  readonly />
       </tr>
       
       <tr>
		<td width="101" height="25"  >Rede social:</td>
        <td  height="25">
		<input name="redesocial" type="text" value="<?php echo set_value('redesocial',$query->redesocial); ?>"  id="redesocial"  readonly />
        </td>
    
    <td>SIAPE:</td>
    <td>
	<input name="siape" type="text" value="<?php echo set_value('siape',$query->siape); ?>" id="siape" size="10" readonly >
    </td>
    
  </tr>
   <tr>
	  
    <td width="101">Unidade:</td>
    <td  height="25">
	<input name="unidade" type="text" value="<?php echo set_value('unidade',$query->unidade); ?>" id="unidade" readonly />
    </td>

    <td width="101">Setor:</td>
    <td width="361">
	<input name="setor" type="text" value="<?php echo set_value('setor',$query->setor); ?>"  id="setor" readonly />
    </td>
    
  </tr>
   <tr>
	  
    <td width="101">Fun&ccedil;&atilde;o:</td>
    <td height="25">
		
        <input name="funcao" type="text" value="<?php echo set_value('funcao',$query->funcao); ?>"  id="funcao" readonly />
        
    </td>
 
	  
    <td width="101">Cargo:</td>
    <td width="361">
	<input name="cargo" type="text" value="<?php echo set_value('cargo',$query->cargo); ?>"  id="cargo" readonly />
    </td>
    
  </tr>
     <tr>
	  
    <td width="101">Nome do Chefe:</td>
    <td height="25">
	<input name="nomechefe" type="text" value="<?php echo set_value('nomechefe',$query->nomechefe); ?>"  id="nomechefe" readonly />
    </td>

	  
    <td width="101">Email do chefe:</td>
    <td width="361">
	<input name="emailchefe" type="text" value="<?php echo set_value('emailchefe',$query->emailchefe); ?>" id="emailchefe" readonly />
    </td>
    
    
    <tr>
	  
    <td width="101">Telefone do chefe:</td>
    <td  height="25">
	<input name="telchefe" type="text" value="<?php echo set_value('telchefe',$query->telchefe); ?>"  id="telchefe" size="10" readonly />
    </td>
    
      <td > Lembrete de Senha: </td>
     <td> <input  name="lembrasenha" type="text" value="<?php echo set_value('lembrasenha',$query->lembrasenha); ?>"  id="lembrasenha"  readonly  /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;  </td>
  </tr>
  <tr>
     <td>
       <td align="left"> <?php echo anchor("","<input name='Alterar' type='button' class='input_bt' id='Alterar' value='Alterar Senha' />")?>
    </td>
    <td align="right"><input name="Editar" type="submit" class="input_bt" id="Editar" value="Editar dados" /></td>
  </tr>
</table>

				
				</td>
           
          <?php
         echo form_hidden('$idserv',$query->codserv);
         echo form_close();
$this->load->view('template/rodape');
?>

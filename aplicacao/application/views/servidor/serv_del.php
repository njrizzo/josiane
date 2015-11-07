<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menuserv'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('servidor/index'); 
$query = $this ->serv_m->atualizar($id)->row();
echo form_open("servidor/deletar/$id");
  echo form_hidden('$idserv',$query->codserv);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" ><font color="#00009C">Excluir Cadastro Servidor</font>  </h1>

<table width="472" border="0" id="logon">
  <tr>
	
    <td width="101" >Nome:</td>
    <td width="361"colspan="3">
		
        <input name="nomeserv" type="text" value="<?php echo set_value('nomeserv',$query->nomeserv); ?>"  id="nomeserv" disabled />
        
    </td>
  </tr>
  <tr>
    <td>Sexo:</td>
    
		
    <td>
		
		<input type="radio" name="sexo" value="<?=$query->sexo ?>" <?php echo  set_radio('sexo', '$query->sexo',TRUE,$query->sexo); ?> disabled /><?=$query->sexo ?>
		<br>

    
     </td>
 
    <td>Data de nascimento:</td>
    <td>
		
      <input name="dltnasc" type="date" value="<?php echo set_value('dltnasc',$query->dltnasc); ?>"  id="dltnasc" disabled />
      <br />
      
  </tr>
  <tr>
	 <td>Identidade:  </td>
    <td>
		
		
    <input name="rgl" type="text" value="<?php echo set_value('rgl',$query->rgl); ?>" id="rgl" size="10" disabled />
   
   </td>
 <td>CPF:</td>
    <td>
	
      <input name="cpfl" type="text" value="<?php echo set_value('cpfl',$query->cpfl); ?>"  id="cpfl" size="10" disabled />
      </td>

     
  </tr>
  <tr>
    <td>Nacilonalidade:</td>
    <td>
		
      <input name="nacilonalidade" type="text" value="<?php echo set_value('nacilonalidade',$query->nacilonalidade); ?>" id="nacilonalidade"  disabled>
      </td>
 
    <td>Naturalidade:</td>
    <td>
		
		 <input  name="naturalidade" type="text" value="<?php echo set_value('naturalidade',$query->naturalidade); ?>" id="naturalidade"  disabled>
     </td>
  </tr>
   <tr>
    <td>Estado Civil:</td>
    <td>
		
		<select id="estcivil" name="estcivil" disabled>
	
	<option value="<?=$query->estcivil ?>" <?php echo set_select('estcivil','$query->estcivil',$query->estcivil); ?> disabled ><?=$query->estcivil ?></option>

    </select>
     </td>
     <td  >Forma&ccedil;&atilde;o:</td>
   
 <td>
	
             <select id="ensino" name="ensino" disabled>
				 <option value="<?=$query->ensino ?>" <?php echo set_select('ensino','<?=$query->ensino ?>'); ?>><?=$query->ensino ?></option>
             </select>
             </td>
     
  </tr>
  <tr>
	  
    <td width="101">Endere&ccedil;o - Rua:</td>
    <td width="361">
		
        <input name="endereco" type="text" value="<?php echo set_value('endereco',$query->endereco); ?>" id="endereco" disabled />
        
    </td>
 
	  
    <td width="101">N&uacute;mero da casa:</td>
    <td width="361">
		
        <input name="numcasa" type="text" value="<?php echo set_value('numcasa',$query->numcasa); ?>" id="numcasa" size="5" disabled />
        
    </td>
  </tr>
  <tr>
	  
    <td width="101">Bairro:</td>
    <td width="361">
		
        <input name="bairro" type="text" value="<?php echo set_value('bairro',$query->bairro); ?>"  id="bairro" disabled />
        
    </td>
  
	  
    <td width="101">Cidade:</td>
    <td width="361">
	
        <input name="cidade" type="text" value="<?php echo set_value('cidade',$query->cidade); ?>"  id="cidade" disabled />
        
    </td>
  </tr>
  <tr>
	  
    <td width="101">Complemento:</td>
    <td width="361">
		
        <input name="complemento" type="text" value="<?php echo set_value('complemento',$query->complemento); ?>"  id="complemento" size="5" disabled />
        
    </td>
  
	  
    <td width="101">Estado:</td>
    <td width="361">
		
        <select name="estado" disabled>
						
<option value="<?=$query->estado ?>" <?php echo set_select('estado','$query->estado',$query->estado); ?>  ><?=$query->estado ?></option>

</select>
    </td>
  </tr>
   <tr>
	  
    <td width="101">CEP:</td>
    <td width="361">
		
        <input name="cep" type="text" value="<?php echo set_value('cep',$query->cep); ?>"  id="cep" size="10" disabled />
        
    </td>
 
	  
    <td width="101">Email:</td>
    <td width="361">
		
        <input name="email" type="text" value="<?php echo set_value('email',$query->email); ?>"  id="email" disabled />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">Telefone:</td>
    <td width="361">
		
        <input name="telcontato" type="text" value="<?php echo set_value('telcontato',$query->telcontato); ?>"  id="telcontato" size="10" disabled />
        
    </td>
    
    <td>SIAPE:</td>
    <td>
		
       <input name="siape" type="text" value="<?php echo set_value('siape',$query->siape); ?>" id="siape" size="10" disabled >
       
     </td>
  </tr>
   <tr>
	  
    <td width="101">Unidade:</td>
    <td width="361">
		
        <input name="unidade" type="text" value="<?php echo set_value('unidade',$query->unidade); ?>" id="unidade" disabled  />
        
    </td>

    <td width="101">Setor:</td>
    <td width="361">
		
        <input name="setor" type="text" value="<?php echo set_value('setor',$query->setor); ?>"  id="setor" disabled />
        
    </td>
  </tr>
   <tr>
	  
    <td width="101">Fun&ccedil;&atilde;o:</td>
    <td width="361">
		
        <input name="funcao" type="text" value="<?php echo set_value('funcao',$query->funcao); ?>"  id="funcao" disabled />
        
    </td>
 
	  
    <td width="101">Cargo:</td>
    <td width="361">
		
        <input name="cargo" type="text" value="<?php echo set_value('cargo',$query->cargo); ?>"  id="cargo" disabled />
        
    </td>
  </tr>
     <tr>
	  
    <td width="101">Nome do Chefe:</td>
    <td width="361">
		
        <input name="nomechefe" type="text" value="<?php echo set_value('nomechefe',$query->nomechefe); ?>"  id="nomechefe" disabled />
        
    </td>

	  
    <td width="101">Email do chefe:</td>
    <td width="361">
		
        <input name="emailchefe" type="text" value="<?php echo set_value('emailchefe',$query->emailchefe); ?>" id="emailchefe" disabled />
        
    </td>
    
    
    <tr>
	  
    <td width="101">Telefone do chefe:</td>
    <td width="361">
		
        <input name="telchefe" type="text" value="<?php echo set_value('telchefe',$query->telchefe); ?>"  id="telchefe" size="10"disabled />
        
    </td>
     <td >  </td>
     <td> </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;  </td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="excluir" type="submit" class="input_bt" id="Excluir" value="Excluir"/></td>
  </tr>
</table>

				
				</td>
           
          <?php
         echo form_hidden('$idserv',$query->codserv);
         echo form_close();
$this->load->view('template/rodape');
?>

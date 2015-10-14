<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menucurso'); 
$id = $this->uri->segment(3);
if ($id==NULL) redirect('curso/index'); 
$query = $this ->curso_m->atualizar($id)->row();
echo form_open("curso/deletar/$id");
  echo form_hidden('$idcurso',$query->codcurso);
//echo form_close();
?>
            <td width="553" align="left" valign="top" bgcolor="#FFFFFF">
			
            
            <h1 align="center" >Deletar curso  </h1>

<table class="table table-striped" width="472" border="0" id="logon">
  <tr>
	  
    <td width="101">Nome:</td>
    <td width="361">
		
        <input name="nome" type="text" value="<?php echo set_value('nome',$query->nome); ?>" class="input_text" id="nome" disabled/>
        
    </td>
  </tr>
  <tr>
    <td>M&oacute;dulo:</td>
    <td>
		
      <input name="modulo" type="text" value="<?php echo set_value('modulo',$query->modulo); ?>" class="input_text" id="modulo" disabled/>
     </td>
  </tr>
  <tr>
    <td>Descri&ccedil;&atilde;o:</td>
    <td>
		
        <input type="text"  name="descricao" value="<?php echo set_value('descricao',$query->descricao); ?>" class="input_text" cols="45" rows="5" id="descricao" disabled />
      <br />
      
  </tr>
  <tr>
    <td>Carga hor&aacute;ria:</td>
    <td>
		
    <input type="text" name="cargahr" value="<?php echo set_value('cargahr',$query->cargahr); ?>"  id="cargahr" size="5" disabled/>
    <br />
   
  </tr>
  <tr>
    <td>&Aacute;rea tem&aacute;tica:</td>
    <td>
		
      <input name="areatema" type="text" value="<?php echo set_value('areatema',$query->areatema); ?>" class="input_text"  id="areatema" disabled />
      </td>
  </tr>
  <tr>
    <td>Compet&ecirc;ncia:</td>
    <td>
		
    <input type="text"  name="competencia" value="<?php echo set_value('competencia',$query->competencia); ?>"  class="input_text" id="competencia" cols="145" rows="145" disabled /><br />
     </td>
  </tr>
  <tr>
    <td>Estado:</td>
    <td>
		
    <input type="text" name="estado" id="estado" value="<?php echo set_value('estado',$query->estado); ?>"  />
       
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      
    </td>
    <td align="right"><input name="proximo" type="submit" class="input_bt" id="proximo" value="Deletar" /></td>
  </tr>
</table>

				
				</td>

           
          <?php
         echo form_hidden('$idcurso',$query->codcurso);
         echo form_close();
$this->load->view('template/rodape');
?>

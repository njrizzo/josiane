<?php
//$id = $this->uri->segment(3);
//if ($id==NULL) redirect('servidor/index'); 
//$query = $this ->serv_m->atualizar($id)->row();

echo validation_errors();
echo form_open("testeset");

//echo form_close();
?>
    
<table width="472" border="0" id="logon">
  
     <td  >Forma&ccedil;&atilde;o:</td>
   
 <td>
	 <?php echo form_error('ensino'); ?>
             <select id="ensino" name="ensino">
				
             <option value="Ensino M&eacute;dio Completo" <?=  strcasecmp('$query->ensino', 'Ensino M&eacute;dio Completo')? 'selected':'';?> >Ensino M&eacute;dio Completo</option>
             <option value="Ensino M&eacute;dio Incompleto" <?= strcasecmp('$query->ensino', 'Ensino M&eacute;dio Incompleto')? 'selected':'';?> >Ensino M&eacute;dio Incompleto</option>
             <option value="Ensino Fundamental Incompleto" <?= strcasecmp('$query->ensino', 'Ensino Fundamental Incompleto')? 'selected':'';?> >Ensino Fundamental Incompleto</option>
             <option value="Ensino Fundamental completo" <?= strcasecmp('$query->ensino', 'Ensino Fundamental completo')? 'selected':'';?> >Ensino Fundamental completo</option>
             <option value="Ensino Superior Incompleto"<?= strcasecmp('$query->ensino', 'Ensino Superior Incompleto')? 'selected':'';?>>Ensino Superior Incompleto</option>
             <option value="Ensino Superior Completo" <?= strcasecmp('$query->ensino', 'Ensino Superior Completo')? 'selected':'';?> >Ensino Superior Completo</option>
             <option value="P&oacute;s-Gradua&ccedil;&atilde;o" <?= strcasecmp('$query->ensino', 'P&oacute;s-Gradua&ccedil;&atilde;o')? 'selected':'';?> >P&oacute;s-Gradua&ccedil;&atilde;o</option>
             <option value="Mestrado" <?= strcasecmp('$query->ensino', 'Mestrado')? 'selected':'';?> >Mestrado</option>
             <option value="Doutorado" <?= strcasecmp('$query->ensino', 'Doutorado')? 'selected':'';?> >Doutorado</option>
             </select>
             </td>
     
  </tr>
  <?php 
 $query8=$this->serv_m->teste();
  
  echo $query8->ensino;

  If(strcasecmp('Ensino Superior Completo', 'Ensino Superior Completo')==0){
	  echo "string iguai,$query8->ensino";
	  }else{
		  echo "strings diferentes";
		  echo $query8->ensino;
		  };?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;  </td>
  </tr>
  <tr>
    <td>
      
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

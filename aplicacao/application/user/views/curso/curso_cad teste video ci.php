<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menucurso'); 
echo form_open('curso/cadastrar');

echo form_label('Nome do curso:');
echo form_input(array('name'=>'nome'),'','');
echo form_label('M&oacute;dulo:');
echo form_input(array('name'=>'modulo'),'','autofocus');
echo form_label('Descri&ccedil;&atilde;o:');
echo form_textarea(array('name'=>'descricao'),'','autofocus');
echo form_label('Carga hor&aacute;ria:');
echo form_input(array('name'=>'cargahr'),'','autofocus');
echo form_label('&Aacute;rea tem&aacute;tica:');
echo form_input(array('name'=>'areatema'),'','autofocus');
echo form_label('Compet&ecirc;ncia:');
echo form_textarea(array('name'=>'competencia'),'','autofocus');
echo form_label('Estado:');

$options = array(
        '0'         => '--selecione--',
        'ativo'         => 'ativo',
        'inativo'           => 'inativo',
        );
echo form_dropdown('estado', $options, '');
      
  
echo form_close();
?>
            
            <h1>Cadastrar novo curso   </h1>
            
         
          <?php
$this->load->view('template/rodape');
?>

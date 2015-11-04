<?php
$this->load->view('template/cabecalho');  
$this->load->view('template/menucurso'); 

$this->load->dbutil();
$query = $this->db->query("SELECT * FROM curso");
 $delimiter = ",";
$newline = "\r\n";
$enclosure = '"';

echo $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
$this->load->view('template/rodape');
?>

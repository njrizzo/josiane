
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Testematricula extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model("m_departamentos_produtos");
}

 
 public function index()
{
$this->load->model("m_departamentos_produtos");

$departamentos = $this->m_departamentos_produtos->retorna_departamentos();

$option = "<option value=''></option>";
foreach($departamentos -> result() as $linha) {
$option .= "<option value='$linha->codturma'>$linha->nometurma</option>"; 
}

$variaveis['options_departamentos'] = $option;

$this->load->view('matricula/matri_cad_teste', $variaveis);
}


 }

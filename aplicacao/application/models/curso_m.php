<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Curso_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }



        public function inserir($dados=NULL)
        {
		if($dados!=NULL):
		
		$this->db->insert('curso',$dados);
		$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
		redirect('curso/cadastrar');
		endif;
		//$sql = "INSERT INTO curso (nome, modulo, descricao, cargahr, areatema, competencia, estado ) VALUES (".$this->db->escape($nome).", ".$this->db->escape($modulo).", ".$this->db->escape($descricao).", ".$this->db->escape($cargahr).", ".$this->db->escape($areatema).", ".$this->db->escape($competencia).", ".$this->db->escape($estado).")";
//$this->db->query($sql);
echo $this->db->affected_rows();
		
		
		}

/*
   public function inserir()
        {
		
	$sql = "INSERT INTO curso (nome, modulo, descricao, cargahr, areatema, competencia, estado ) VALUES (".$this->db->escape($nome).", ".$this->db->escape($modulo).", ".$this->db->escape($descricao).", ".$this->db->escape($cargahr).", ".$this->db->escape($areatema).", ".$this->db->escape($competencia).", ".$this->db->escape($estado).")";
$this->db->query($sql);
echo $this->db->affected_rows();
$sql->result();
		
		
		}






	* 
	* 
	* 
	* 
	* 




public function selecionar()
{
	return $this->db->get('curso');
	
	
	}
	
*/

public function selecionar()
    {
       $this->db->order_by('codcurso', 'ASC');
        $query = $this->db->get('curso');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

	
public function atualizar($codcurso=NULL)
    {
      if($codcurso!=NULL):
      $this->db->where('codcurso',$codcurso);
      //$this->db->order_by('codcurso', 'ASC');
      $this->db->limit(1);
      // $data['testecurso'] = $this->db->get('curso');
      return   $this->db->get('curso');
      
      
     
      
      else:
      
      return FALSE;
     
      endif; 
    }



public function atualizar_do($dados=NULL,$condicao=NULL)
    {
      if($dados!=NULL && $condicao!=NULL):
		
		$this->db->update('curso',$dados,$condicao);
		
		 $this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		//redirect("curso/editar/$id");
		redirect(current_url());
		endif;
    }


public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('curso',$condicao);
		$this->session->set_flashdata('excluirok','Registro excluído com sucesso');
		
		redirect('curso/pesquisar');
		else:
		$this->session->set_flashdata('excluirfail','Registro tente excluir as dependncias');
		redirect('curso/listar');
		endif;
    }

	
			function contaRegistros()
{
 return $this->db->count_all_results('curso');
}
public function do_pesquisa($maximo, $inicio) {
  $match = $this->input->post('pesquisar');
  $this->db->order_by('codcurso', 'ASC');
  $this->db->or_like('nome',$match);
  $this->db->or_like('modulo',$match);
  $this->db->or_like('descricao',$match);
  $this->db->or_like('areatema',$match);
  $this->db->or_like('competencia',$match);
  $this->db->or_like('estado',$match);

   $query2 = $this->db->get('curso', $maximo,$inicio);
   if ($query2->num_rows() > 0)
        {
            return $query2->result();
        }
        else
        {
            return false;
        }
}
	
	
	
	
	
	
}//fimmodel




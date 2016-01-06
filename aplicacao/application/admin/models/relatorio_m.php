<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relatorio_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

public function r_matri_c() {
$this->db->select('*');
$this->db->from('matricula');
$this->db->join('turma', ' turma.codturma = matricula.codturma');
$this->db->join('servidor', ' servidor.codserv = matricula.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');

$this->db->order_by('curso.codcurso', 'asc');
$query2 = $this->db->get();
 
   if ($query2->num_rows() > 0)
        {
            return $query2->result();
        }
        else
        {
            return false;
        }
}
	
function r_aprovados_c()
    {
       
        $query = $this->db->query("select nome, modulo, nometurma, cargahr, datainicio, datafim, count(*)
from curso c, turma t, matricula i
where c.codcurso = t.codcurso and t.codturma = i.codturma and i.situacao = 'aprovado'
group by t.codturma, c.nome, t.nometurma, c.cargahr, t.datainicio, t.datafim, modulo
order by datafim asc");//ordenado pela data final das turmas
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
	



function r_inscritos_c()
    {
       
        $query = $this->db->query("select nome, modulo, nometurma, cargahr, datainicio, datafim, count(*)
from curso c, turma t, inscricao i
where c.codcurso = t.codcurso and t.codturma = i.codturma 
group by t.codturma, c.nome, t.nometurma, c.cargahr, t.datainicio, t.datafim, modulo
order by datafim asc");//ordenado pela data final das turmas
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }//endfuncao
	
function r_servidores_ch()
    {
       
        $query = $this->db->query("select nomeserv, siape, setor, funcao,  nomechefe, sum(cargahr), count(*)
from curso c, turma t, matricula i, servidor s
where c.codcurso = t.codcurso and t.codturma = i.codturma and s.codserv = i.codserv and situacao = 'aprovado'
group by nomeserv, s.codserv
order by nomeserv");//ordenado pela ordem alfabetica dos servidores
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }//endfuncao


}//endmodel




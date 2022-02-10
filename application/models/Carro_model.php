<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carro_model
 *
 * @author Gustavo
 */
class Carro_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('carro', $p); //carro é o nome da tabela no banco
    }
    
    function deletar($id) {
        $this->db->where('idCarro',$id);
        return $this->db->delete('carro');
    }
    
    function editar($idCarro){
        $this->db->where('idCarro',$idCarro);
        $result = $this->db->get('carro');
        return $result->result();
    }
    
    function atualizar($data) {
        $this->db->where('idCarro',$data['idCarro']);
        $this->db->set($data);
        return $this->db->update('carro');
    }

    /**
     * Este método retorna a lista de carros.
     * @return type
     */
    function listar() {
        $this->db->select('*');
        $this->db->from('carro');
        $this->db->order_by('marca', 'ASC');
        $this->db->order_by('modelo', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}

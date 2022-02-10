<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('user', $p); //'user' é o nome da tabela
    }

    function deletar($id) {
        $this->db->where('idusuario', $id);
        return $this->db->delete('user');
    }

    function editar($id) {
        $this->db->where('idusuario', $id);
        $result = $this->db->get('user');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('idusuario', $data['idusuario']);
        $this->db->set($data);
        return $this->db->update('user');
    }

    function listar() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('perfilAcesso','ASC');
        $this->db->order_by('nomeUsuario','ASC');
        $query = $this->db->get();
        return $query->result();
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carro
 *
 * @author Gustavo
 */
class Carro extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('estou_logado')) {
            redirect('Login');
        }
        $this->load->model('Carro_model', 'carro'); //carro este é um apelido para o model
        $this->load->model('Pessoa_model', 'pessoa'); //pessoa este é um apelido para o model
    }

    public function index() {
        $lista['carros'] = $this->carro->listar();
        $lista['pessoas'] = $this->pessoa->listar();
        $this->load->view('carroCadastro', $lista);
    }

    public function inserir() {
        //nome no vetor deve ser o mesmo nome do campo na tabela
        $dados['marca'] = $this->input->post('marca');
        $dados['modelo'] = $this->input->post('modelo');
        $dados['portas'] = $this->input->post('portas');
        $dados['cor'] = $this->input->post('cor');
        $dados['placa'] = $this->input->post('placa');
        $dados['idPessoa'] = $this->input->post('idPessoa');

        $result = $this->carro->inserir($dados);
        if ($result == true) {
            $this->session->set_flashdata('true', 'msg');
            redirect('carro');
        } else {
            $this->session->set_flashdata('err', 'msg');
            redirect('carro');
        }
    }

    public function excluir($id) {
        $result = $this->carro->deletar($id);
        if ($result == true) {
            $this->session->set_flashdata('true', 'msg');
            redirect('carro');
        } else {
            $this->session->set_flashdata('err', 'msg');
            redirect('carro');
        }
    }

    public function editar($idCarro) {
        $data['carro'] = $this->carro->editar($idCarro);
        $data['pessoas'] = $this->pessoa->listar();
        $this->load->view('carroEditar', $data);
    }

    public function atualizar() {
        //este é o lado do BD = Este é o lado da View
        $dados['idCarro'] = $this->input->post('idCarro');
        $dados['marca'] = $this->input->post('marca');
        $dados['modelo'] = $this->input->post('modelo');
        $dados['portas'] = $this->input->post('portas');
        $dados['cor'] = $this->input->post('cor');
        $dados['placa'] = $this->input->post('placa');
        $dados['idPessoa'] = $this->input->post('idPessoa');

        if ($this->carro->atualizar($dados) == true) {
            $this->session->set_flashdata('true', 'msg');
            redirect('carro');
        } else {
            $this->session->set_flashdata('err', 'msg');
            redirect('carro');
        }
    }

}

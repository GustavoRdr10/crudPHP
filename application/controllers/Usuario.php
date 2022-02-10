<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('estou_logado')) {
            redirect('Login');
        }elseif($this->session->userdata('logado')->perfilAcesso!='admin'){
            redirect('home');
        }
        $this->load->model('Usuario_model', 'user'); //Usuario_model é o nome do model e pessoa é uma alias(apelido)
    }

    public function index() {
        $lista['users'] = $this->user->listar();
        $this->load->view('usuarioCadastro', $lista);
    }

    public function inserir() {
        //nome dos dados no vetor devem ser os mesmos da tabela pessoa
        $dados['nomeUsuario'] = $this->input->post('nomeUsuario');
        $dados['user'] = $this->input->post('user');
        $dados['senha'] = md5(mb_convert_case($this->input->post('senha'),MB_CASE_LOWER));
        $dados['perfilAcesso'] = $this->input->post('perfilAcesso');
        //chamando o método inserir($) do model usuario
        $result = $this->user->inserir($dados);

        if ($result == true) {
            //redireciona para o controller user
            redirect('usuario');
        } else {
            redirect('usuario');
        }
    }

    public function editar($id) {
        $dados['user'] = $this->user->editar($id);
        $this->load->view('usuarioEditar', $dados);
    }

    public function atualizar() {
        //este é o lado do BD = este é o lado do Form
        //nome dos dados no vetor devem ser os mesmos da tabela pessoa
        $dados['idusuario'] = $this->input->post('idusuario');
        $dados['nomeUsuario'] = $this->input->post('nomeUsuario');
        $dados['user'] = $this->input->post('user');
        $dados['perfilAcesso'] = $this->input->post('perfilAcesso');

        if ($this->user->atualizar($dados) == true) {
            //falta implementar as msgs de notificações
            redirect('usuario');
        } else {
            redirect('usuario');
        }
    }

    public function excluir($id) {
        $result = $this->user->deletar($id);
        if ($result == true) {
            //redireciona para o controller usuario
            redirect('usuario');
        } else {
            redirect('usuario');
        }
    }

}

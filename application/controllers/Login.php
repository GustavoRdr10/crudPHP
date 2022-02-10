<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function autenticar() {
        $usuario = mb_convert_case($this->input->post('user'), MB_CASE_LOWER);
        $senha = md5(mb_convert_case($this->input->post('senha'), MB_CASE_LOWER));
        $this->db->where('user', $usuario);
        $this->db->where('senha', $senha);
        $usuario_logado = $this->db->get('user')->result();
        if (count($usuario_logado) == 1) {
            $this->db->where('user', $usuario);
            $usuario_logado1 = $this->db->get('user')->result();
            $dados['logado'] = $usuario_logado1[0];
            $dados['estou_logado'] = TRUE;
            $this->session->set_userdata($dados);
            redirect('Home');
        } else {
            $dados['logado'] = NULL;
            $dados['estou_logado'] = FALSE;
            $this->session->set_flashdata('erroLogin', 'msg');
            redirect('Login');
        }
    }

    public function sair() {
        $dados['logado'] = NULL;
        $dados['estou_logado'] = FALSE;
        $this->session->set_userdata($dados);
        redirect('Login');
    }

}

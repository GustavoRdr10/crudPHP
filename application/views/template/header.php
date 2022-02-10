<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

        <title>Projeto CI3 + BS4</title>
    </head>
    <body>
        <div class="container">
            <?php if ($this->session->userdata('estou_logado')) { ?>
             <br>
                <?php echo $this->session->userdata('logado')->nomeUsuario; ?> 
                 <br>                            
                <a class="btn btn-primary" href="<?php echo base_url(); ?>pessoa">Pessoa</a> 
                 <br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>carro">Carro</a>
                 <br>
                <a class="btn btn-primary" href="<?php echo base_url(); ?>usuario">Usuário</a>
                <br>  
                <a class="btn btn-danger" href="<?php echo base_url(); ?>login/sair">Sair</a>
            <?php } ?>
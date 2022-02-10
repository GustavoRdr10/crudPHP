<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="<?php echo base_url() . 'home'; ?>">Home</a>
        <h1>Cadastro de Usuário</h1>
        <?php echo form_open('usuario/inserir'); ?>
            <input type="text" required name="nomeUsuario" placeholder="Nome aqui..." />
            <br><br>
            <input type="text" required name="user" placeholder="User aqui..." />
            <br><br>
            <input type="password" required name="senha" minlength="6" placeholder="Senha aqui..." />
            <br><br>
            <input type="radio" required name="perfilAcesso" value="admin"/>Administrador 
            <input type="radio" required name="perfilAcesso" value="user" />Usuário
            <br><br>
            <input type="submit" value="Salvar"/>
            <input type="reset" value="Limpar"/>
        <?php echo form_close(); ?>
        <h2>Lista Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th><th>user</th><th>Perfil Acesso</th><th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->nomeUsuario; ?></td>
                        <td><?php echo $user->user; ?></td>
                        <td><?php echo $user->perfilAcesso; ?></td>
                        <td>
                            <a href="<?php echo base_url() . 
                                    'usuario/editar/' .
                                    $user->idusuario;?>">Editar</a> | 
                            <?php if($user->user != $this->session->userdata('logado')->user){ ?>        
                                <a href="<?php echo base_url() . 
                                        'usuario/excluir/' . 
                                        $user->idusuario; ?>">Deletar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>

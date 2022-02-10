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
        <a href="<?php echo base_url() . 'usuario'; ?>">Voltar</a>
        <h1>Editar Usuário</h1>
        <?php echo form_open('usuario/atualizar'); ?>
            <input type="hidden" required name="idusuario" value="<?php echo $user[0]->idusuario; ?>" />
            <input type="text" required name="nomeUsuario" value="<?php echo $user[0]->nomeUsuario; ?>" />
            <br><br>
            <input type="text" required name="user" value="<?php echo $user[0]->user; ?>" />
            <br><br>
            <input type="radio" required 
                <?php if($user[0]->perfilAcesso=='admin'){echo 'checked';} ?> name="perfilAcesso" value="admin"/>Administrador 
            <input type="radio" required 
                   <?php if($user[0]->perfilAcesso=='user'){echo 'checked';} ?> name="perfilAcesso" value="user" />Usuário
            <br><br>
            <input type="submit" value="Salvar"/>
        <?php echo form_close(); ?>
    </body>
</html>

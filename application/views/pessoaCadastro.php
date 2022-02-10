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
        <h1>Cadastro de Pessoa</h1>
        <?php echo form_open('pessoa/inserir'); ?>
            <input type="text" name="nome" required placeholder="Nome aqui..."/>
            <br><br>
            <input type="tel" name="telefone" required placeholder="Telefone aqui..."/>
            <br><br>
            <input type="email" name="email" required placeholder="E-mail aqui..."/>
            <br><br>
            <input type="text" name="endereco" required placeholder="Enderço aqui..."/>
            <br><br>
            <input type="radio" name="tpPessoa" required value="Fisica">Fisíca
            <input type="radio" name="tpPessoa" required value="Juridica">Jurídica
            <br><br>
            <input type="number" name="cpf" placeholder="CPF aqui..."/>
            <br><br>
            <input type="radio" name="sexo" value="F">Feminino
            <input type="radio" name="sexo" value="M">Masculino
            <br><br>
            <input type="number" name="cnpj" placeholder="CNPJ aqui..."/>
            <br><br>
            <input type="text" name="nomeFantasia" placeholder="Nome Fantasia aqui..."/>
            <br><br>
            <input type="submit" name="salvarPF" value="Salvar">
            <input type="reset" name="limpar" value="Limpar">
        <?php echo form_close(); ?>
        <h2>Lista de Pessoas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th><th>E-mail</th><th>Telefone</th><th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pes): ?>
                <tr>
                    <td><?php echo $pes->nome; ?></td>
                    <td><?php echo $pes->email; ?></td>
                    <td><?php echo $pes->telefone; ?></td>
                    <td>
                        <?php if(!is_null($pes->cpf)){
                            echo 'PF';
                        }else{
                            echo 'PJ';
                        } ?>
                        <a href="<?php echo base_url() . 
                                'pessoa/editar/' .
                                $pes->idPessoa;?>">Editar</a> | 
                        <a href="<?php echo base_url() . 
                                'pessoa/excluir/' .
                                $pes->idPessoa;?>">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>

<div class="row">
    <!--Responsivo para smartphone, tablet e PC-->
    <div class="col-xs-1 col-sm-1 col-lg-3"></div>
    <div class="col-xs-10 col-sm-10 col-lg-6">
        <h2>Login</h2>
        <?php echo form_open('login/autenticar'); ?>
        <div class="form-group">
            <label for="user">Usuário</label>
            <input class="form-control" type="text" id="user" name="user" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input class="form-control" type="password" id="senha" name="senha" required>
        </div>
        <input class="btn btn-success mb-2" type="submit" value="Logar"/>
        <input class="btn btn-secondary mb-2" type="reset" value="Limpar"/>
        <?php form_close(); ?>
        <p></p>
    </div>
    <div class="col-xs-1 col-sm-1 col-lg-3"></div>
</div>

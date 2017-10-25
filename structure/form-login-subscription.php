<section id="forms">
    <div class="contato">
        <div class="container">
            <div class="row">
                <div id="newsletter" class="container">
                    <div class="title">
                        <h2><a id="entrar" class="form-selected">Entrar</a></h2>
                        <h2><a id="cadastrar">Cadastrar</a></h2>
                    </div>
                    <div class="content">
                        <form id="entrarForm" method="POST" action="../code/user/user-login.php">
                            <div class="row half">
                                <input type="text" class="text" name="login" placeholder="Login"/>
                                <input type="password" class="text" name="senha" placeholder="Senha"/>
                            </div>
                            <div class="row">
                                <input type="submit" class="btn btn-custom btn-block" value="Entrar" class="submit">
                            </div>
                        </form>
                        <form id="cadastrarForm" class="invisivel" method="POST" action="../code/user/user-subscription.php">
                            <div class="row half">
                                <input type="text" class="text" name="email" placeholder="Email"/>
                                <input type="text" class="text" name="login" placeholder="Login"/>
                                <input type="password" class="text" name="senha" placeholder="Senha"/>
                            </div>
                            <div class="row">
                                <input type="submit" class="btn btn-custom btn-block" value="Cadastrar" class="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
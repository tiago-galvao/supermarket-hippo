<header>
    <div class="topo">
        <div class="container">
            <p>Conheça os <strong>melhores preços</strong> e economize!</p>
        </div>
    </div>
    <div class="header">
        <div class="menu">
            <section id="main">
                <nav id="nav">
                    <a class="nav-tog btn-close"></a>
                    <h4>Compre por departamento</h4>
                    <p>Xaaablau, insere ai qualquer coisa</p>
                    <p>Xaaablau, insere ai qualquer coisa</p>
                    <p>Xaaablau, insere ai qualquer coisa</p>
                    <p>Xaaablau, insere ai qualquer coisa</p>
                    <p>Xaaablau, insere ai qualquer coisa</p>
                    <p>Xaaablau, insere ai qualquer coisa</p>
                </nav>
                <section id="openText" class="content nav-tog btn-nav">
                    <a>Compre por departamento</a>
                </section>
                <section id="closeIcon" class="content nav-tog btn-nav invisivel">
                    <a>X</a>
                </section>

            </section>
        </div>
        <div id="call-to-action">
            <div class="content-button">
                <div class="buttons">
                    <?php
                        session_start();
                        if (!isset($_SESSION['login'])) {
                           echo "<a id=\"entrar\" href=\"#forms\" class=\"btn btn-yellow\" style=\"margin: 4px;left: 35em;position: relative;\">ENTRAR</a>";
                        }
                    ?>
                </div>
                <div class="buttons">
                    <?php
                    session_start();
                    if (isset($_SESSION['login'])) {
                        echo "<a id=\"configuracao\" href=\"/structure/config-user-not-admin.php\" class=\"btn btn-yellow\"  style=\"margin: 4px;left: 26em;position: relative;\">CONFIGURAÇÕES</a>";
                    }
                    ?>
                    <?php
                    session_start();
                    if (isset($_SESSION['login'])) {
                        echo "<a id=\"configuracao\" href=\"/code/user/user-logout.php\" class=\"btn btn-yellow\"  style=\"margin: 4px;left: 26em;position: relative;\">SAIR</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

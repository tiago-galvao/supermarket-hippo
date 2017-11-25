
<header class="header-navbar">

    <div class="container-fluid">
        <div class="header-navbar--logo">
            <span style="color: #d9534f; font-size: 18px;">Supermercado Hippo</span>
        </div>
        <div class="header-navbar--searchfor">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquise por.." aria-label="Search for...">
            </div>
        </div>
        <div class="header-navbar--itens">
            <p class="header-navbar--user"><?=  session_start(); echo $_SESSION['nomeUsuario']; ?></p>
            <form>
                <button type="submit" class="btn btn-danger" formaction="../code/user/user-logout.php">Sair</button>
            </form>
        </div>
    </div>

</header>
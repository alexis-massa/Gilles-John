<header>
    <nav>
        <img id="nav_logo" src="../../img/logo.png" alt="logo G&J">
        <h1 id="nav_name">Gilles & John</h1>
        <div class="nav-elements">
            <a class="active" href="accueil.php">Accueil</a>
            <div class="dropdown">
                <button class="dropbtn">Produits <i class="fas fa-sort-down"></i></button>
                <div class="dropdown-content">
                    <a id="drop_gilets" href="gilets.php">Gilets</a>
                    <a id="drop_access" href="accessoires.php">Accessoires</a>
                </div>
            </div>
            <a id="entreprise" href="entreprise.php">L'entreprise</a>
            <a id="contact" href="contact.php">Contact</a>
            <i id="basket_shop" class="fas fa-shopping-basket"></i>
            <i class="fas fa-search"></i>
            <i class="fas fa-user"></i>
            <img class="hidden hamburger" src="../../icons/hamburger.ico">
            <img class="hidden hamburger-drop" src="../../icons/hamburger-drop.ico">
        </div>
        
        <div id="container-shop-basket">
            <div class="card card-body">
                <label id="label-basket">panier</label>
                <hr>
                <div>
                    <!-- ICI tous les produits ajoutés -->
                </div>
                <hr>
                <span>Total: </span><span id="total-prix">0.00</span>
            </div>
        </div>
    </nav>
</header>
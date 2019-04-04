    <!--Normal navbar format for laptops and larger screens -->
<nav class="uk-navbar-container uk-margin uk-margin-remove-bottom" id="nav" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="index.php"><img src="images/logo.png"  width="150px" height="50px"></a>
    </div>
    <div class="uk-navbar-center">
        <div class="uk-navbar-item uk-width-large uk-visible@m">
            <form class="uk-search uk-search-navbar">
                <input type="submit" name="submit" uk-search-icon>
                <input class="uk-search-input" type="search" placeholder="Search...">
            </form>
        </div>
    </div>
    <!-- small version-->
    <div class="uk-hidden@m uk-width-expand">
        <div class="nav-overlay uk-navbar-right">
            <a class="uk-navbar-toggle uk-navbar-center" uk-icon="icon: search; ratio: 2" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
        </div>
        <div class="nav-overlay uk-navbar-left uk-flex-1" hidden>
            <div class="uk-navbar-item uk-width-expand">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
                </form>
            </div>
            <a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
        </div>
    </div>
</nav>
<!-- normal navbar for big screens-->
<nav class="uk-navbar-container uk-margin-remove-top uk-height-xsmall uk-visible@m" uk-navbar>    
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="#">Categories</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">Lorem</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-center">
            <ul class="uk-navbar-nav">
                <li><a href="about.php">About</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    <a href="#">Stores</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">Lorem</a></li>
                        </ul>
                    </div>
                </li>
                    <li><a href="#"></a></li>
            </ul>
        </div>
        <div class="uk-navbar-right">
        <ul class="uk-nav uk-navbar-nav">
            <?php 
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="user.php" uk-icon="icon: user">' . $_SESSION['user'] . '</a></li>
                    <li><a href="includes/logout.php" uk-icon="icon: sign-out">Log-out</a></li>';
                }else
                echo '<li><a href="register.php" uk-icon="icon: user">Register</a></li>
            <li><a href="login.php" uk-icon="icon: sign-in">Login</a></li>';
             ?>
            <li>
                <a href="#" uk-icon="icon: world">language</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Lore</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!---->
<!-- small navbar -->
<ul uk-accordion class="uk-hidden@m">
    <li>
        <a class="uk-accordion-title uk-width-small uk-align-center" href="#"><span uk-icon="icon: menu; ratio: 2"></span></a>
        <div class="uk-accordion-content">
            <ul class="uk-list uk-text-center">
                <li><a href="categories.php"><span uk-icon="icon: list"></span> Categories</a></li>
                <hr class="uk-divider-icon">
                <li><a href="about.php"><span uk-icon="icon: info"></span> About</a></li>
                <hr class="uk-divider-icon">
                <li><a href="#"><span uk-icon="icon: receiver"></span> Contact</a></li>
                <hr class="uk-divider-icon">
                <li><a href="#"><span uk-icon="icon: tag"></span> Stores</a></li>
                <hr class="uk-divider-icon">
                <li><a href="#"><span uk-icon="icon: user"></span> Register</a></li>
                <hr class="uk-divider-icon">
                <li><a href="login.php"><span uk-icon="sign-in"></span> Login</a></li>
                <hr class="uk-divider-icon">
            </ul>
        </div>
    </li>
</ul>

<!-- Created by Antonio Quintero © marzo 2019 -->
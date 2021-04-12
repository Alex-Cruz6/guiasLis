<header id="header">
    <hgroup>
        <img src="img/logo.png" id="logo" alt="logo"  >
        <h1 id="site-description">Responsive Design con CSS3 Media Queries</h1>
    </hgroup>
    <nav>
        <ul id="main-nav" class="clearfix">
            <?php
                $menuoptions = array("Home", "Quiénes somos", "Servicios", "Portafolio", "Blog", "Contacto");
                $listitems = "";
                foreach($menuoptions as $item):
                    $listitems .= "\t<li>\n\n<a href=\"javascript:void(0);\">$item</a>\n</li>\n";
                endforeach;
                echo $listitems;
            ?>
        </ul>
    </nav>
    <!--nav -->
    <form id="searchform" action="javascript:void(0);">
        <input id="s" placeholder="Search" type="search">
    </form>
</header>
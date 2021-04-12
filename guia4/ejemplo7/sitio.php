<?php
    require('header.inc.php');
?>
<body>
    <div id="pagewrap">
        <!--#header y #nav -->
        <?php
            require('nav.inc.php');
        ?>
        <!--/#header y #nav --><!--#content -->
        <?php
            require('content.php');
        ?>
        <!--/#content --> <!--#sidebar -->
        <?php
            require('sidebar.php');
        ?>
        <!--/#sidebar --><!--#footer -->
        <?php
            require('footer.inc.php');
        ?>
        <!--/#footer -->
    </div><!--/#pagewrap -->
</body>
</html>
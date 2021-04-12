<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php
    require('head.php');
?>
<body>
<!-- Header -->
<?php
    require('header.php');
?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <?php
                require('Content.php');
            ?>
            <!-- Sidebar -->
            <?php
                require('Sidebar.php');
            ?>
        </div>
    </div>
</div>
<!-- Footer -->
<!-- Global jQuery -->
<script type="text/javascript" src="assets/js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- Template JS -->
<script type="text/javascript" src="assets/js/main.js"></script>
<?php
    require('footer.php');
?>
</body>
</html>
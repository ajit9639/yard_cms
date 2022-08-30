<?php include_once('includes/header.php');
include_once('includes/check_login.php');
include_once('includes/db.php');
?>

<body class="theme-red">

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <?php // include_once('includes/sidebar.php'); ?>

   
    
    <select id="editable-select">
        <option>Alfa Romeo</option>
        <option>Audi</option>
        <option>BMW</option>
        <option>Citroen</option>
    </select>

</body>

<script src="https://rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<link href="https://rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">
<script>
    $('#editable-select').on('shown.editable-select', function(e) {}).editableSelect('filter');
</script>

    <?php include_once('includes/footer.php'); ?>
   
</body>

</html>
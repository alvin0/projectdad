<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?php print isset($title) ? $title : 'Home';?> | CDLN<" />
    <meta property="og:description"              content="<?php print isset($description) ? $description : 'Alvin Framework'?>" />
    <meta property="og:image"              content="View/home/style/BackgroupAlvin.jpg" />

    <title><?php print isset($title) ? $title : 'Home';?> | CDLN</title>
    <link rel="shortcut icon" href="View/home/style/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="View/home/style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="View/home/style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="View/home/style/css/clean-blog.min.css" rel="stylesheet">
    <link href="View/home/style/css/mycss.css" rel="stylesheet">

  </head>

  <body>
  <!-- Navigation -->
  <?php include 'View/home/layout/include/nav.php';?>

<!-- Content -->
  <?php print $this->block('content');?>
<!-- End Content -->

    <hr>

    <!-- Footer -->
  <?php include 'View/home/layout/include/footer.php';?>


    <!-- Bootstrap core JavaScript -->
    <script src="View/home/style/vendor/jquery/jquery.min.js"></script>
    <script src="View/home/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="View/home/style/js/clean-blog.min.js"></script>
    <script src="View/home/style/js/myscript.js"></script>
    <?php print $this->block('script');?>
  </body>

</html>

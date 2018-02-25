<!doctype html>
<html lang="en">
<head>
    <title> <?php print isset($title) ? $title : 'Admin';?> | Admin Alvin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="View/admin/styleadmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="View/admin/styleadmin/css/mycss.css">
    <link rel="stylesheet" href="View/admin/styleadmin/css/fontawesome.min.css">
    <link rel="stylesheet" href="View/admin/styleadmin/css/bsadmin.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>

<?php include 'View/admin/include/navhead.php';?>

<div class="d-flex">

<?php include 'View/admin/include/navsidebar.php';?>

    <div class="content p-4">

        <?php print $this->block('content');?>
        <!-- <h1 class="display-5 mb-4">Hello, world!</h1> -->

        <!-- <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
            ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
            condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.
            Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>

        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
            ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
            condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.
            Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p> -->
    </div>

</div>

<script src="View/admin/styleadmin/js/jquery.min.js"></script>
<script src="View/admin/styleadmin/js/popper.min.js"></script>
<script src="View/admin/styleadmin/js/bootstrap.min.js"></script>
<script src="View/admin/styleadmin/js/bsadmin.js"></script>
<script src="View/admin/styleadmin/js/myscript.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <?php print $this->block('script');?>

</body>
</html>

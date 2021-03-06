<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Trang Chủ</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Danh mục</a>
                <div class="dropdown-menu">
                  <?php

use Lazer\Classes\Database as DB;

$category_articles = DB::table('category_articles')->findAll();

foreach ($category_articles as $key => $item) {
    ?>
                  <a class="dropdown-item item-child-menu" href="?active=category&id=<?php echo $item->id ?>"><strong><?php echo $item->name ?></strong></a>
<?php
}

?>
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?active=soft">Phần Mềm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?active=about">Giới Thiệu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?active=contact">Góp ý</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?active=alvin">Tác giả</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


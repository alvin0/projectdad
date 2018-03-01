<?php $this->start();?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php

if ($this->compact('article')->image_index == 'null' || $this->compact('article')->image_index == null) {
    echo 'View/home/style/BackgroupAlvin.jpg';
} else {
    echo $this->compact('article')->image_index;
}
?>')">

  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1><?php echo $this->compact('article')->title; ?></h1>
          <span class="subheading"><?php echo Helper\Helper::shorten_string($this->compact('article')->snippet, 20) ?></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php echo nl2br($this->compact('article')->content); ?>
        <p>Thời gian tạo bài viết : <?php echo $this->compact('article')->created_at; ?> </p>
        </div>

    <?php include 'View/home/layout/include/menu_right.php';?>

      </div>
    </div>
  </article>
</div>
<?php $this->end('content');?>

<?php $this->extend('home/layout/home');?>

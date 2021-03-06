<?php $this->start();?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('View/home/style/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1><?php echo isset($this->compact('category_articles')->name) ? $this->compact('category_articles')->name : 'CDLN Blog' ?></h1>
          <span class="subheading"><?php echo isset($this->compact('category_articles')->name) ? $this->compact('category_articles')->name : 'chia sẽ thông tin công nghệ' ?></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">

  <div class="row">
    <!-- block 1 -->
    <div class="col-lg-8 col-md-10 mx-auto">
      <!-- content artisan -->
      <?php foreach ($this->compact('article') as $item) {?>
      <div class="post-preview">
        <a href="?active=articledetail&id=<?php echo $item->id; ?>">
          <h2 class="post-title">
            <?php echo $item->title ?>
          </h2>
          <h3 class="post-subtitle">
            <?php echo Helper\Helper::shorten_string($item->snippet, 20) ?>
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Admin</a>
          on <?php echo $item->created_at; ?> | View : <?php echo $item->view; ?> | Category : <?php echo $item->Category_articles->name; ?></p>
      </div>
      <hr>
      <?php }?>
      <!-- content artisan -->

      <!-- Pager -->
      <div class="clearfix">
      <?php if ($this->compact('page')['thisPage'] != $this->compact('page')['lastPage']) {?>
        <a class="btn btn-primary float-right" href="<?php echo isset($this->compact('category_articles')->name) ? '?active=category&id=' . $this->compact('category_articles')->id . '&' : '?' ?>page=<?php echo $this->compact('page')['nextPage'] ?>">Trang tiếp theo &rarr;</a>
      <?php }if ($this->compact('page')['thisPage'] > 1) {?>
        <a class="btn btn-primary float-left" href=""<?php echo isset($this->compact('category_articles')->name) ? '?active=category&id=' . $this->compact('category_articles')->id . '&' : '?' ?>page=<?php echo $this->compact('page')['currentPage'] ?>">&larr; Quay lại </a>

        <?php }?>
      </div>
    </div>
    <!-- end block 1 -->
    <?php include 'View/home/layout/include/menu_right.php';?>

  </div>

</div>
<?php $this->end('content');?>

<?php $this->extend('home/layout/home');?>

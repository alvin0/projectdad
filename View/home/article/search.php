<?php $this->start();?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('View/home/style/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Tìm kiếm</h1>
          <span class="subheading"><?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?></span>
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
      <?php
if (sizeof($this->compact('article')) == 0) {
    echo '<h2 class="post-title">Không tìm thấy kết quả nào, hãy thử tìm kiếm khác!</h2>';
}
foreach ($this->compact('article') as $item) {?>
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
        <a class="btn btn-primary float-right" href="?active=search&page=<?php echo $this->compact('page')['nextPage'] ?><?php echo isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '' ?>">Trang tiếp theo &rarr;</a>
      <?php }if ($this->compact('page')['thisPage'] > 1) {?>
        <a class="btn btn-primary float-left" href="?active=search&page=<?php echo $this->compact('page')['currentPage'] ?><?php echo isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : ' ' ?>">&larr; Quay lại </a>

        <?php }?>
      </div>
    </div>
    <!-- end block 1 -->
    <?php include 'View/home/layout/include/menu_right.php';?>

  </div>

</div>
<?php $this->end('content');?>

<?php $this->extend('home/layout/home');?>

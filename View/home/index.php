<?php $this->start();?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('View/home/style/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>CDLN Blog</h1>
          <span class="subheading">chia sẽ thông tin công nghệ</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">

  <div class="row">
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
          on <?php echo $item->created_at ?></p>
      </div>
      <hr>
      <?php }?>
      <!-- content artisan -->

      <!-- Pager -->
      <div class="clearfix">
        <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
      </div>
    </div>
  </div>

</div>
<?php $this->end('content');?>

<?php $this->extend('home/layout/home');?>

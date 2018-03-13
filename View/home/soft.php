<?php $this->start();?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('View/home/style/img/soft.png')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <div class="site-heading">
          <h1>Phần Mềm</h1>
          <span class="subheading">Cùng nhau chia sẽ những phần mềm hay.</span>
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
        <div class="col-lg-12 col-md-12 float-left">
          <div class="row">
            <?php foreach ($this->compact('arrayFile') as $file) {?>
              <div class="col-lg-3">
                <img class="rounded mx-auto d-block" src="<?php echo $file['image'] ?>" alt="<?php echo $file['name'] ?>" width="140" height="140">
                <p class="text-center">
                  <?php echo $file['name'] ?>
                  <a href="<?php echo $file['urldownload'] ?>">
                    <i class="fa fa-cloud-download" style="font-size:48px;color:blue"></i>
                  </a>
                </p>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </article>
</div>
<?php $this->end('content');?>

<?php $this->extend('home/layout/home');?>

<?php $this->start();?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php $this->end('head');?>
<?php $this->start();?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('View/home/style/img/contact-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Góp Ý</h1>
          <span class="subheading">Hãy cho chúng tôi biết ý kiến của các bạn về website của tôi.</span>
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
          <?php
if (isset($_GET['status'])) {
    ?>
          <div class="alert alert-<?php echo $_GET['status']; ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php
if ($_GET['status'] == 'success') {
        echo "<strong>Góp ý thành công!</strong> Cảm ơn những góp ý của bạn.";
    } else {
        echo "<strong>Có lỗi xảy ra!</strong> Hãy thử lại và điền đầy đủ thông tin.";
    }
    ?>
          </div>
<?php }?>

          <form action="?active=postContact" method="POST" name="sentMessage" id="contactForm" novalidate>
            <input type="hidden" name="_token" value="<?php echo _token; ?>" />
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Họ và tên của bạn" id="name" required data-validation-required-message="Hãy điền họ và tên.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Email của bạn" id="email" required data-validation-required-message="Hãy điền email.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" name="phone" placeholder="Số điện thoại của bạn" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="2" class="form-control" name="content" placeholder="Góp ý của bạn" id="message" required data-validation-required-message="Please enter a message."  maxlength="255"></textarea>
                <p class="help-block text-danger"></p>
                <p>*Giới hạn 255 ký tự</p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="g-recaptcha" data-sitekey="6LfgSUoUAAAAAPZrV7IF_waDCFsqOixheaNoms3L"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </article>
</div>
<?php $this->end('content');?>

<?php $this->extend('home/layout/home');?>

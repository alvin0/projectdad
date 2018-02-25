<?php $this->start();?>
<h1 class="display-5 mb-4">Create Article ( bài viết mới )</h1>
<hr>
<form action="index.php?group=admin&active=postcreatearticle" method="POST" enctype=”multipart/form-data”>

	<div class="form-group row">
	  <label for="example-text-input" class="col-2 col-form-label">Title ( Tiêu Đề )</label>
	  <div class="col-10">
	    <input class="form-control" type="text" name="title" id="example-text-input" placeholder="Title (Tiêu Đề)">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-email-input" class="col-2 col-form-label">Email</label>
	  <div class="col-10">
	    <input class="form-control" type="email" name="email" id="example-email-input">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-url-input" class="col-2 col-form-label">URL</label>
	  <div class="col-10">
	    <input class="form-control" type="url" name="url" id="example-url-input">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
	  <div class="col-10">
	    <input class="form-control" type="tel" name="tel" id="example-tel-input">
	  </div>
	</div>

	<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit (Gửi)</button>
      </div>
    </div>

</form>
<?php $this->end('content');?>

<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>
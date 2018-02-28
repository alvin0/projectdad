<?php $this->start();?>

<h1 class="display-5 mb-4"> <?php echo $this->compact('category_articles') ? 'Update Category Article ( cập nhật danh mục bài viết ) : ' . $this->compact('category_articles')->name : 'Create Category Article ( Tạo danh mục bài viết mới )' ?> </h1>
<hr>
<form action="index.php?group=admin&active=postcategoryarticlenew<?php echo $this->compact('category_articles') ? '&id=' . $this->compact('category_articles')->id : '' ?>" method="POST" enctype="multipart/form-data">

<input type="hidden" name="_token" value="<?php echo _token; ?>" />

	<div class="form-group row">
	  <label for="example-text-input" class="col-2 col-form-label">Name (Tên Danh mục)</label>
	  <div class="col-10">
	    <input class="form-control" type="text" name="name" id="example-text-input " value="<?php echo isset($this->compact('category_articles')->name) ? $this->compact('category_articles')->name : '' ?>" placeholder="Name (Tên Danh mục)">
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
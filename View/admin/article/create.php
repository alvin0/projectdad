<?php $this->start();?>

<h1 class="display-5 mb-4"> <?php echo $this->compact('article') ? 'Update Article ( cập nhật bài viết ) : ' . $this->compact('article')->title : 'Create Article ( bài viết mới )' ?> </h1>
<hr>
<form action="index.php?group=admin&active=postcreatearticle<?php echo $this->compact('article') ? '&id=' . $this->compact('article')->id : '' ?>" method="POST" enctype="multipart/form-data">

<input type="hidden" name="_token" value="<?php echo _token; ?>" />

	<div class="form-group row">
	  <label for="example-text-input" class="col-2 col-form-label">Category ( Danh mục bài viết )</label>
	  <div class="col-10">
	  	<div class="select2-wrapper">
		    <select name="category_article_id" class="form-control select2-single select" id="dropdown" >
				<?php foreach ($this->compact('category_articles') as $category) {
    ?>
					<option value="<?php echo $category->id ?>" <?php if (isset($this->compact('article')->category_article_id)) {echo $category->id == $this->compact('article')->category_article_id ? "selected" : '';}?>><?php echo $category->name ?></option>
				<?php
}
?>
			</select>
		</div>
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-text-input" class="col-2 col-form-label">Title ( Tiêu đề )</label>
	  <div class="col-10">
	    <input class="form-control" type="text" name="title" id="example-text-input " value="<?php echo isset($this->compact('article')->title) ? $this->compact('article')->title : '' ?>" placeholder="Title (Tiêu Đề)">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-email-input" class="col-2 col-form-label">Image ( Ảnh )</label>
	  <div class="col-10">
		 <label class="custom-file" id="customFile">
	        <input type="file" class="custom-file-inputs" name="image_index" id="exampleInputFile image_index" accept="image/x-png,image/gif,image/jpeg">
	        <p>This image will be displayed outside the home page (Hình ảnh này sẽ hiển thị ngoài trang chủ). </p>
	    </label>
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-email-input" class="col-2 col-form-label">Image preview (Ảnh xem trước)</label>
	  <div class="col-10">
		 <img src="<?php echo isset($this->compact('article')->image_index) ? $this->compact('article')->image_index : '/View/admin/styleadmin/noimage.jpg' ?>" id="imagepreview" style="max-width: 200px" class="rounded float-left" alt="...">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="snippet" class="col-2 col-form-label">Snippet ( Nội Dung Rút gọn )</label>
	  <div class="col-10">
	  	    <textarea class="form-control" name="snippet" id="snippet" rows="3" placeholder="Shortened content will be displayed outside the home page. ( Nội dung rút gọn sẽ được hiển thị ngoài trang chủ )."><?php echo isset($this->compact('article')->snippet) ? $this->compact('article')->snippet : '' ?></textarea>
	    <p class="font-italic"> *Ghi ít ít thôi cho trang chủ nó đẹp.</p>
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-tel-input" class="col-2 col-form-label">Content ( Nội dung chi tiết )</label>
	  <div class="col-10">
	    <textarea name="content" id="content" class="content"><?php echo isset($this->compact('article')->content) ? $this->compact('article')->content : '' ?></textarea>
	    <p class="font-italic"> *When you enter it automatic expand ( Khi bạn nhập liệu nó sẽ tự động mở rộng ).</p>
	    <p class="font-italic"> ** Chèn hình ảnh vào bài viết (icon gần icon "?" trên thanh công cụ nhập liệu) : <br>
	     	<p>Nếu dùng ảnh trên mạng thì chỉ cần copy link ảnh vào là nó tự nhận</p>
	     	<p>Có thể dùng ảnh tự upload lên</p>
	     </p>

	  </div>
	</div>
	<div class="form-group row">
	  <label for="example-tel-input" class="col-2 col-form-label"></label>
	  	<div class="col-10">
    		<input type="checkbox" name="show_boolen" id="ShowHome" <?php echo !isset($this->compact('article')->show_boolen) ? '' : $this->compact('article')->show_boolen == 1 ? "checked" : '' ?>>
    		<label class="form-check-label" for="ShowHome">Show on home (Cho Phép hiển thị trên trang chủ)</label>
   		</div>
  	</div>

	<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit (Gửi)</button>
      </div>
    </div>

</form>
<?php $this->end('content');?>

<?php $this->start();?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="View/admin/styleadmin/js/ckeditor/ckeditor.js"/></script>
<script>

$(document).ready(function() {
    $('.select2-single').select2();
});

$('.custom-file-inputs').on('change',function(){
    var fileName = $(this).val();
    readURL(this);
    $('form-control custom-file-input').attr('type','text').val(fileName);
})

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#imagepreview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

CKEDITOR.replace( 'content' );
</script>
<?php $this->end('script');?>

<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>
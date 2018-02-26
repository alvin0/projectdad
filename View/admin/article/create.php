<?php $this->start();?>

<h1 class="display-5 mb-4"> <?php echo $this->compact('article') ? 'Update Article ' . $this->compact('article')->title . '( cập nhật bài viết )' : 'Create Article ( bài viết mới )' ?> </h1>
<hr>
<form action="index.php?group=admin&active=postcreatearticle" method="POST" enctype="multipart/form-data">

<input type="hidden" name="_token" value="<?php echo _token; ?>" />

	<div class="form-group row">
	  <label for="example-text-input" class="col-2 col-form-label">Title ( Tiêu Đề )</label>
	  <div class="col-10">
	    <input class="form-control" type="text" name="title" id="example-text-input " placeholder="Title (Tiêu Đề)">
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
		 <img src="/View/admin/styleadmin/noimage.jpg" id="imagepreview" style="max-width: 200px" class="rounded float-left" alt="...">
	  </div>
	</div>

	<div class="form-group row">
	  <label for="snippet" class="col-2 col-form-label">Snippet ( Nội Dung Rút gọn )</label>
	  <div class="col-10">
	  	    <textarea class="form-control" name="snippet" id="snippet" rows="3" placeholder="Shortened content will be displayed outside the home page. ( Nội dung rút gọn sẽ được hiển thị ngoài trang chủ )."></textarea>
	    <p class="font-italic"> *Ghi ít ít thôi cho trang chủ nó đẹp.</p>
	  </div>
	</div>

	<div class="form-group row">
	  <label for="example-tel-input" class="col-2 col-form-label">Content ( Nội dung chi tiết )</label>
	  <div class="col-10">
	    <textarea name="content" id="content"></textarea>
	    <p class="font-italic"> *When you enter it automatic expand ( Khi bạn nhập liệu nó sẽ tự động mở rộng ).</p>
	    <p class="font-italic"> ** dùng thẻ img để chèn hình online vào bài viết : <br>
	    Exemple : <code> &lt;img src=" link image online "/&gt; </code></p>
	    <p>Nếu dùng ảnh đã tải lên từ trước bằng file manger thì ghi link theo dạng /storage/(đường dẫn file)</p>
	    Exemple : <code> &lt;img src="storage/thumucneuco/hinhanhvidu.jpg"/&gt; </code></p>

	  </div>
	</div>
	<div class="form-group row">
	  <label for="example-tel-input" class="col-2 col-form-label"></label>
	  	<div class="col-10">
    		<input type="checkbox" name="show_boolen" id="ShowHome">
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
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>

<script>
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


ClassicEditor
    .create( document.querySelector( '#content') )
    .catch( error => {
        console.error( error );
    } );
</script>
<?php $this->end('script');?>

<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>
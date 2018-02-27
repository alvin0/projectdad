<?php $this->start();?>
<h1 class="display-5 mb-4">List Article ( Danh sách bài viết )</h1>
<a href="?group=admin&active=articlenew"><h2 class="display-5 mb-4"><i class="fa fa-plus-square" style="font-size:48px;color:red"></i> Create ( Tạo mới )</h2></a>
<hr>
<table class="table listDatatable table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id (Mã)</th>
            <th>Title</th>
            <th>Total Article</th>
            <th>Tool</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id (Mã)</th>
            <th>Title</th>
            <th>Total Article</th>
            <th>Tool</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($this->compact('article') as $item) {?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $item->id; ?></td>
            <td data-toggle="tooltip" data-placement="bottom" title="<?php echo $item->title; ?>"><?php echo Helper\Helper::shorten_string($item->title, 10); ?></td>
            <td><a href="?group=admin&active=articleupdate&id=<?php echo $item->id ?>">Update</a> | <a data-target="#myModal" data-toggle="modal" data-id="<?php echo $item->id ?>" data-name="<?php echo $item->title ?>" class="MainNavText idDelete" id="MainNavHelp"
       href="#myModal">Delete</a></td>
        </tr>
        <?php }?>
    </tbody>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa danh muc</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa bài viết : <span class="title"></span> không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="?group=admin&active=postdelete" method="POST">
            <input type="hidden" name="_token" value="<?php echo _token; ?>" />
            <input type="hidden" name="idArticleDelete" id="idArticleDelete" value=""/>
            <button type="submit" class="btn btn-primary">Ok</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->end('content');?>

<?php $this->start()?>
<script>
$( ".idDelete" ).click(function() {
  var id = $(this).data('id');
  var title = $(this).data('name');
  $('.title').text(title);
  $("#idArticleDelete").val(id);
});
</script>
<?php $this->end('script')?>
<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>

<?php $this->start();?>
<h1 class="display-5 mb-4">List Contact ( Danh sách góp ý )</h1>
<hr>
<table class="table listDatatable table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Content(nội dung)</th>
            <th>Created at (Ngày gửi)</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Content(nội dung)</th>
            <th>Created at (Ngày gửi)</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($this->compact('contacts') as $item) {?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $item->name; ?></td>
            <td><?php echo $item->email; ?></td>
            <td><?php echo $item->phone; ?></td>
            <td data-toggle="tooltip" data-placement="bottom" title="<?php echo $item->content; ?>"><?php echo Helper\Helper::shorten_string($item->content, 20); ?></td>
            <td><?php echo $item->created_at; ?></td>
        </tr>
        <?php }?>
    </tbody>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Bạn có muốn xóa bài viết : <span class="title"></span> không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="?group=admin&active=postarticledelete" method="POST">
            <input type="hidden" name="_token" value="<?php echo _token; ?>" />
            <input type="hidden" name="idArticleDelete" id="idArticleDelete" value=""/>
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->end('content');?>

<?php $this->start()?>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$( ".idDelete" ).click(function() {
  var id = $(this).data('id');
  var title = $(this).data('name');
  $('.title').text(title);
  $("#idArticleDelete").val(id);
});
$(document).ready(function() {
    $('.listDatatable').DataTable({
      "order": [[ 0, 'desc' ]]
    });
} );
</script>
<?php $this->end('script')?>

<?php $this->start()?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<?php $this->end('head')?>


<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>

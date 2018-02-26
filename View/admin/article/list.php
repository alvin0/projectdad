<?php $this->start();?>
<h1 class="display-5 mb-4">List Article ( Danh sách bài viết )</h1>
<a href="?group=admin&active=articlenew"><h2 class="display-5 mb-4"><i class="fa fa-plus-square" style="font-size:48px;color:red"></i> Create ( Tạo mới )</h2></a>
<hr>
<table class="table listDatatable table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id (Mã)</th>
            <th>Title</th>
            <th>Category (Danh mục)</th>
            <th>Show on home</th>
            <th>Created at (Ngày tạo)</th>
            <th>View</th>
            <th>Tool</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id (Mã)</th>
            <th>Title</th>
            <th>Category (Danh mục)</th>
            <th>Show on home</th>
            <th>Created at (Ngày tạo)</th>
            <th>View</th>
            <th>Tool</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($this->compact('article') as $item) {?>
        <tr>
            <td><?php echo $item->id; ?></td>
            <td><?php echo $item->title; ?></td>
            <td><?php echo $item->category_article_id; ?></td>
            <td><?php echo $item->show_boolen == 0 ? "hide" : 'show'; ?></td>
            <td><?php echo $item->created_at; ?></td>
            <td><?php echo $item->view; ?></td>
            <td><a href="?group=admin&active=articleupdate&id=<?php echo $item->id ?>">Update</a> | Delete</td>
        </tr>
        <?php }?>
    </tbody>
</table>

<?php $this->end('content');?>


<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>

<div class="col-lg-4 col-md-12 mx-auto">

  <div class="list-group">
    <form action="index.php" method="GET" class="form-inline">
        <div class="form-group floating-label-form-group mb-2">
          <input type="hidden" name="active" value="search">
          <input type="text" class="form-control" name="keyword" value="" placeholder="Tìm tên bài viết">
        </div>
          <button type="submit" class="btn btn-link" id="sendMessageButton"><i class="fa fa-search"></i></button>
    </form>
  </div>

  <div class="list-group">
    <a href="#" class="list-group-item active center">Bài được xem nhiều</a>
    <?php
use Lazer\Classes\Database as DB;

$articlehotlist = DB::table('article')->orderBy('view', 'desc')->where('show_boolen', '=', 1)->limit(5)->findAll();

foreach ($articlehotlist as $articlehot) {?>
    <a href="?active=articledetail&id=<?php echo $articlehot->id; ?>" class="list-group-item" data-toggle="tooltip" data-placement="right" title="<?php echo $articlehot->title; ?>"> <?php echo Helper\Helper::shorten_string($articlehot->title, 5); ?> </a>
    <?php }?>
  </div>
</div>
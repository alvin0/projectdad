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
<hr>
  <div class="list-group">
    <a href="#" class="list-group-item active center">Bài được xem nhiều</a>
    <?php
use Lazer\Classes\Database as DB;

$articlehotlist = DB::table('article')->orderBy('view', 'desc')->where('show_boolen', '=', 1)->limit(5)->findAll();

foreach ($articlehotlist as $articlehot) {?>
    <a href="?active=articledetail&id=<?php echo $articlehot->id; ?>" class="list-group-item" data-toggle="tooltip" data-placement="right" title="<?php echo $articlehot->title; ?>"> <?php echo Helper\Helper::shorten_string($articlehot->title, 5); ?> </a>
    <?php }?>
  </div>
<hr>
  <div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Tin tức mới dantri.com.vn
          </button>
        </h5>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          <?php
$dantriContent = file_get_contents('http://dantri.com.vn/trangchu.rss');
$dantrixml     = xml2array($dantriContent);
$dantriItems   = $dantrixml['rss']['channel']['item'];
$dantriItems   = array_slice($dantriItems, 0, 7);
foreach ($dantriItems as $dantri) {
    ?>
            <div class="media">
              <?php echo $dantri['description']['value']; ?>
              <div class="media-body">
                <h6>
                  <a href="<?php echo $dantri['link']['value'] ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $dantri['title']['value']; ?>">
                  <?php echo Helper\Helper::shorten_string($dantri['title']['value'], 10) ?>
                  </a>
                </h6>
              </div>
            </div>
            <hr>
            <?php }?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
             Tin tức mới vnexpress.net
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          <?php
$homepage = file_get_contents('https://vnexpress.net/rss/tin-moi-nhat.rss');
$xml      = xml2array($homepage);
$items    = $xml['rss']['channel']['item'];
$items    = array_slice($items, 0, 6);
foreach ($items as $item) {
    ?>
            <div class="media">
              <?php echo getImageDescriptionVnexpress($item['description']['value']); ?>
              <div class="media-body">
                <h6>
                  <a href="<?php echo $item['link']['value'] ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $item['title']['value']; ?>">
                  <?php echo Helper\Helper::shorten_string($item['title']['value'], 10) ?>
                  </a>
                </h6>
              </div>
            </div>
            <hr>
            <?php }?>
        </div>
      </div>
    </div>
</div>
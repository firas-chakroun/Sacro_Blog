<?php include "header.php"; ?>
<?php
if (isset($_GET["tagname"])) {
  $name = $_GET["tagname"];
}
?>
<!-- End Site Header -->
<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Tags</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- End Nav Backed Header -->
<!-- Start Page Header -->
<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>
          <?php echo $name; ?>
        </h1>
      </div>
    </div>
  </div>
</div>
<!-- End Page Header -->
<!-- Start Content -->
<div class="main" role="main">
  <div id="content" class="content full">
    <div class="container">
      <div class="row">
        <div class="col-md-9 posts-archive">
          <?php
              if (!isset($_GET["page"])) {
                $_GET["page"] = 1;
              }
              $tbl_name = "news";
              $adjacents = 3;
              $get_news = ORM::for_table("$tbl_name")->find_array();
              $total_pages = count($get_news);
              $targetpage = "news-updates.php";
              $limit = 5;
              $page = $_GET['page'];
              if ($page)
                $start = ($page - 1) * $limit;
              else
                $start = 0;
              $news = ORM::for_table("news")->limit($limit)
                ->offset($start)
                ->order_by_desc('news.id')
                ->find_array();
              ?>
          <?php foreach ($news as $row): ?>
          <?php if (strpos($row["tags"], $name) !== false) { ?>
          <?php
                if ($page == 0)
                  $page = 1;
                $prev = $page - 1;
                $next = $page + 1;
                $lastpage = ceil($total_pages / $limit);
                $lpm1 = $lastpage - 1;
            ?>
          <article class="post">
            <div class="row">
              <div class="col-md-4 col-sm-4"> <a href="news_post.php?id=<?php echo $row['id']; ?>"><img
                    src="uploads/<?php echo $row['file']; ?>" alt="" class="img-thumbnail img-responsive"></a> </div>
              <div class="col-md-8 col-sm-8">
                <h3><a href="news_post.php?id=<?php echo $row['id']; ?>">
                    <?php echo $row['news_title']; ?>
                  </a></h3>
                <span class="post-meta meta-data"> <span><i class="fa fa-calendar"></i>
                    <?php echo $row['date']; ?>
                  </span></span>
                <?php echo strip_tags(substr($row['news_detail'], 0, 180)); ?>
                <p><a href="news_post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Continue reading <i
                      class="fa fa-long-arrow-right"></i></a> </p>
                <?php foreach (explode(';', $row["tags"]) as $key => $value) {
                ?>
                <input class="btn btn-xs btn-primary" type="button" value="<?php echo $value ?>"> <br>
                <?php } ?>
                <p class="text">
                  <?php echo $row['views'] ?> views
                </p>
              </div>
            </div>
          </article>
          <?php } ?>
          <?php endforeach; ?>
          <span class="text-muted m-r-sm"> Showing
            <?php if ($lastpage == $next - 1): ?>
            <?= $total_pages ?>
              <?php else: ?>
              <?= $page * $limit ?>
                <?php endif; ?>
                of <?= $total_pages ?>
          </span>
          <div class="btn-group">
            <?php if ($page != 1): ?>
            <a class="btn btn-default" href="?page=<?= $prev ?>"><i class="">Page <?= $prev ?>
                  <<< /i></a>
            <?php endif; ?>
            <?php if ($lastpage == $next - 1): ?>
            <?php else: ?>
            <a class="btn btn-default" href="?page=<?= $next ?>"><i class="">>>Page <?= $next ?></i></a>
            <?php endif; ?>
          </div>
        </div>
        <!-- Start Sidebar -->
        <?php include "side-bar.php"; ?>
        <!-- Start Footer -->
        <?php include "footer.php"; ?>
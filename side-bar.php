<div class="col-md-3 sidebar">
  <div class="widget sidebar-widget">
    <div class="sidebar-widget-title">
      <h3>Upcoming Events</h3>
    </div>
    <ul>
      <?php
        $result = $db->prepare("SELECT * FROM events ORDER BY id DESC Limit 3");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
        ?>
      <li class="item event-item clearfix">
        <div class="event-detail">
          <h4><a href="event-detail.php?id=<?php echo $row['id']; ?>">
              <?php echo $row['title']; ?>
            </a></h4>
          <span class="event-dayntime meta-data">
            <?php echo $row['date']; ?> |
            <?php echo $row['time']; ?>
          </span>
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
  <div class="widget sidebar-widget">
    <div class="sidebar-widget-title">
      <h3>Facebook Page</h3>
    </div>
    <!--Facebook Page-->
    <div class="fb-page" data-tabs="timeline,events,messages" data-href="https://www.facebook.com/YoloBookStore"
      data-width="1000" data-hide-cover="false">
    </div>
  </div>
  <!-- Recent Posts Widget -->
  <div class="widget-recent-posts widget">
    <div class="sidebar-widget-title">
      <h3>Recent News</h3>
    </div>
    <ul>
      <?php
        $result = $db->prepare("SELECT * FROM news ORDER BY id DESC Limit 3");
        $result->execute();
        for ($i = 0; $row = $result->fetch(); $i++) {
        ?>

      <div class="widget-blog-content"><a href="news_post.php?id=<?php echo $row['id']; ?>">
          <?php echo $row['news_title']; ?>
        </a> <span class="meta-data">
          <i class="fa fa-calendar"></i> on
          <?php echo $row['date']; ?>
        </span> </div>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>
</div>
</div>
</div>
</div>
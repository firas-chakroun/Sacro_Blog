<?php include "header.php"; ?>
<!-- //header-ends -->
<?php
if (isset($_GET["id"])) {
  $idd = $_GET["id"];
  $result = $db->prepare("SELECT * FROM news  WHERE id=$idd");
  $result->execute();
  $row = $result->fetch();
}
?>
<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Post News</h3>
		<div class="xs">

			<div class="col-md-8 inbox_right">
				<div class="Compose-Message">
					<div class="panel panel-default">
						<div class="panel-heading">
							Update News
						</div>
						<?php if (get("success")): ?>
						<div>
							<?= App::message("success", "News saved Successfully!") ?>
						</div>
						<?php endif; ?>
						<div class="panel-body panel-body-com-m">

							<form class="com-mail" action="all-news.php?id=<?php echo $idd ?>" method="post" enctype="multipart/form-data">

								<label>News Title : </label>
								<input type="text" name="news_title" class="form-control1 control3"
									value="<?php echo htmlspecialchars($row['news_title']); ?>">
								<label>News Detail : </label>
								<textarea rows="6" id="body" name="news_detail" value="<?php echo htmlspecialchars($row['news_detail']); ?>"
									class="form-control1 control2"> </textarea>
								<script>
									CKEDITOR.replace('body');
								</script>

								<label>Add Photo</label>
								<input type="file" name="file" class="form-control1 control3">
								<label>Tags :</label>
								<?php
                            $result = $db->prepare("SELECT * FROM tags");
                            $result->execute();
							$test=explode(";",$row["tags"]);

                            for ($i = 1; $row1 = $result->fetch(); $i++) {
								if( in_array($row1["name"],$test) ){

								
                            ?>

								<input type="checkbox" class="btn-check" checked id="btn-check-<?php echo $i ?>"
									name="tag<?php echo $row1["tagid"] ?>">
								<?php }else{ ?>
									<input type="checkbox" class="btn-check" id="btn-check-<?php echo $i ?>"
									name="tag<?php echo $row1["tagid"] ?>">
									<?php } ?>

								<label class="btn btn-secondary" for="btn-check-<?php echo $i ?>">
									<?php echo $row1["name"] ?>
								</label>
								<?php } ?>

								<hr>
								<input type="submit" value="Update news">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
</div>
<?php include "footer.php"; ?>
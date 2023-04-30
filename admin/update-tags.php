<?php include "header.php"; ?>
<!-- //header-ends -->
<?php
if (isset($_GET["id"])) {
  $idd = $_GET["id"];
  $result = $db->prepare("SELECT * FROM tags  WHERE tagid=$idd");
  $result->execute();
  $row = $result->fetch();
}
?>
<div id="page-wrapper">
	<div class="graphs">
		<div class="xs">
			<div class="col-md-8 inbox_right">
				<div class="Compose-Message">
					<div class="panel panel-default">
						<div class="panel-heading">
							Update Tag
						</div>
						<?php if (get("success")): ?>
						<div>
							<?= App::message("success", "Event saved Successfully!") ?>
						</div>
						<?php endif; ?>
						<div class="panel-body panel-body-com-m">
							<form class="com-mail" action="all-tags.php?id=<?php echo $idd ?>" method="post" enctype="multipart/form-data">
								<label>Update Tag : </label>
								<input type="text" name="tag" value="<?php echo htmlspecialchars($row['name']); ?>" class="form-control1 control3">
								<input type="submit" value="Update Tag">
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
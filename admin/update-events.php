<?php include "header.php"; ?>
<!-- //header-ends -->
<?php
if (isset($_GET["id"])) {
  $idd = $_GET["id"];
  $result = $db->prepare("SELECT * FROM events  WHERE id=$idd");
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
							Update Event
						</div>
						<?php if (get("success")): ?>
						<div>
							<?= App::message("success", "Event saved Successfully!") ?>
						</div>
						<?php endif; ?>
						<div class="panel-body panel-body-com-m">
							<form class="com-mail" action="all-events.php?id=<?php echo $idd ?>" method="post" enctype="multipart/form-data">
								<label>Event Title : </label>
								<input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" class="form-control1 control3">
								<label>Event Date : </label>
								<input type="text" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" class="form-control1 control3"
									placeholder="3rd, Sept 2017">
								<label>Event Time : </label>
								<input type="text" name="time" value="<?php echo htmlspecialchars($row['time']); ?>" class="form-control1 control3" placeholder="3PM">
								<label>Event Venue : </label>
								<input type="text" name="venue" value="<?php echo htmlspecialchars($row['venue']); ?>" class="form-control1 control3">
								<label>Contact Phone : </label>
								<input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" class="form-control1 control3">
								<label>Event Detail : </label>
								<textarea rows="3" id="body" name="detail" value="<?php echo htmlspecialchars($row['detail']); ?>" class="form-control1 control2"></textarea>
								<script>
									CKEDITOR.replace('body');
								</script>
								<hr>
								<input type="submit" value="Update Event">
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
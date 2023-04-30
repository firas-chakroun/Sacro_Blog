<?php include "header.php"; ?>
<!-- //header-ends -->
<?php
if (isset($_GET["id"])) {
	$a = $_GET['id'];
	$b = $_POST['tag'];
	$res = $db->prepare("UPDATE `tags` SET `name` = '$b' WHERE `tags`.`tagid` = $a;");
		$res->execute();}
		?>
<?php if (isset($_GET["new_tag"])) {
	$tag_name = $_GET["new_tag"];
	$query = ORM::for_table('tags')->create();
	$query->name = $tag_name;
	$query->save();
} ?>
<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">All Tags</h3>
		<div class="xs tabls">
			<div class="panel-body1">
				<?php if (get("success")): ?>
				<div>
					<?= App::message("success", "Successfully deleted a tag!") ?>
				</div>
				<?php endif; ?>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php //include('../connect.php');
                        if (!isset($_GET["page"])) {
	                        $_GET["page"] = 1;
                        }

                        $tbl_name = "tags"; //your table name
                        // How many adjacent pages should be shown on each side?
                        $adjacents = 3;

                        /*$query = "SELECT COUNT(*) as num FROM $tbl_name";
						$total_pages = mysql_fetch_array(mysql_query($query));
						$total_pages = $total_pages['num'];
						*/
                        $get_posts_tbl = ORM::for_table("$tbl_name")
                        	->find_array();

                        $total_pages = count($get_posts_tbl);
                        /* Setup vars for query. */
                        $targetpage = "pagination.php"; //your file name  (the name of this file)
                        $limit = 10; //how many items to show per page
                        $page = $_GET['page'];
                        if ($page)
	                        $start = ($page - 1) * $limit; //first item to display on this page
                        else
	                        $start = 0; //if no page var is given, set start to 0
                        
                        /* Get data. */

                        $result = $db->prepare("SELECT * FROM tags  ORDER BY tagid LIMIT $start, $limit");
                        $result->execute();

                        /* Setup page vars for display. */
                        if ($page == 0)
	                        $page = 1; //if no page var is given, default to 1.
                        $prev = $page - 1; //previous page is page - 1
                        $next = $page + 1; //next page is page + 1
                        $lastpage = ceil($total_pages / $limit); //lastpage is = total pages / items per page, rounded up.
                        $lpm1 = $lastpage - 1; //last page minus 1
                        ?>

						<span class="text-muted m-r-sm">Showing
							<?php if ($lastpage == $next - 1): ?>
							<?= $total_pages ?>
								<?php else: ?>
								<?= $page * $limit ?>
									<?php endif; ?>
									of <?= $total_pages ?>
						</span>

						<div class="btn-group">
							<?php if ($page != 1): ?>
							<a class="btn btn-default" href="?page=<?= $prev ?>"><i class="fa fa-angle-left"></i></a>
							<?php endif; ?>

							<?php if ($lastpage == $next - 1): ?>

							<?php else: ?>
							<a class="btn btn-default" href="?page=<?= $next ?>"><i class="fa fa-angle-right"></i></a>
							<?php endif; ?>
						</div>


			</div>
		</div>
		<table class="table">
			<?php

            for ($i = 1; $row = $result->fetch(); $i++) {


            ?>

			<tr>
				<th scope="row">
					<?php echo $i; ?>
				</th>
				<td>
					<?php echo $row['name']; ?>
				</td>
				<td>
					<a href="../tag.php?tagname=<?= $row['name'] ?>" target="_blank"
						class=" btn btn-primary">View</a>
					<a href="deletetag.php?id=<?= $row['tagid'] ?>"
						class=" btn btn-danger ">Delete</a>
					<a href="update-tags.php?id=<?= $row['tagid'] ?>"
						class=" btn btn-success ">Update</a>
				</td>
			</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
	<form action="all-tags.php" method="get">
		<label>Add Tag:</label>
		<input type="text" name="new_tag" class="form-control4" placeholder="Add Tag">
		<input type="submit" value="Add Tag">
	</form>
</div>
</div>
</div>
</div>
<?php include "footer.php"; ?>
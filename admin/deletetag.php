<?php
include '../connect.php';
$id = $_GET['id'];
$result = $db->prepare("DELETE FROM tags WHERE tagid= :post_id");
$result->bindParam(':post_id', $id);
if ($result->execute()) {
  header("location:all-tags.php?success=true");
} else {
  header("location:all-tags.php?failed=true");
}
?>
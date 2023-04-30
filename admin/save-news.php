<?php
session_start();
include('../connect.php');
$a = $_POST['news_title'];
$b = $_POST['news_detail'];
$d = '';
$result = $db->prepare("SELECT * FROM tags");
$result->execute();
for ($i = 1; $row = $result->fetch(); $i++) {
  if (isset($_POST['tag' . $row["tagid"]])) {
    $d = $d . ";" . $row["name"];
  }

}
$d = substr($d, 1);
// query
$file_name = strtolower($_FILES['file']['name']);
$file_ext = substr($file_name, strrpos($file_name, '.'));
$prefix = 'news_' . md5(time() * rand(1, 9999));
$file_name_new = $prefix . $file_ext;
$path = '../uploads/' . $file_name_new;
/* check if the file uploaded successfully */
if (@move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
  //do your write to the database filename and other details   
  $sql = "INSERT INTO news (news_title,news_detail,file,date,tags) VALUES (:a,:b,:c,now(),:d)";
  $q = $db->prepare($sql);
  $q->execute(array(':a' => $a, ':b' => $b, ':c' => $file_name_new, 'd' => $d));
  if ($q) {
    header("location:compose-news.php?success=true");
  } else {
    header("location:compose-news.php?failed=true");
  }
}
?>
<?php
include 'includes/session.php';

if (isset($_GET['return'])) {
	$return = $_GET['return'];

} else {
	$return = 'index.php';
}

if (isset($_POST['save'])) {
	$curr_password = $_POST['curr_password'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$photo = $_FILES['photo']['name'];
	if ($curr_password == $member["password"]) {
		if (!empty($photo)) {
			$file_name = strtolower($_FILES['file']['name']);
			$file_ext = substr($file_name, strrpos($file_name, '.'));
			$prefix = 'admin_' . md5(time() * rand(1, 9999));
			$file_name_new = $prefix . $file_ext;
			$path = '../uploads/' . $file_name_new;
			move_uploaded_file($_FILES['file']['tmp_name'], $path);
		} else {
			$path = $member['photo'];
		}

		if ($password == $member['password']) {
			$password = $member['password'];
		}




		try {
			$sql = "INSERT INTO table_admin (email,username,password,file) VALUES (:a,:b,:c,:d)";
			$q = $db->prepare($sql);
			$q->execute(array(':a' => $email, ':b' => $firstname, ':c' => $password, ':d' => $path));

			$_SESSION['success'] = 'Account updated successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	} else {
		$_SESSION['error'] = 'Incorrect password';
	}
} else {
	$_SESSION['error'] = 'Fill up required details first';
}

header('location:' . $return);

?>
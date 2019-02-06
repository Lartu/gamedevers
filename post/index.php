<?php
	//If no post is set, to index.
	if(!isset($_GET["id"])){
		header("Location: ..");
		exit();
	}
	//Get post
	require "../include/database_vars.php";
	require "../include/shibahug.php";
	$post_id = sqlEncode($_GET["id"]);
	sqlConnect($database_url, $dbusername, $dbpassword, $dbname);
	$post = sqlSelect("post", "id, creator_id, post_date, title, body, upvotes", "id=$post_id");
	//If the post doesn't exist
	if(count($post) == 0){
		header("Location: ..");
		exit();
	}
	$post = $post[0];
	sqlClose();
?>

<!DOCTYPE html>
	<html lang="en">
	<!-- Head -->
	<?php require "../include/head.php"; ?>

	<body>
		<!-- Top bar -->
		<?php require "../include/top-bar.php"; ?>

		<!-- Post Body -->
		<?php include "../include/post-body.php"; ?>

		<!-- Footer -->
		<?php require "../include/footer.php"; ?>
	</body>
</html>

<?php
	//Get posts in $post
	require "include/database_vars.php";
	require "include/shibahug.php";
	sqlConnect($database_url, $dbusername, $dbpassword, $dbname);
	$posts = sqlSelect("post", "id, creator_id, post_date, title, upvotes", "parent_id=0 ORDER BY id DESC");
	sqlClose();
?>

<!DOCTYPE html>
	<html lang="en">
	<!-- Head -->
	<?php require "include/head.php"; ?>

	<body>
		<!-- Top bar -->
		<?php require "include/top-bar.php"; ?>

		<!-- Posts -->
		<?php foreach($posts as $post) include "include/closedpost.php"; ?>

		<!-- Footer -->
		<?php require "include/footer.php"; ?>
	</body>
</html>

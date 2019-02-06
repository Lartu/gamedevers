<div class="d-flex mt-2">
	<!-- Upvote container -->
	<?php include "upvote.php"; ?>

	<div class="flex-grow-1">

		<!-- Post Title -->
		<div>
		<a href="post/?id=<?php echo $post["id"]; ?>" class="post-title"><?php echo $post["title"]; ?></a>
		</div>

		<!-- Post details -->
		<div class="post-details">
			<?php
			//Get post information
			sqlConnect($database_url, $dbusername, $dbpassword, $dbname);
			//Post creator
			$creator = sqlSelect("user", "id, username, user_group", "id=" . $post["creator_id"])[0];
			//Post comments
			$comment_count = sqlCount("post", "parent_id=" . $post["id"]);
			$comment_count = $comment_count . ($comment_count != 1 ? " comments" : " comment");
			sqlClose();
			?>

			<!-- Creator -->
			Created by <span class="group-<?php echo $creator["user_group"]; ?>"><?php echo $creator["username"]; ?></span>

			<!-- Date -->
			(<?php echo $post["post_date"]; ?>)

			<!-- Number of coments -->
			| <a href="post/?id=<?php echo $post["id"]; ?>" class="comments-button"><?php echo $comment_count; ?></a>
		</div>
	</div>
</div>
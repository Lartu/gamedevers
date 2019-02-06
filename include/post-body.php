<div class="d-flex mt-2">
	<!-- Upvote container -->
	<?php include "upvote.php"; ?>
	<div class="flex-grow-1">

		<!-- Post Title -->
		<div>
			<span class="post-title"><?php echo $post["title"]; ?></span>
		</div>

		<!-- Body -->
		<div class="post-body mt-1 mb-2">
			<?php echo str_replace("\n", "<br>", $post["body"]); ?>
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
			| <?php echo $comment_count; ?>
		</div>

		<!-- Comments -->
		<?php require "comment.php"; ?>
		<?php comments_of($post["id"], true); ?>
	</div>
</div>
<?php function comments_of($id, $first){ ?>
	<?php
		//Get comments
		global $database_url, $dbusername, $dbpassword, $dbname;
		sqlConnect($database_url, $dbusername, $dbpassword, $dbname);
		$comments = sqlSelect("post", "id, creator_id, post_date, body", "parent_id=$id");
		//If the post doesn't exist
		if(count($comments) == 0) return;
		sqlClose();
	?>

	<div class="<?php if(!$first) echo "comment-container ml-3"; ?>">

		<?php foreach($comments as $post){ ?>
			<div class="d-flex mt-2">
				<!-- Upvote container -->
				<?php include "upvote.php"; ?>

				<div class="flex-grow-1">

					<!-- Post details -->
					<div class="post-details">
						<?php
						//Get post information
						sqlConnect($database_url, $dbusername, $dbpassword, $dbname);
						//Post creator
						$creator = sqlSelect("user", "id, username, user_group", "id=" . $post["creator_id"])[0];
						sqlClose();
						?>

						<!-- Creator -->
						<span class="group-<?php echo $creator["user_group"]; ?>"><?php echo $creator["username"]; ?></span>

						<!-- Date -->
						(<?php echo $post["post_date"]; ?>)
					</div>

					<!-- Body -->
					<div class="post-body mt-1">
						<?php echo str_replace("\n", "<br>", $post["body"]); ?>
					</div>
				</div>
			</div>
			<?php comments_of($post["id"], false); ?>

		<?php } ?>

	</div>
<?php } ?>
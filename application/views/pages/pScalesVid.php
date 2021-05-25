<div class="guitarType">
	<div class="gType">
		<h1>Videos</h1><br>
		<?php
		if (count($videos)) : ?>
		<?php foreach ($videos

		as $vid) : ?>
		<div class="container-fluid" style="text-align: center;">
			<!-- Title -->
			<h1 class="mt-4"><?php echo $vid['title']; ?></h1>
			<!-- Author -->
			<hr>
			<p><b>Author:</b> <?php echo $vid['username'] ?></p>
			<p><b>Contact email:</b> <?php echo $vid['email'] ?></p>
			<!-- Date/Time -->
			<p><b>Uploaded on:</b> <?php echo $vid['date']; ?></p>
		</div>
		<hr>
		<div class="row">
			<div class="col">
				<div class="row">
					<video width="610" height="400" controls style="margin-left: 20%;">
						<source src="<?php echo base_url() . $vid['location']; ?>"
								type="video/mp4">
					</video>
				</div>
				<div class="row" style="margin-left: -35%; padding: 1%;">
					<button id="post_<?= $vid['id'] ?>" value='1'
							class="like">
						<i class="fa fa-thumbs-up"></i></button>
					<p style="margin-left: -37%;">Likes:
					<p
							id='totallikes<?= $vid['id'] ?>'><?= $vid['likes'] ?></p>
					</p>

					<button id="post_<?= $vid['id'] ?>" value='2'
							class="dislike">
						<i class="fa fa-thumbs-down"></i></button>
					<p style="margin-left: -37%;">Dislikes:
					<p
							id='totaldislikes<?= $vid['id'] ?>'><?= $vid['dislikes'] ?></p>
					</p>
				</div>
			</div>
			<div class="col">
				<div class="container d-flex justify-content-center mt-100 mb-100" style="text-align: center;">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Recent Comments</h4>
									<h6 class="card-subtitle">Latest Comments section by users</h6>
								</div>
								<div class="comment-widgets m-b-20"
									 style="overflow-y: scroll; height:400px; width: 400px;">
									<?php foreach ($vid['comments'] as $comment) : ?>
										<div class="d-flex flex-row comment-row">
											<div class="comment-text w-100">
												<h5><?php echo $comment['username']; ?></h5>
												<p class="m-b-5 m-t-10"><?php echo $comment['content']; ?></p>
											</div>
										</div>
									<?php endforeach; ?>
									<hr>
								</div>
								<div>Leave a comment</div>
								<textarea class="textarea" id="text_<?= $vid['id'] ?>" name="text"
										  required></textarea>
								<input class="komentar" id="postcomment_<?= $vid['id'] ?>"
									   type="submit">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr style="border-top: 3px solid lightgray;">
		<br><br>
	</div>
	<?php endforeach; ?>
	<?php else : ?>
		<div class="alert alert-primary" role="alert">
			No videos available at the moment.
		</div>
	<?php endif; ?>
</div>
</div>
<a href='<?php echo site_url("pages/view/pianoScales")?>' class="arrow"><img src="<?php echo base_url() ?>assets/img/sliki/arrowleft.png"></a>

<script type='text/javascript'>
	$(document).ready(function () {

		$('.komentar').click(function (event, value, caption) {

			var id = this.id;
			var splitid = id.split('_');
			var video_id = splitid[1];
			var text = $("#text_" + video_id).val();
			if (text == '') {
				alert("Please enter your comment");
			} else {
				$.ajax({
					url: '<?= base_url() ?>index.php/upload/leave_comment',
					type: 'post',
					data: {
						video_id: video_id,
						text: text,
					},
					success: function (response) {
						setTimeout(function () {
							location.reload();
						}, 500);
					}
				});
			}
		})
	});

	$(document).ready(function () {

		$('.like').click(function (event, value, caption) {

			var id = this.id;
			var splitid = id.split('_');
			var video_id = splitid[1];
			var value = $(this).attr("value");

			console.log(id);
			console.log(value);
			$.ajax({
				url: '<?= base_url() ?>index.php/upload/setLike',
				type: 'post',
				data: {
					video_id: video_id,
					value: value,
				},
				success: function (response) {
					setTimeout(function () {
						location.reload();
					}, 500);
				}
			});
		});

	});

	$(document).ready(function () {

		$('.dislike').click(function (event, value, caption) {

			var id = this.id;
			var splitid = id.split('_');
			var video_id = splitid[1];
			var value = $(this).attr("value");
			$.ajax({
				url: '<?= base_url() ?>index.php/upload/setDislike',
				type: 'post',
				data: {
					video_id: video_id,
					value: value,
				},
				success: function (response) {
					setTimeout(function () {
						location.reload();
					}, 500);
				}
			});
		});

	});

</script>

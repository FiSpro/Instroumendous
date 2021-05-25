<?php

if (!isset($this->session->userdata['logged_in'])) {
	$data['message_display'] = 'Signin to view this page!';
	$this->load->view('user_authentication/login', $data);
	return;
} ?>

<div class="col">
	<div class="col">
		<div class="block-heading" align="center">
			<h2 class="text-info">Upload</h2>
			<p><?php echo "<div class='error_msg'>";
				echo validation_errors();
				echo "</div>";
				if (isset($error_message)) {
					echo $error_message;
				}; ?></p>
		</div>
	</div>

	<?php echo form_open_multipart('upload/upload_video') ?>

	<div class="form-group" id="form"><label for="filename">Video (allowed types: avi, mov, mp4)</label>
		<?php
		$data1 = array(
			'type' => 'file',
			'name' => 'filename',
			'class' => 'form-control-file'
		);
		echo form_upload($data1); ?>
		<br/>
	</div>
	<div class="form-group" id="form"><label for="title">Title</label>
		<br/>
		<?php
		$data2 = array(
				'type' => 'text',
				'name' => 'title',
				'class' => 'form-control item'
		);
		echo form_input($data2); ?>
		<br/>
	</div>
	<select class="form-select" aria-label="Default select example" name="instrument">
		<option selected>Select instrument</option>
		<option value="p">Piano</option>
		<option value="g">Guitar</option>
		<option value="v">Violin</option>
	</select><br><br>
	<select class="form-select" aria-label="Default select example" name="type">
		<option selected>Select type</option>
		<option value="N">Notes</option>
		<option value="S">Scales</option>
		<option value="C">Chords</option>
	</select><br><br><br>
	<div class="upload_btn">
	<?php
	$data5 = array(
		'type' => 'submit',
		'name' => 'submit',
		'class' => 'btn btn-primary btn-block',
		'value' => 'Upload',
	);
	echo form_submit($data5);
	echo form_close();
	?>
</div><br>

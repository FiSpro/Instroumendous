<main class="page login-page" style="padding-top: 2%">
	<section class="clean-block clean-form dark">
		<div class="container" style="width: 30%">
			<div class="block-heading">
				<h2 class="text-info">Sign In</h2>
				<p> <?php if (isset($error_message)) {
						echo $error_message;
					};
					if (isset($logout_message)) {
						echo "<div class='message'>";
						echo $logout_message;
						echo "</div>";
					};
					if (isset($message_display)) {
						echo "<div class='message'>";
						echo $message_display;
						echo "</div>";
					}?></p>
			</div>
			<div>
				<div>
					<hr/>
					<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('user_authentication/signin');

					echo '<div class="form-group"><label for="email">Email</label>';
					echo "</br>";
					$data1 = array(
							'type' => 'email',
							'name' => 'email',
							'class' => 'form-control item'
					);
					echo form_input($data1);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "</br>";

					echo '<div class="form-group"><label for="password">Password</label>';
					echo "</br>";
					$data2 = array(
							'type' => 'password',
							'name' => 'password',
							'class' => 'form-control item'
					);
					echo form_input($data2);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "</br>";

					$data3 = array(
							'type' => 'submit',
							'name' => 'submit',
							'class' => 'btn btn-primary btn-block',
							'value' => 'Sign In',
					);
					echo form_submit($data3);
					echo form_close();

					?>
					<a href="<?php echo base_url() ?>index.php/user_authentication/show">To SignUp Click Here</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>
</main>

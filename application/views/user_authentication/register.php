<main class="page registration-page" style="padding-top: 2%">
	<section class="clean-block clean-form dark">
		<div class="container" style="width: 30%">
			<div class="block-heading">
				<h2 class="text-info">Registration</h2>
				<p>
				<div class='error_msg'></div>
				</p>
			</div>
			<div>
				<div>
					<hr/>
					<form action="signup" method="post" accept-charset="utf-8">
						<div class="form-group"><label for="username">Username</label></br><input type="text" name="username"
																						  value=""
																						  class="form-control item"/>
							<div class='error_msg'></div>
							</br>
						</div>
						<div class="form-group"><label for="email">Email</label><br/><input type="email"
																							name="email_value"
																							value=""
																							class="form-control item"/>
							<br/>
						</div>
						<div class="form-group"><label for="password">Password</label><br/><input
									type="password" name="password" value="" class="form-control item"/>
							<br/>
						</div>
						<input type="submit" name="submit" value="Sign Up"
							   class="btn btn-primary btn-block"/>
					</form>
					<a href="<?php echo base_url() ?>index.php/user_authentication/index">For Login Click Here</a>
				</div>
			</div>
		</div>
	</section>
</main>

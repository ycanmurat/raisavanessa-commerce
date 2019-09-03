<section class="account detail">
	<div class="container">
		<div class="row">
			<?php $this->load->view('account-menu',array('step' => $step))?>
			<div class="col-md-12">
				<div class="accountSettings">
					<div class="row">
						<div class="col-md-12">
							<div id="accountErrors"></div>						
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="ac_name">Name Surname*</label>
								<input id="ac_name" value="<?=$this->session->userdata('user')->name?>" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="ac_email">EMAIL*</label>
								<input id="ac_email" value="<?=$this->session->userdata('user')->email?>" type="text">
							</div>
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="ac_phone">PHONE NUMBER*</label>
								<input id="ac_phone" value="<?=$this->session->userdata('user')->phone?>" type="number">
							</div>
						</div>
						<div class="col-md-6">
							<div class="item">
								<label for="birth_day">BRITHDAY*</label>
								<input id="birth_day" value="<?=$this->session->userdata('user')->birth_day?>" type="date">
							</div>
						</div>
						<div class="col-md-12">
							<button onclick="accountSave()">SAVE CHANGES</button>
						</div>
						<div class="col-md-12">
							<div id="accountPassErrors"></div>	
							<div class="passwordChangeWrapper">
								<h3>Password Change</h3>
								<div class="item">
									<label for="old_pass">Current password</label>
									<input id="old_pass" type="password">
								</div>
								<div class="item">
									<label for="pass">New password</label>
									<input id="pass" type="password">
								</div>
								<div class="item">
									<label for="pass2">Confirm new password</label>
									<input id="pass2" type="password">
								</div>
							</div>
							<div class="col-md-12">
								<button onclick="accountPassChange()">CHANGE PASSWORD</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
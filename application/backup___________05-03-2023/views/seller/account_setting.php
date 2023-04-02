			<div class="tab-pane fade active show" id="settings" role="tabpanel" aria-labelledby="settings-tab">
			  	<ul class="breadcrumbs">
			  		<li>
			  			<a href="#">Home</a>
			  		</li>
			  		<li>
			  			<a href="#">products</a>
			  		</li>
			  		<li>account settings</li>
			  	</ul>
			  	<h1>account setting</h1>
			  	<div class="tab-holder">
			  		<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#photo" role="tab">Change Profile Photo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#Password" role="tab">Change Password</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="photo" role="tabpanel">
							<div class="photo-box">
								<h1>change Profile Photo</h1>
								<div class="photo-upload">

									<div class="logo-content">
										<input type='file' id="profile-image-file-input"/>
										<div class="blah-holder">
											<span>Current Profile Image</span>
										    <img class="file-upload-image" id="profile-image-change" src="<?=UPLOADS.'seller/'.$user['profile_img']?>" alt="profile image" />
										</div>
									</div>

									<?php if (1==2): ?>
										<div class="file-upload">
											<div class="image-upload-wrap">
										    	<input class="file-upload-input" id="profile-image-file-input" type='file' onchange="readURL(this);" accept="image/*" />
										    	<div class="drag-text">
										      		<h3>+</h3>
										    	</div>
										  	</div>
											<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
												Please Select Your Photo
											</button>
											<div class="file-upload-content">
											  	<?php if (strlen($user['profile_img']) > 4): ?>
											    	<img class="file-upload-image" id="profile-image-change" src="<?=BASEURL.'seller/'.$user['profile_img']?>" alt="profile image" />
											  	<?php else: ?>
											    	<img class="file-upload-image" src="#" alt="profile image" />
											  	<?php endif ?>
											    <div class="image-title-wrap">
											      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
											    </div>
										 	</div>
										</div>
									<?php endif ?>

								</div>
							</div>
						</div>
						<div class="tab-pane" id="Password" role="tabpanel">
							<h1>change Password</h1>
							<form class="password-form change-password-form">
								<div class="pass-row">
									<label>old password</label>
									<input type="password" name="password" required="required">
								</div>
								<div class="pass-row">
									<label>new password</label>
									<input type="password" name="new_password" required="required">
								</div>
								<div class="pass-row">
									<label>repeat password</label>
									<input type="password" name="new_password_2" required="required">
								</div>
								<div class="pass-btn">
									<button>save changes</button>
								</div>
							</form>
						</div>
					</div>
			  	</div>
			  </div><!-- /tab-pane -->
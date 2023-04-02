		<div class="tab-content" id="myTabContent">


			<div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home1-tab">
				<div class="user-panel-holder">
					<h1>my profile</h1>
					<form action="" class="user-profile-form">
			  		<div class="profile_holder">
			  			<div class="column text">
			  				<span>first name</span>
			  				<input type="text" name="fname" class="makeNonEditable" placeholder="First Name" value="<?=$user['fname']?>" required="required">
			  			</div>
			  			<div class="column text">
			  				<span>last name</span>
			  				<input type="text" name="lname" class="makeNonEditable" placeholder="Last Name" value="<?=$user['lname']?>" required="required">
			  			</div>
			  			<div class="column email">
			  				<span>email address</span>
			  				<input type="email" name="email" placeholder="mail@domain.com" value="<?=$user['email']?>">
			  			</div>
			  			<div class="column mobile">
			  				<span>mobile</span>
			  				<input type="tel" name="phone" placeholder="03xxx xxxxxxx" value="<?=$user['phone']?>" required="required">
			  			</div>
			  			<div class="column mobile">
			  				<span>birthday</span>
			  				<input type="date" name="dob" value="<?=date('m/d/Y',strtotime($user['dob']))?>" placeholder="1990-04-04">
			  			</div>
			  			<div class="column gender">
			  				<span>gender</span>
			  				<select name="gender">
			  					<option value="">Select</option>
			  					<?php if ($user['gender'] == 'male'): ?>
				  					<option value="male" selected="selected">Male</option>
				  					<option value="female">female</option>
			  					<?php elseif($user['gender'] == 'female'): ?>
			  						<option value="male">Male</option>
				  					<option value="female" selected="selected">female</option>
			  					<?php endif ?>
			  				</select>
			  			</div>
			  			<div class="column city">
			  				<span>country</span>
			  				<select name="country_id" required>
			  					<option value="">Select</option>
			  					<?php foreach ($countries as $key => $country): ?>
			  						<?php if ($user['country_id'] == $country['country_id']): ?>
			  							<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
			  						<?php else: ?>
			  							<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
			  						<?php endif ?>
			  					<?php endforeach ?>
			  				</select>
			  			</div>
			  			<div class="column city">
			  				<span>state</span>
			  				<select name="state_id" required>
			  					<option value="">Select</option>
			  					<?php foreach ($states as $key => $state): ?>
			  						<?php if ($user['state_id'] == $state['state_id']): ?>
			  							<option value="<?=$state['state_id']?>" selected="selected"><?=$state['name']?></option>
			  						<?php else: ?>
			  							<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
			  						<?php endif ?>
			  					<?php endforeach ?>
			  				</select>
			  			</div>
			  			<div class="column city">
			  				<span>city</span>
			  				<select name="city_id" required>
			  					<option value="">Select</option>
			  					<?php foreach ($cities as $key => $city): ?>
			  						<?php if ($user['city_id'] == $city['city_id']): ?>
			  							<option value="<?=$city['city_id']?>" selected="selected"><?=$city['name']?></option>
			  						<?php else: ?>
			  							<option value="<?=$city['city_id']?>"><?=$city['name']?></option>
			  						<?php endif ?>
			  					<?php endforeach ?>
			  				</select>
			  			</div>
			  			<div class="column text">
			  				<span>address</span>
			  				<input type="text" name="house_no" class="makeNonEditable" placeholder="Address" value="<?=$user['house_no']?>">
			  			</div>
			  			<div class="column" style="background: inherit;padding-top: 30px;">
			  				<button class="btn btn-success" type="submit">Update</button>
			  			</div>
			  			<div class="btn-holder">
			  				<!-- <a class="edit-profile" href="#" data-toggle="modal" data-target="#edit-address">Edit Profile <i class="fa fa-pencil" aria-hidden="true"></i></a> -->
			  				<a class="edit-address" href="<?=BASEURL.'user/change-password'?>">change password <i class="fa fa-pencil" aria-hidden="true"></i></a>
			  			</div>
			  		</div>
					</form>
				</div>
			</div><!-- PROFILE-tab -->



		</div><!-- /tab-content -->
	</div>
</div>
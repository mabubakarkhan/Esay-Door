		<section class="seller-signup sign-up">
			<div class="signup-banner">
				<img src="<?=IMG?>img59.jpg" align="image">
				<a href="#">
					<img src="<?=IMG?>logo.png" alt="logo">
				</a>
			</div>
			<div class="signup-form">
				<div class="container">
					<div class="form-columns">
						<div class="column">
							<img src="<?=IMG?>img120.png" alt="image">
							<div class="holder">
								<span>Step 1</span>
								<p>
									Sign up for Digital <br> Sahulat Category
								</p>
							</div>
						</div>
						<div class="column">
							<img src="<?=IMG?>img121.png" alt="image">
							<div class="holder">
								<span>Step 2</span>
								<p>
									Login to seller <br> Center &amp; Upload Your Deals
								</p>
							</div>
						</div>
						<div class="column">
							<img src="<?=IMG?>img122.png" alt="image">
							<div class="holder">
								<span>Step 1</span>
								<p>
									Sell &amp; Expand <br> Your Business
								</p>
							</div>
						</div>
					</div>
					<div class="signup-box">
						<form action="<?=BASEURL.'submit-seller-signup-form-4'?>" method="post" enctype="multipart/form-data">
							<div class="holder-1">
								<span class="heading">Your Business Information:</span>
								<div class="signup-row">
									<div class="col_">
										<label>Name on CNIC*</label>
										<input type="text" name="name_on_cnic" placeholder="Please enter your name as per CNIC" required="required">
									</div>
									<div class="col_">
										<label>CNIC Front Image*</label>
										<div class="file">
							              <input type="file" name="cnic_front" id="file" class="file-input" required="required">
							            </div>
									</div>
								</div>
								<div class="signup-row">
									<div class="col_">
										<label>CNIC Number*</label>
										<input type="text" name="cnic" placeholder="Please enter your 13 digits of CNIC number" required="required">
									</div>
									<div class="col_">
										<label>CNIC Back Image*</label>
										<input type="file" name="cnic_back" id="files" required="required"/>
									</div>
								</div>
							</div>
							<div class="holder-1">
								<span class="heading">Bank Account Information:</span>
								<div class="signup-row">
									<div class="col_">
										<label>Bank Account Title (Should be same as NTN or CNIC) *</label>
										<input type="text" name="bank_title" placeholder="Bnak Account title match eith NTN or CNIC provide above" required="required">
									</div>
									<div class="col_">
										<label>Account Number - IBAN *</label>
										<input type="text" name="bank_iban" placeholder="Please enter your IBAN" required="required">
									</div>
								</div>
								<div class="signup-row">
									<div class="col_">
										<label>Bank Name *</label>
										<input type="text" name="bank_name" placeholder="Please select your bank name from the drop-down list" required="required">
									</div>
									<div class="col_">
										<label>Branch Code *</label>
										<input type="text" name="branch_code" placeholder="If you are unaware of your branch code then enter “0000”" required="required">
									</div>
								</div>
							</div>
							<div class="holder-1 cheque">
								<span class="heading">Upload Cheque Copy *</span>
								<input type='file' name="cheque_image" onchange="readURL(this);" required="required"/>
	    							
								<p>
									Please upload a copy of cheque to secure you bank account information and you will get online payment
								</p>
								<div class="img-frame">
									<img id="blah" src="<?=IMG?>bg-cheque.png" alt="your image" />
								</div>
							</div>
							<div class="holder-1 terms">
								<span class="heading">Terms &amp; Condition *</span>
								<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1" required="required">
								<label for="styled-checkbox-1">I hereby agree that I have read and accepted Daraz Marketplace Agreement</label>
								<button>submit form</button>
							</div>
						</form>
					</div>

						<div class="bottom-text">
							For queries contact seller signup team via email id <a href="mailto:seller.pk@care.daraz.com"> seller.pk@care.daraz.com</a> &/or phone number <a href="tel:9221999735537"> +92 21 111-735-537</a>
						</div>
				</div>
			</div>
		</section>
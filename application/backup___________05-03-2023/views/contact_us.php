<section class="main-banner contact-banner">
	<img src="<?=IMG?>img82.jpg" alt="image">
	<div class="container">
		<div class="caption-box">
			<div class="cap-holder">
				<span>easy shopping</span>
				<h2>contact us</h2>
			</div>
		</div>
	</div>
</section>

		<section class="contact-section">
			<div class="container">
				<img src="<?=IMG?>img91.jpg" alt="map" class="map">
				<div class="address-columns">
					<div class="column">
						<strong>Sales Enquiry</strong>
						<p>
							Find out more about how Review PLC can grow your business
						</p>
						<span>call us on</span>
						<a class="tel" href="tel:<?=$settings[13]['value']?>"><?=$settings[13]['value']?></a>
						<span>Or</span>
						<a class="btn-demo" href="#">Request a demo</a>
					</div>
					<div class="column green">
						<strong>Have aquestion</strong>
						<p>
							Want to know more about how Review PLC works or have questions? Get all the answers you want here.
						</p>
						<img src="<?=IMG?>img92.png" alt="image">
						<a href="#" class="plc">About Review PLC</a>
						<a href="#" class="ask">Frequently Asked Questions</a>
					</div>
					<div class="column">
						<strong>Customer Support</strong>
						<p>
							For our existing customers who need a little help.
						</p>
						<span>call us on</span>
						<a class="tel" href="tel:<?=$settings[12]['value']?>"><?=$settings[12]['value']?></a>
						<span>Or</span>
						<a class="btn-demo" href="#">Email Customer Services</a>
					</div>
				</div>
				<div class="form-holder">
					<h3>Get in touch</h3>
					<div class="form-columns">
						<div class="column">
							<input type="text" placeholder="Full Name">
							<input type="email" placeholder="Type Email">
							<input type="tel" placeholder="Phone Number">
							<textarea placeholder="Message"></textarea>
							<button>submit</button>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="customers-counter">
			<div class="container">
				<h2>What are your customers saying?</h2>
				<p>Generation feedback:  join the conversation today.</p>
				<span>Review PLC Has Collected</span>
				<ul class="counter">
					<li>3</li>
					<li>1</li>
					,
					<li>1</li>
					<li>5</li>
					<li>5</li>
					,
					<li>8</li>
					<li>8</li>
				</ul>
				<span>Review And Counting...</span>
				<a href="#" class="quote">Get a quote</a>
			</div>
		</section>


		<section class="sale-banner">
			<div class="container">
				<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
					<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
				<?php endif ?>
			</div>
		</section>
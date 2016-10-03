<?php $assets = get_template_directory_uri() . "/assets"; ?>

<section class="contact-form contact-form--text-block-padding section--wrapper-padding" style="background: url(<?php print $assets; ?>/images/intro__bg.jpg);background-size: cover;" id="contact-us">
	<div class="wrapper--pattern section__wrapper">
		<div class="row">
			<div class="small-12 medium-8 small-centered">
				<div class="contact-form__text-block">
					<span class="contact-form--h1 h1--multicolor h1--white">TIME TO <span>MAKE CONTACT</span></span>
					<p class="h3--white">We would love to answer any questions you might have. Contact us today!</p>
				</div>
				<div class="contact-form__form-wrapper contact-form__text-block">
					<?php echo do_shortcode('[contact-form-7 id="83" title="Make Contact"]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
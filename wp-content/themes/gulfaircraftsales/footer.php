<footer class="footer footer--h4 section--padding" style="padding-bottom: 0">
	<div class="row" style="padding-bottom: 20px;">
		<div class="column small-12 medium-offset-2 medium-2">
			<div class="footer__collection">
				<h4 class="footer__header">
					Contact Us
				</h4>
				<p class="footer__paragraph">
					<span>Gulf Aircraft Sales</span>
					<span>1875 Aircraft Road</span>
					<span>Gulf Coast, FL 32809</span>
					<span>888.555.2849</span>
				</p>
			</div>
		</div>
		<div class="column small-12 medium-offset-1 medium-2">
			<div class="footer__collection">
				<h4 class="footer__header">
					Site Menu
				</h4>
					<?php
						$args = array(
							'menu' => 'main_menu',
							'menu_class' => 'footer__list',
							'menu_id' => ''	
						);
						wp_nav_menu($args);
					?>
			</div>
		</div>
		<div class="column small-12 medium-offset-1 medium-2 end">
			<div class="footer__collection">
				<h4 class="footer__header">
					Resources
				</h4>
				<ul class="footer__list">
					<li><a href="">Registration</a>
					</li>
					<li><a href="">FAQs</a>
					</li>
					<li><a href="">License</a>
					</li>
					<li><a href="">Insurance</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row row--centered section--padding" style="padding-bottom: 2.2rem;">
		<div class="row__text-block">
			<p class="footer__paragraph">Copyright 2016  |  Gulf Aircraft Sales  |  Website by Jared Knetzer</p>
		</div>
	</div>
</footer>


	<!-- close out off canvas -->
		</div>
	</div>
</div>

<?php if (is_page('aircraft-for-sale')) { ?>
		<script type="text/javascript">
			var elems;
			var forsale = true;
		</script>		
<?php } ?>

<?php wp_footer(); ?>



</body>
</html>
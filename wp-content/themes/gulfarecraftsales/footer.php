<footer>
	<div class="container" align="center">
			<div class="col span_4">
				<div class="footer__collection">
					<h4>Contact Us</h4>
					<p>Gulf Aircraft Sales<br />
		1875 Aircraft Road<br />
		Gulf Coast, FL 32809<br />
		888.555.2849<br />
		Info@GulfAircraftSales.com</p>
				</div>
			</div>
			<div class="col span_4">
				<div class="footer__collection">
					<h4>Site Menu</h4>
					<ul>
						<li><a href="">Home</a>
						</li>
						<li><a href="">Aircraft for Sale</a>
						</li>
						<li><a href="">About Us</a>
						</li>
						<li><a href="">Blog</a>
						</li>
						<li><a href="">Contact</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col span_4">
				<div class="footer__collection">
					<h4>Resources</h4>
					<ul>
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
	<div align="center">
		<p class="small">Copyright 2016  |  Gulf Aircraft Sales  |  Website by Jared Knetzer</p>
	</div>
</footer>

	<!-- close out off canvas -->
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<?php if (is_page('aircraft-for-sale')) { ?>
		<!-- original query -->
		<script type="text/javascript">
			$( document ).ready(function() {
				
				var cards = {};
			
				terms.forEach(function(currentValue, index, array) {
					$.ajax({
						type: 'GET',
						url: ajaxurl,
						data: {"action": "create_card", "term": currentValue}
					})
					.done(function( data ) {
						$('section#aircraft__inventory_view').fadeIn('slow', function() {
							var term = currentValue;
							cards[term] = {};
							console.log(cards);
							data.forEach(function (curr, index, arr) {
								console.log("permalink: " + curr['permalink']);
							});
						});
						
					});
				});
			
			});
		</script>		
<?php } ?>

</body>
</html>
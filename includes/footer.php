</div>

	<!-- Lets add a footer outside the main-page div because we want the footer to be full page as well
		id is to use later for css -->
	<footer class="text-center" id="footer">
		&copy; Copyright 2017 afghan Bazar
	</footer>

	<!-- Details Modal -->


	<script>
		// Target the window
		$(window).scroll(function() {
			// scrollTop tells us how many pixels we have scrolled from the top
			var vscroll = $(this).scrollTop();
			// this function will keep the text logo centered while we scroll
			// if we didn't divide by 2 it would just stay there and not move at all
			$('#logotext').css({
				"transform" : "translate(0px, " + vscroll/2 + "px)"
			});

			var vscroll = $(this).scrollTop();
			$('#fore-flower').css({
				// the negative makes it scroll up
				"transform" : "translate(0px, -" + vscroll/2 + "px)"
			});
		});

		function detailsModal(id) {
			var data = {"id" : id, };
			jQuery.ajax({
				url : '/afghanbazar/includes/detailsmodal.php',
				method : "post",
				// If you inspect the network for form you'll see there is form data
				// That contains our id
				data : data,
				success: function(data) {

					jQuery('body').append(data);
					// We can now toggle the modal because its in the body
					jQuery('#details-modal').modal('toggle');
				},
				error: function() {
					alert("Something went wrong!");
				}
			});
		}

	</script>
</body>
</html>

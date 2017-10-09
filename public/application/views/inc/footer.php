
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script>
			$(function() {
				$('#submit').on('click', function(e) {
					e.preventDefault();
				});
				$('#submit').prop('disabled', true);
			});
		</script>
	</body>
</html>
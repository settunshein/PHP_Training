        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<!-- Dropify -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" 
		integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
		<script>
			$('.dropify').dropify({
	            messages: {
	                'default': 'Choose Your Upload Image',
	                'replace': 'Click or Drag and Drop to Replace',
	                'remove' : 'Remove',
	                'error'  : 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
	            }
       		 });
		</script>
		<?php

		if( isset($_SESSION['folder_name_err']) ){
			unset($_SESSION['folder_name_err']);
		}

		if( isset($_SESSION['image_err']) ){
			unset($_SESSION['image_err']);
		}
		?>
</body>
</html>
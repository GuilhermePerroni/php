<?php


if (!isset($_SESSION)) session_start(); 

if ($_SESSION['mensagem']!=""):
	if(isset($_SESSION['mensagem'])): ?>

	<script>
		window.onload = function(){
			M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
		};
	</script>
		

	<?php
	$_SESSION['mensagem'] = "";

	endif;
endif;
//session_unset(); ?>
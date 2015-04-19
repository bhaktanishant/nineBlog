<?php
require 'templates/header.php';

echo '<div class="container">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<div class="panel panel-default">
		  <div class="panel-heading">
				<h3 class="panel-title text-center">'.$data["post"]["heading"].'</h3>
		  </div>
		  <div class="panel-body">
			'.$GLOBALS['Parsedown']->text($data["post"]["content"]).'
		 </div>
	</div>
	</div>	
</div>';

require 'templates/footer.php';
?>
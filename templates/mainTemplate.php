<?php 
require 'templates/header.php'; 
global $Parsedown;
?>

<div class = 'container-fluid'>
	
<?php
	foreach ($data['postList'] as $key => $values) {
		echo "<span class = 'text-center'><a href='/class/blog/post/".$values['url']."/'><h2>".$values['heading']."</h2></a></span><br>";
		echo $values['date']."<br><br>";
		echo "<p>".$Parsedown->text($values['content'])."</p><br><br>";
		echo $values['comments']."<br><br>";
		echo $values['tags']."<br>";
	}
?>

<?php
	echo '<div class = "container">
	<ul class="pagination">
		<li><a href="/class/blog/">&laquo;</a></li>';
		for ($i=1; $i <= $data['totalPage']; $i++) { 
			echo '<li><a href="/class/blog/page/'.$i.'">'.$i.'</a></li>';
		}
	echo '<li><a href="/class/blog/page/'.$data['totalPage'].'">&raquo;</a></li>
	</ul>
	</div>';
?>
	
</div>

<?php require 'templates/footer.php'; ?>
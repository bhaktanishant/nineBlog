<?php
require 'templates/header.php';

echo '<div class="container-fluid">
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
	<form action="" method="POST" role="form">
		<legend class="text-center">Manage post here</legend>
		<strong>Showing : </strong>'.$data['postFrom'].' - '.$data['postTo'].' / '.$data['totalPost'].'<br><br>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Check</th>
					<th class="col-xs-10 col-sm-10 col-md-10 col-lg-10">Post List</th>
					<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Action</th>
				</tr>
			</thead>
			<tbody>';
			if ($data['postFound'] == true) {
				foreach ($data['postList'] as $key => $value) {
				echo	'<tr>
					<td><input type="checkbox"></td>
					<td>'.$value['heading'].'</td>
					<td><a href="/class/blog/deletepost/'.$value['url'].'" class="btn btn-xs btn-default">Delete</a></td>
					<td><a href="editpost/'.$value['url'].'" class="btn btn-xs btn-default">Edit</a></td>
					<td><a href="/class/blog/post/'.$value['url'].'" class="btn btn-xs btn-default">view</a></td>
				</tr>';
				}
			}
	
echo		'</tbody>
		</table>
			<button type="submit" class="btn btn-sm btn-primary">Delete</button>
	</form>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 text-right">';
			if ($data['showPriviousAndFirstPage'] == true) {
				echo '<a href="/class/blog/manage-post/1" class="btn btn-sm btn-primary"><<</a>
				<a href="/class/blog/manage-post/'.$data['priviousPage'].'" class="btn btn-sm btn-primary">< Previous</a>';
			}
			if ($data['showNextAndLastPage'] == true) {
				echo '<a href="/class/blog/manage-post/'.$data['nextPage'].'" class="btn btn-sm btn-primary">Next ></a>
				<a href="/class/blog/manage-post/'.$data['lastPageNo'].'" class="btn btn-sm btn-primary">>></a>';
			}
echo 	'</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<form action="" method="POST" role="form">
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-right">
					<div class="input-group">
						<div class="input-group-addon"><strong>Go to page : </strong></div>
						<input type="text" name="goToPage" class="form-control" value="">
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-right">
					<button type="submit" class="btn btn-sm btn-primary">Go</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<a href="/class/blog/create-new-post/" type="button" class="btn btn-large btn-block btn-primary">Creat New Post</a>
	</div>
</div>';

require 'templates/footer.php';
?>
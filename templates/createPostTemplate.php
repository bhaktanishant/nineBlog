<?php
require "templates/header.php";
echo '
<div class="container-fluid">
	<div class="col-xs-128 col-sm-8 col-md-8 col-lg-8">
		<form action="" method="POST" role="form">
			<legend class="text-center">Create New Post</legend>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">Title</div>
					<input class="form-control" name="postTitle" placeholder="Post Title" value="'.$data['rePostTitle'].'">
					<span>'.$data['postTitleError'].'</span>
				</div>
			</div>
			<div class="form-group" id="textarea">
				<div class="btn-group">
					<button type="button" class="btn btn-default" id="buttonBold"><span class="glyphicon glyphicon-bold"></span></button>
					<button type="button" class="btn btn-default" id="buttonItalic"><span class="glyphicon glyphicon-italic"></button>
					<button type="button" class="btn btn-default" id="buttonTexthight"><span class="glyphicon glyphicon-text-height"></button>
					<button type="button" class="btn btn-default" id="buttonAlignLeft"><span class="glyphicon glyphicon-align-left"></button>
					<button type="button" class="btn btn-default" id="buttonAlignCenter"><span class="glyphicon glyphicon-align-center"></button>
					<button type="button" class="btn btn-default" id="buttonAlignRight"><span class="glyphicon glyphicon-align-right"></button>
					<button type="button" class="btn btn-default" id="buttonList"><span class="glyphicon glyphicon-list"></button>
					<button type="button" class="btn btn-default" id="buttonPicture"><span class="glyphicon glyphicon-picture"></button>
					<button type="button" class="btn btn-default" id="buttonComment"><span class="glyphicon glyphicon-comment"></button>
				</div>
				<textarea class="form-control" id="postContent" name="postContent" placeholder="Post content here" rows="18">'.$data['rePostContent'].'</textarea>
				<span>'.$data['postContentError'].'</span>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">Tags</div>
					<input class="form-control" name="tags" placeholder="Enter tags saperated by comma" value="'.$data['reTags'].'">
				</div>
			</div>
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>';

require "templates/footer.php";
?>
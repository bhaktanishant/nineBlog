<?php
$dataArray['rePostContent'] = $dataArray['reTags'] = $dataArray['rePostTitle'] = $dataArray['postTitleError'] =
$dataArray['postContentError'] = $dataArray['tagsError'] = null;

class CreatePost{
	function ifLogin(){
		if(isset($_SESSION['username']) and isset($_SESSION['password']) and 
			!empty($_SESSION['username']) and !empty($_SESSION['password'])){
			return true;
		}else{
			return false;
		}
	}

	function insertIntoDatabase($postContent, $tags, $url, $postTitle){
		if ($GLOBALS['database']->insert('post', [
			'content' => $postContent,
			'tags' => $tags,
			'url' => $url,
			'heading' => $postTitle])) {
			return true;
		}else{
			return false;
		}
	}
}

$CreatePost = new CreatePost();

if ($CreatePost->ifLogin()) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['postTitle']) and !empty($_POST['postTitle'])) {
		$rawTitle = $dataArray['rePostTitle'] = htmlentities($_POST['postTitle']);
		if (strlen($rawTitle) > 100) {
			$dataArray['postTitleError'] = "Title can not have more than 50 character !";
		}elseif (strlen($rawTitle) < 3) {
			$dataArray['postTitleError'] = "Title can not be less than 3 character !";
		}else{
			$rawUrl = str_replace(" ", "-", $rawTitle);
			$url = str_replace("/", "", $rawUrl);
			$postTitle = ucfirst($rawTitle);
		}
	}else{
		$dataArray['postTitleError'] = "Please enter a title !";
	}
	if (isset($_POST['postContent']) and !empty($_POST['postContent'])) {
		$postContent = $dataArray['rePostContent'] = htmlentities($_POST['postContent']);
	}else{
		$dataArray['postContentError'] = "Please add some content in your blog !";
	}
	if (isset($_POST['tags']) and !empty($_POST['tags'])) {
		$rawTags = $dataArray['reTags'] = htmlentities($_POST['tags']);
		$tags = split(',', $rawTags);
	}else{
		$tags = null;
	}
	if (!empty($postTitle) and !empty($postContent)) {
		if ($CreatePost->insertIntoDatabase($postContent, $tags, $url, $postTitle)) {
			header("Location: /class/blog/post/".$url);
			exit();
		}
	}
}
}else{
	header('Location: /class/blog/admin-login/');
	exit();
}



?>
<?php


/**
* Getting post data.
*/
class Post{
	
	function getPost($url){
		if ($post = $GLOBALS['database']->get(
			'post', ['heading', 'content', 'date', 'tags', 'comments'],
			['url'=>$url])) {
			return $post;
		}else{
			return false;
		}
	}
}

$postClass = new Post();

if ($dataArray['post'] = $postClass->getPost($url)) {
	$dataArray['title'] = $dataArray['post']['heading']." :: Nishant's Blog";
}

?>
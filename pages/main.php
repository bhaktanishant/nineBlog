<?php 
$dataArray = array();

class mainPage{

	function totalPage(){
		if ($totalPost = $GLOBALS['database']->count('post')) {
			if (($totalPost%5) == 0){
				return ($totalPost/5);
			}else{
				return (int)($totalPost/5)+1;
			}
		}
	}

	function title($page_no){
		if ($page_no == 1) {
			return "Nishant's Blog";
		}else{
			return "Nishant's Blog :: Page - ".$page_no;
		}
	}

	function postList($page_no){
		if ($postList = $GLOBALS['database']->select('post', [
			'url', 'heading', 'content', 'date', 'comments', 'tags'], [
			"LIMIT" => [($page_no*5)-5, 5]
			])) {
			return $postList;
		}
	}
}

$mainPage = new mainPage();

if ($dataArray['postList'] = $mainPage->postList($page_no)) {
	$dataArray['title'] = $mainPage->title($page_no);
	$dataArray['totalPage'] = $mainPage->totalPage();
}


?>
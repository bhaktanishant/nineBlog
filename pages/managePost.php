<?php
$dataArray['postList'] = $dataArray['showPriviousAndFirstPage'] = 
$dataArray['showPriviousAndFirstPage'] = $dataArray['showNextAndLastPage'] = 
$dataArray['totalPost'] = $dataArray['postTo'] = $dataArray['postFrom'] =
$dataArray['showNextAndLastPage'] = $dataArray['nextPage'] = null;
$dataArray['postFound'] = false;

class ManagePost{

	function ifLogin(){
		if (isset($_SESSION['username']) and isset($_SESSION['password']) and
		 !empty($_SESSION['username']) and !empty($_SESSION['password'])) {
			return true;
		}else{
			return false;
		}
	}

	function postList($pageNo)	{
		if ($postList = $GLOBALS['database']->select('post', ['heading', 'url'], ['LIMIT' => [($pageNo*15)-15, 15]] )) {
			return $postList;
		}
	}

	function totalPage(){
		$totalPost = $GLOBALS['database']->count('post');
		if (($totalPost%5) == 0){
				return ($totalPost/15);
			}else{
				return (int)($totalPost/15)+1;
		}
	}
}

$managePost = new managePost();

if ($managePost->ifLogin()) {
	$dataArray['totalPost'] = $GLOBALS['database']->count('post');
	if (count($dataArray['postList'] = $managePost->postList($pageNo)) == 15) {
		$dataArray['postTo'] = $pageNo * count($dataArray['postList'] = $managePost->postList($pageNo));
	}else{
		$dataArray['postTo'] = $dataArray['totalPost'];
	}
	if ($dataArray['postTo'] == 0) {
		$dataArray['postFrom'] = 0;
	}else{
		$dataArray['postFrom'] = ($pageNo*15)-14;
	}
	if ($dataArray['postList']) {
		$dataArray['postFound'] = true;
	}
	if ($pageNo > 1) {
		$dataArray['showPriviousAndFirstPage'] = true;
		$dataArray['priviousPage'] = $pageNo-1;
	}else{
		$dataArray['showPriviousAndFirstPage'] = false;
	}
	if ($pageNo == ($dataArray['lastPageNo'] = $managePost->totalPage())) {
		$dataArray['showNextAndLastPage'] = false;
	}else{
		$dataArray['showNextAndLastPage'] = true;
		$dataArray['nextPage'] = $pageNo+1;
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['goToPage']) and !empty($_POST['goToPage'])) {
		if (is_numeric($_POST['goToPage'])) {
			header('Location: /class/blog/manage-post/'.$_POST['goToPage']);
			exit();
		}
	}
}else{
	header('Location: /class/blog/admin-login');
	exit();
}

?>
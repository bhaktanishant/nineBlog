<?php
require_once "slim/slim.php";
require_once 'medoo.php';
require_once 'Parsedown.php';
\slim\slim::registerAutoloader();
$database = new medoo();
$app = new \slim\slim();
$Parsedown = new Parsedown();

session_start();

$app->get(
	"/", function($page_no = 1) use ($app){
		require 'pages/main.php';
		$app->render('mainTemplate.php', $dataArray);
	});

$app->get(
	"/page/:page_no/", function($page_no) use ($app){
		if ($page_no == 1) {
			$app->redirect("/class/blog");
		}else{
			require 'pages/main.php';
			$app->render('mainTemplate.php', $dataArray);
		}
	});

$app->get(
	'/post/:url/', function($url) use ($app){
		require 'pages/postPage.php';
		$app->render('postTemplate.php', $dataArray);
	});

$app->map(
	"/admin-login/", function() use ($app){
		$dataArray['callFor'] = "login";
		require 'pages/loginRegistrationLogout.php';
		$dataArray['title'] = "Admin login :: Nishant's Blog";
		$app->render('loginTemplate.php', $dataArray);
	})->via('GET', 'POST');

$app->map(
	"/registration/", function() use ($app){
		$dataArray['callFor'] = "registration";
		require 'pages/loginRegistrationLogout.php';
		$dataArray['title'] = "Registration :: Nishant's Blog";
		$app->render('registrationTemplate.php', $dataArray);
	})->via('GET', 'POST');

$app->get(
	"/logout=yes", function() use ($app){
		$dataArray['callFor'] = "logout";
		require 'pages/loginRegistrationLogout.php';
		$app->redirect('/class/blog');
	});

$app->map(
	"/manage-post/:pageNo/", function($pageNo) use ($app){
		require 'pages/managePost.php';
		$dataArray['title'] = "manage Post :: Nishant's Blog";
		$app->render('managePostTemplate.php', $dataArray);
	})->via('GET', 'POST');

$app->map(
	"/create-new-post/", function() use($app){
		require 'pages/createPost.php';
		$dataArray['title'] = "Create new post :: Nishant's Blog";
		$app->render('createPostTemplate.php', $dataArray);
	})->via('GET', 'POST');

$app->get(
	"/deletepost/:postUrl", function($postUrl) use($app){
	require 'pages/deletePost.php';
	$app->render("managePostTemplate.php", $dataArray);
});

$app->run();
?>
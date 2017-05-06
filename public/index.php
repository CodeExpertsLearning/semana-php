<?php 

define('APP_ROOT', dirname(__DIR__));
define('HOME', 'http://symfonycasts.com.br');

require APP_ROOT . '/src/functions/connection.php';

$url = substr($_SERVER['REQUEST_URI'], 1);

$url = explode('/', $url);

if(isset($url[0]) 
	&& $url[0] == 'produto') {

	$slug = isset($url[1]) ? $url[1] : null;

	if(is_null($slug))
		die;

	$product = connection();

	$product = $product->prepare("SELECT * FROM products WHERE slug = :slug");

	$product->bindValue(':slug', $slug, PDO::PARAM_STR);

	$product->execute();

	$product = $product->fetch();

	require APP_ROOT . '/src/pages/produto.phtml';	
}

if(isset($url[0])
	&& $url[0] == '') {
	
	$products = connection();
	$products = $products->query('SELECT * FROM products');

	require APP_ROOT . '/src/pages/index.phtml';
}
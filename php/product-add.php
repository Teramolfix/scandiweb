<?php
	require_once './Database.php';
	require_once './Product.php';
	require_once './productTypes/Book.php';
	require_once './productTypes/DVD.php';
	require_once './productTypes/Furniture.php';

	$db = new Database();
	$conn = $db->getConnection();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$data = [
			'sku' => $_POST['sku'],
			'name' => $_POST['name'],
			'price' => $_POST['price'],
			'productType' => $_POST['productType'],
			'size' => $_POST['size'] ?? '',
			'weight' => $_POST['weight'] ?? '',
			'height' => $_POST['height'] ?? '',
			'width' => $_POST['width'] ?? '',
			'length' => $_POST['length'] ?? ''
		];

		$newProduct = Product::createProduct($data);
			
		if ($newProduct->productExist($conn, $newProduct->getSku()) == false) {
			$newProduct->save($conn);
		}
			
	}

	$conn->close();
	header("Location: ../");
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	
	<!-- CSS/JS -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">

	<link rel="shortcut icon" href="./images/favicon.svg" type="image/x-icon">
	<link rel="apple-touch-icon" href="./images/favicon.svg">
	<title>Scandiweb Junior Developer Test Task</title>
</head>
<body>
	<div id="main-container">
		<div id="header">
			<h1>Product List</h1>
			<div id="buttons">
				<button onclick="location.href='add-product/'">
					ADD
				</button>
				<button type="submit" form="product-delete_form" name="delete-btn" id="delete-product-btn">
					MASS DELETE
				</button>
			</div>
		</div>
		<div id="products__section">
			<form id="product-delete_form" action="./php/product-delete.php" method="POST">
				<?php
					require_once './php/Database.php';
					require_once './php/Product.php';
					require_once './php/productTypes/Book.php';
					require_once './php/productTypes/DVD.php';
					require_once './php/productTypes/Furniture.php';
					$db = new Database();
					$conn = $db->getConnection();

					$products = Product::fetchAll($conn);
					foreach ($products as $product) {
						echo "
							<div class='product'>
								<input type='checkbox' class='delete-checkbox' name='delete-checkbox[]' value='{$product->getSku()}'>
								<p>{$product->getSku()}</p>
								<p>{$product->getName()}</p>
								<p>{$product->getPrice(1)}$</p>
								<p>{$product->getAttribute()}</p>
							</div>
							";
					}
				?>
			</form>
		</div>
		<div id="footer">
			<h2>Scandiweb Test assignment</h2>
		</div>
	</div>
</body>
</html>
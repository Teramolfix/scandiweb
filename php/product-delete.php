<?php
	require_once './Database.php';
	require_once './Product.php';
	require_once './productTypes/Book.php';
	require_once './productTypes/DVD.php';
	require_once './productTypes/Furniture.php';

	$db = new Database();
	$conn = $db->getConnection();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-checkbox'])) {
			$productsToDelete = $_POST['delete-checkbox'];

			foreach ($productsToDelete as $sku) {
				$query = "SELECT * FROM products WHERE sku = ?";
				$stmt = $conn->prepare($query);
				$stmt->bind_param("s", $sku);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();

				if ($row) {
					$productType = $row['type'];
					$className = Product::$productTypes[$productType];
					$product = new $className($row['sku'], $row['name'], $row['price'], $row['type'], $row['attribute']);
					$product->delete($conn);
				}

				$stmt->close();
			}
    }
	}

	$conn->close();
	header("Location: ../");
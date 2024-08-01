<?php
	abstract class Product
	{
		public $sku;
		public $name;
		public $price;
		public $productType;
		public $attribute;

		abstract public function save($conn);
		abstract public static function calculateAttribute($data);

		public function __construct($sku, $name, $price, $productType, $attribute) {
			$this->sku = $sku;
			$this->name = $name;
			$this->price = $price;
			$this->productType = $productType;
			$this->attribute = $attribute;
		}

		public function getSku() {
			return $this->sku;
		}
		public function setSku($sku) {
			return $this->sku = $sku;
		}
		public function getName() {
			return $this->name;
		}
		public function setName($name) {
			return $this->name = $name;
		}
		public function getPrice($format = 0) {
			if ($format == 0) {
				return $this->price;
			} else {
				return number_format($this->price, 2,"."," ");
			}
		}
		public function setPrice($price) {
			return $this->price = $price;
		}
		public function getProductType() {
			return $this->productType;
		}
		public function setProductType($productType) {
			return $this->productType = $productType;
		}
		public function getAttribute() {
			return $this->attribute;
		}

		public static $productTypes = [
			'Book' => Book::class,
			'DVD' => DVD::class,
			'Furniture' => Furniture::class
		];

		public static function createProduct($data) {
			$sku = $data['sku'];
			$name = $data['name'];
			$price = $data['price'];
			$productType = $data['productType'];

			$className = self::$productTypes[$productType];
			$attribute = $className::calculateAttribute($data);

			return new $className($sku, $name, $price, $productType, $attribute);
		}

		private static function createProductFromRow($row) {
			$sku = $row['sku'];
			$name = $row['name'];
			$price = $row['price'];
			$productType = $row['type'];
			$attribute = $row['attribute'];

			$className = self::$productTypes[$productType];
			return new $className($sku, $name, $price, $productType, $attribute);
		}

		public static function fetchAll($conn) {
			$query = "SELECT * FROM products ORDER BY sku;";
			$result = $conn->query($query);

			$products = [];

			while ($row = $result->fetch_assoc()) {
				$products[] = self::createProductFromRow($row);
			}

			return $products;
		}

		public function delete($conn) {
			$query = "DELETE FROM products WHERE sku = ?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $this->sku);
			$stmt->execute();
		}

		public function productExist($conn, $sku) {
			$query = "SELECT COUNT(*) FROM products WHERE sku = ?;";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("s", $sku);
			$stmt->execute();
			$count = "1";
			$stmt->bind_result($count);
			$stmt->fetch();

			if ($count > 0) {
				return true;
			} else {
				return false;
			}
		}
	}
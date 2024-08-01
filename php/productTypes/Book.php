<?php

	class Book extends Product
	{
		public function __construct($sku, $name, $price, $productType, $attribute) {
			parent::__construct($sku, $name, $price, $productType, $attribute);
		}

		public function save($conn) {
			$query = "INSERT INTO products (sku, name, price, type, attribute) VALUES (?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($query);
			$sku = $this->getSku();
			$name = $this->getName();
			$price = $this->getPrice();
			$productType = $this->getProductType();
			$attribute = $this->getAttribute();
			$stmt->bind_param("ssdss", $sku, $name, $price, $productType, $attribute);
			$stmt->execute();
		}

		public static function calculateAttribute($data) {
			return "Weight: " . $data['weight'] . " KG";
		}
	}
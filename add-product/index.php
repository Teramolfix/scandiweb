<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<!-- ICON/Title -->
	<link rel="shortcut icon" href="./../images/favicon.svg" type="image/x-icon">
	<link rel="apple-touch-icon" href="./../images/favicon.svg">
	<title>Scandiweb Junior Developer Test Task</title>
</head>
<body>
	<div id="main-container">
		<div id="header">
			<h1>Product Add</h1>
			<div id="buttons">
				<button type="submit" form="product_form" name="save-btn">Save</button>
				<button onclick="location.href='../'">Cancel</button>
			</div>
		</div>
		<div id="product-add__main-block">
			<form id="product_form" action="../php/product-add.php" method="POST">
				<div>
					<label for="sku">SKU</label>
					<input type="text" id="sku" name="sku" title="SKU" required>
				</div>
				<div>
					<label for="name">Name</label>
					<input type="text" id="name" name="name" title="Name" required>
				</div>
				<div>
					<label for="price">Price</label>
					<input type="text" inputmode="numeric" maxlength="16" id="price" name="price" title="Price" pattern="[0-9]+" required>
				</div>
				<div>
					<label for="productType">Type Switcher</label>
					<select id="productType" name="productType">
						<option id="DVD">DVD</option>
						<option id="Book">Book</option>
						<option id="Furniture">Furniture</option>
					</select>
				</div>
				<div id="dvdBlock">
					<div>
						<label for="size">Size (MB)</label>
						<input type="text" inputmode="numeric" maxlength="16" id="size" name="size" title="Size" pattern="[0-9]+" value="" required>
					</div>
					<p>Please, provide size</p>
				</div>
				<div id="bookBlock">
					<div>
						<label for="weight">Weight (KG)</label>
						<input type="text" inputmode="numeric" maxlength="16" id="weight" name="weight" title="Weight" pattern="[0-9]+" value="">
					</div>
					<p>Please, provide weight</p>
				</div>
				<div id="furnitureBlock">
					<div>
						<label for="height">Height (CM)</label>
						<input type="text" inputmode="numeric" maxlength="16" id="height" name="height" title="Height" pattern="[0-9]+" value="">
					</div>
					<div>
						<label for="width">Width (CM)</label>
						<input type="text" inputmode="numeric" maxlength="16" id="width" name="width" title="Width" pattern="[0-9]+" value="">
					</div>
					<div>
						<label for="length">Length (CM)</label>
						<input type="text" inputmode="numeric" maxlength="16" id="length" name="length" title="Length" pattern="[0-9]+" value="">
					</div>
					<p>Please, provide dimensions</p>
				</div>
			</form>
		</div>
		<div id="footer">
			<h2>Scandiweb Test assignment</h2>
		</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="../js/typeSwitcher.js"></script>
	<script type="text/javascript" src="../js/inputValidation.js"></script>
</body>
</html>
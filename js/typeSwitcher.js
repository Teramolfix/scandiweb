const productType = document.querySelector("#productType");

productType.addEventListener('click', () => {
	if (productType.options[productType.selectedIndex].text == 'DVD') {
		document.getElementById("dvdBlock").style.display = "flex";
		document.getElementById("size").required = true;
		document.getElementById("bookBlock").style.display = "none";
		document.getElementById("weight").value = '';
		document.getElementById("weight").required = false;
		document.getElementById("furnitureBlock").style.display = "none";
		document.getElementById("height").value = '';
		document.getElementById("height").required = false;
		document.getElementById("width").value = '';
		document.getElementById("width").required = false;
		document.getElementById("length").value = '';
		document.getElementById("length").required = false;
	} else if (productType.options[productType.selectedIndex].text == 'Book') {
		document.getElementById("dvdBlock").style.display = "none";
		document.getElementById("size").value = '';
		document.getElementById("size").required = false;
		document.getElementById("bookBlock").style.display = "flex";
		document.getElementById("weight").required = true;
		document.getElementById("furnitureBlock").style.display = "none";
		document.getElementById("height").value = '';
		document.getElementById("height").required = false;
		document.getElementById("width").value = '';
		document.getElementById("width").required = false;
		document.getElementById("length").value = '';
		document.getElementById("length").required = false;
	} else {
		document.getElementById("dvdBlock").style.display = "none";
		document.getElementById("size").value = '';
		document.getElementById("size").required = false;
		document.getElementById("bookBlock").style.display = "none";
		document.getElementById("weight").value = '';
		document.getElementById("weight").required = false;
		document.getElementById("furnitureBlock").style.display = "flex";
	}
});
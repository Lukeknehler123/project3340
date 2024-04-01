<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class = "header">
	<div class = "header-content">
		<h1>Welcome to Our Store, <?php echo $user_data['firstname']; ?>!</h1>
		<a href="logout.php">Logout</a>
	</div>
</div>

<div id="product-list"></div>

<script src="products.js"></script>
<script src="cart.js"></script>
<script>
// You might place your products.js content here if not using an external file
let products = [
    { id: 1, name: "Product 1", image: "images/product1.jpg", price: 10 },
    // Add your product details here
];

function displayProducts() {
    const productList = document.getElementById("product-list");
    products.forEach(product => {
        let productEl = document.createElement("div");
        productEl.className = "product";
        productEl.innerHTML = `
            <h3>${product.name}</h3>
            <img src="${product.image}" alt="${product.name}" style="width: 100px; height: 100px;">
            <p>$${product.price}</p>
            <button onclick="addToCart(${product.id})">Add to Cart</button>
        `;
        productList.appendChild(productEl);
    });
}

window.onload = displayProducts;
</script>

</body>
</html>

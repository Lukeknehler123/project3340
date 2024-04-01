let products = [
    { id: 1, name: "Product 1", image: "images/4717.jpg", price: 156 },
    { id: 2, name: "Product 2", image: "images/4718.jpg", price: 567 },
    { id: 3, name: "Product 3", image: "images/4719.jpg", price: 150 },
    { id: 4, name: "Product 4", image: "images/4720.jpg", price: 160 },
    { id: 5, name: "Product 5", image: "images/4722.jpg", price: 1460 },   
    { id: 6, name: "Product 6", image: "images/4723.jpg", price: 40 },
    { id: 7, name: "Product 7", image: "images/4724.jpg", price: 170 },
    { id: 8, name: "Product 8", image: "images/5215.jpg", price: 20 },
    { id: 9, name: "Product 9", image: "images/5413.jpg", price: 50 },
    { id: 10, name: "Product 10", image: "images/5414.jpg", price: 1230 },
    { id: 11, name: "Product 11", image: "images/5416.jpg", price: 1560 },
    { id: 12, name: "Product 12", image: "images/5417.jpg", price: 140 },
    { id: 13, name: "Product 13", image: "images/5418.jpg", price: 550 },
    { id: 14, name: "Product 14", image: "images/5428.jpg", price: 330 },
    { id: 15, name: "Product 15", image: "images/5438.jpg", price: 20 },
    { id: 16, name: "Product 16", image: "images/5441.jpg", price: 140 },
    { id: 17, name: "Product 17", image: "images/5444.jpg", price: 432 },
    { id: 18, name: "Product 18", image: "images/5570.jpg", price: 1340 },
    { id: 19, name: "Product 19", image: "images/5575.jpg", price: 130 },
    { id: 20, name: "Product 20", image: "images/5581.jpg", price: 10 },


    // Include your 20 product objects here
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

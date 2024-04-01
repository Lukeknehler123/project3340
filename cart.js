function addToCart(productId) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let product = products.find(p => p.id === productId);
    if (!cart.some(item => item.id === productId)) {
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${product.name} added to cart`);
    } else {
        alert('This item is already in your cart');
    }
}

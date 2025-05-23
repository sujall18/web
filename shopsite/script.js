let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(productName, price) {
    cart.push({ product: productName, price: price });
    localStorage.setItem("cart", JSON.stringify(cart));
    alert(`${productName} added to cart!`);
}

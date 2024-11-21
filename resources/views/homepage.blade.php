<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">Coffee Shop</h1>
            <button id="cartBtn" class="relative">
                <img src="https://img.icons8.com/ios-filled/50/000000/shopping-cart.png" alt="Cart"
                    class="w-6 h-6" />
                <span id="cartCount"
                    class="absolute -top-2 -right-3 bg-red-500 text-white rounded-full text-xs px-2">0</span>
            </button>
        </div>
    </nav>

    <!-- Products -->
    <section class="container mx-auto mt-6 grid grid-cols-3 gap-4 px-6">
        <!-- Product Card -->
        <div class="bg-white p-4 shadow-md rounded-md">
            <img src="https://via.placeholder.com/150" alt="Coffee" class="w-full rounded-md" />
            <h2 class="text-lg font-semibold mt-2">Latte</h2>
            <p class="text-gray-600">$5.00</p>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 mt-3 rounded-md w-full addToCart"
                data-name="Latte" data-price="5" data-image="https://via.placeholder.com/150">
                Add to Cart
            </button>
        </div>
        <!-- Repeat similar product cards -->
    </section>

    <!-- Cart Drawer -->
    <div id="cartDrawer"
        class="fixed right-0 top-0 bg-white shadow-lg w-96 h-full transform translate-x-full transition-transform">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-bold">Your Cart</h2>
            <button id="closeCart" class="text-gray-600">X</button>
        </div>
        <div id="cartItems" class="p-4"></div>
        <div class="p-4 border-t">
            <button id="checkoutBtn" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 w-full">Proceed to
                Booking</button>
        </div>
    </div>

    <!-- Quantity & Instructions Modal -->
    <div id="quantityModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-md shadow-lg w-96">
            <h2 class="text-lg font-bold">Add to Cart</h2>
            <form id="quantityForm" class="space-y-4 mt-4">
                <div>
                    <label for="quantity" class="block text-sm font-medium">Quantity</label>
                    <input type="number" id="quantity" class="w-full border px-4 py-2 rounded-md" value="1"
                        min="1" required />
                </div>
                <div>
                    <label for="instructions" class="block text-sm font-medium">Special Instructions</label>
                    <textarea id="instructions" class="w-full border px-4 py-2 rounded-md"></textarea>
                </div>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 w-full">Add to
                    Cart</button>
            </form>
        </div>
    </div>

    <script>
        // Cart Data
        const cart = [];

        // Elements
        const cartBtn = document.getElementById('cartBtn');
        const cartDrawer = document.getElementById('cartDrawer');
        const closeCart = document.getElementById('closeCart');
        const cartItems = document.getElementById('cartItems');
        const cartCount = document.getElementById('cartCount');
        const checkoutBtn = document.getElementById('checkoutBtn');
        const quantityModal = document.getElementById('quantityModal');
        const quantityForm = document.getElementById('quantityForm');
        let selectedProduct = null;

        // Open/Close Cart Drawer
        cartBtn.addEventListener('click', () => cartDrawer.classList.toggle('translate-x-full'));
        closeCart.addEventListener('click', () => cartDrawer.classList.add('translate-x-full'));

        // Open Quantity Modal
        document.querySelectorAll('.addToCart').forEach(button => {
            button.addEventListener('click', () => {
                selectedProduct = {
                    name: button.dataset.name,
                    price: button.dataset.price,
                    image: button.dataset.image
                };
                quantityModal.classList.remove('hidden');
            });
        });

        // Add to Cart
        quantityForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const quantity = document.getElementById('quantity').value;
            const instructions = document.getElementById('instructions').value;
            cart.push({
                ...selectedProduct,
                quantity,
                instructions
            });
            cartCount.textContent = cart.length;
            quantityModal.classList.add('hidden');
            renderCart();
        });

        // Render Cart
        function renderCart() {
            cartItems.innerHTML = cart.map((item, index) => `
        <div class="flex items-center space-x-4 border-b py-2">
          <img src="${item.image}" alt="${item.name}" class="w-16 h-16 rounded-md" />
          <div class="flex-1">
            <p class="font-semibold">${item.name}</p>
            <p class="text-sm text-gray-600">Quantity: 
              <input type="number" class="border px-2 py-1 w-16 text-center rounded-md" 
                     value="${item.quantity}" min="1" data-index="${index}" />
            </p>
            <textarea class="border px-2 py-1 w-full mt-1 rounded-md text-sm" 
                      placeholder="Special Instructions" data-index="${index}">${item.instructions}</textarea>
          </div>
          <p class="font-semibold">$${item.price * item.quantity}</p>
        </div>
      `).join('');

            // Update Quantity & Instructions
            document.querySelectorAll('[data-index]').forEach(input => {
                input.addEventListener('change', (e) => {
                    const index = e.target.dataset.index;
                    if (e.target.type === 'number') cart[index].quantity = e.target.value;
                    if (e.target.tagName === 'TEXTAREA') cart[index].instructions = e.target.value;
                    renderCart();
                });
            });
        }

        // Proceed to Booking
        checkoutBtn.addEventListener('click', () => {
            window.location.href = 'booking';
        });
        checkoutBtn.addEventListener('click', () => {
            sessionStorage.setItem('cart', JSON.stringify(cart));
            window.location.href = 'booking';
        });
    </script>
</body>

</html>

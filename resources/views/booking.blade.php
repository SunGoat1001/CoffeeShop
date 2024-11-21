<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Booking Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-white shadow-md py-4 px-6">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-gray-800">Coffee Shop</h1>
    </div>
  </nav>

  <!-- Booking Form -->
  <section class="container mx-auto mt-8 px-6">
    <h2 class="text-2xl font-bold mb-4">Booking Information</h2>
    <form id="bookingForm" class="bg-white p-6 rounded-md shadow-md space-y-4">
      <div>
        <label for="name" class="block text-sm font-medium">Your Name</label>
        <input type="text" id="name" name="name" class="w-full border px-4 py-2 rounded-md" required />
      </div>
      <div>
        <label for="phone" class="block text-sm font-medium">Phone Number</label>
        <input type="tel" id="phone" name="phone" class="w-full border px-4 py-2 rounded-md" required />
      </div>
      <div>
        <label for="email" class="block text-sm font-medium">Email Address</label>
        <input type="email" id="email" name="email" class="w-full border px-4 py-2 rounded-md" required />
      </div>
      <div>
        <label for="address" class="block text-sm font-medium">Shipping Address</label>
        <input type="text" id="address" name="address" class="w-full border px-4 py-2 rounded-md" required />
      </div>
      <div>
        <label for="notes" class="block text-sm font-medium">Notes (Optional)</label>
        <textarea id="notes" name="notes" class="w-full border px-4 py-2 rounded-md"></textarea>
      </div>

      <h3 class="text-xl font-bold mt-6">Cart Summary</h3>
      <div id="cartSummary" class="bg-gray-50 p-4 rounded-md shadow-inner space-y-4">
        <!-- Cart items will be dynamically inserted here -->
      </div>

      <div class="mt-6">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 w-full rounded-md">Place Order</button>
      </div>
    </form>
  </section>

  <script>
    // Retrieve cart from local storage or session
    const cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Elements
    const cartSummary = document.getElementById('cartSummary');
    const bookingForm = document.getElementById('bookingForm');

    // Render Cart Summary
    function renderCartSummary() {
      if (cart.length === 0) {
        cartSummary.innerHTML = '<p class="text-gray-500">Your cart is empty.</p>';
      } else {
        cartSummary.innerHTML = cart.map(item => `
          <div class="flex items-center space-x-4">
            <img src="${item.image}" alt="${item.name}" class="w-16 h-16 rounded-md" />
            <div class="flex-1">
              <p class="font-semibold">${item.name}</p>
              <p class="text-sm text-gray-600">Quantity: ${item.quantity}</p>
              <p class="text-sm text-gray-600">Special Instructions: ${item.instructions || 'None'}</p>
            </div>
            <p class="font-semibold">$${item.price * item.quantity}</p>
          </div>
        `).join('');
      }
    }

    renderCartSummary();

    // Handle Form Submission
    bookingForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const bookingData = {
        name: document.getElementById('name').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        address: document.getElementById('address').value,
        notes: document.getElementById('notes').value,
        cart: cart
      };

      console.log('Booking Submitted:', bookingData);
      alert('Thank you! Your order has been placed.');

      // Clear session storage and redirect
      sessionStorage.removeItem('cart');
      window.location.href = '/'; // Redirect back to the home page
    });
  </script>
</body>
</html>

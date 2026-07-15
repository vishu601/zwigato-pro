<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Zwigato Pro</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans pb-12">

    <!-- Header / Navbar -->
    <nav class="bg-orange-500 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-black tracking-wider">ZWIGATO PRO</h1>
            <div class="flex items-center space-x-4">
                <span class="hidden md:inline font-bold">Welcome, {{ Auth::user()->name }}!</span>
                <!-- Logout Form -->
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-red-700 transition cursor-pointer">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 max-w-6xl">

        <!-- 1. Customer Profile Section Card -->
        <div class="bg-white p-6 rounded-2xl shadow-md mb-8 border-l-8 border-orange-500">
            <h2 class="text-xl font-black text-gray-800 mb-4 uppercase tracking-wider">👤 My Profile Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-3 bg-gray-50 rounded-xl">
                    <span class="block text-xs text-gray-400 font-bold uppercase">Name</span>
                    <span class="text-lg font-extrabold text-gray-700">{{ Auth::user()->name }}</span>
                </div>
                <div class="p-3 bg-gray-50 rounded-xl">
                    <span class="block text-xs text-gray-400 font-bold uppercase">Email Address</span>
                    <span class="text-lg font-extrabold text-gray-700">{{ Auth::user()->email }}</span>
                </div>
                <div class="p-3 bg-gray-50 rounded-xl">
                    <span class="block text-xs text-gray-400 font-bold uppercase">Phone Number</span>
                    <span class="text-lg font-extrabold text-gray-700">{{ Auth::user()->phone ?? 'Not Provided' }}</span>
                </div>
            </div>
        </div>

        <!-- 2. Fast Food Menu Section (DYNAMIC) -->
        <h2 class="text-3xl font-black text-gray-900 mb-6 uppercase tracking-wider flex items-center">🍔 Explore Delicious Menu</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-12">
            @foreach($items as $item)
            <div class="bg-white rounded-2xl shadow overflow-hidden hover:shadow-lg transition">
                <div class="bg-orange-100 h-48 flex items-center justify-center text-6xl">{{ $item->emoji }}</div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-bold text-gray-800">{{ $item->name }}</h3>
                        <span class="text-orange-500 font-black">₹{{ $item->price }}</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">{{ $item->description }}</p>
                    <button onclick="selectItem('{{ $item->name }}', {{ $item->price }})" class="w-full bg-orange-500 text-white py-3 rounded-xl font-bold hover:bg-orange-600 transition cursor-pointer">Order Now</button>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <!-- 3. Checkout Modal (Location and Booking Confirmation) -->
    <div id="order-modal" class="hidden fixed inset-0 bg-gray-900/60 flex items-center justify-center p-4 z-50">
        <div class="bg-white p-8 rounded-2xl w-full max-w-md relative shadow-2xl">
            <button onclick="toggleOrderModal()" class="absolute top-4 right-4 text-gray-500 font-bold text-xl cursor-pointer">✕</button>
            <h3 class="text-2xl font-extrabold text-gray-900 mb-2 text-center">Checkout</h3>
            <p id="modal-item-info" class="text-center text-orange-600 font-bold mb-6 text-lg"></p>

            <form action="/place-order" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="food_item" id="hidden-food-item">
                <input type="hidden" name="price" id="hidden-price">

                <div>
                    <label class="block text-sm font-bold text-gray-700">Enter Delivery Location Address</label>
                    <textarea name="delivery_location" required rows="3" class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500" placeholder="e.g. Ward No. 5, Near Baddi University, Baddi, HP"></textarea>
                </div>

                <button type="submit" class="w-full bg-green-500 text-white p-3 rounded-xl font-bold hover:bg-green-600 transition cursor-pointer">Confirm & Place Order</button>
            </form>
        </div>
    </div>

    <!-- JavaScript to Handle Checkout -->
    <script>
        function selectItem(name, price) {
            document.getElementById('hidden-food-item').value = name;
            document.getElementById('hidden-price').value = price;
            document.getElementById('modal-item-info').innerText = name + " - ₹" + price;
            toggleOrderModal();
        }

        function toggleOrderModal() {
            const modal = document.getElementById('order-modal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>
</html>

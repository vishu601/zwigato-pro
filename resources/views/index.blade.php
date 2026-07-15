<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zwigato Pro - Fast Food Delivery</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Header / Navbar -->
    <nav class="bg-orange-500 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-black tracking-wider">ZWIGATO PRO</h1>
            <div class="space-x-2">
                <button onclick="toggleModal('login-modal')" class="bg-white text-orange-600 px-4 py-2 rounded-lg font-bold shadow hover:bg-orange-100 transition cursor-pointer">Login</button>
                <button onclick="toggleModal('register-modal')" class="border-2 border-white px-4 py-2 rounded-lg font-bold hover:bg-white hover:text-orange-600 transition cursor-pointer">Register</button>
            </div>
        </div>
    </nav>

    <!-- Success Message Alert -->
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 text-center font-bold">
        {{ session('success') }}
    </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
    <div class="bg-red-500 text-white p-4 text-center font-bold">
        {{ $errors->first() }}
    </div>
    @endif

    <!-- Hero Section -->
    <div class="bg-orange-600 text-white text-center py-20 px-4">
        <h2 class="text-4xl md:text-6xl font-extrabold mb-4">Fastest Food Delivery in Your Town</h2>
        <p class="text-lg md:text-xl opacity-90 mb-8">Craving something delicious? Order now and track your delivery boy live!</p>
        <button onclick="toggleModal('register-modal')" class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-full text-lg font-black uppercase tracking-wide shadow-lg hover:bg-yellow-300 transition cursor-pointer">Get Started</button>
    </div>

    <!-- Registration Modal -->
    <div id="register-modal" class="hidden fixed inset-0 bg-gray-900/60 flex items-center justify-center p-4 z-50">
        <div class="bg-white p-8 rounded-2xl w-full max-w-md relative shadow-2xl">
            <button onclick="toggleModal('register-modal')" class="absolute top-4 right-4 text-gray-500 font-bold text-xl cursor-pointer">✕</button>
            <h3 class="text-2xl font-extrabold text-gray-900 mb-6 text-center">Create Customer Account</h3>

            <form action="/register" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700">Full Name</label>
                    <input type="text" name="name" required class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700">Email Address</label>
                    <input type="email" name="email" required class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700">Password</label>
                    <input type="password" name="password" required class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700">Phone Number</label>
                    <input type="text" name="phone" required class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500" placeholder="e.g. 9876543210">
                </div>
                <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-xl font-bold hover:bg-orange-600 transition cursor-pointer">Register Now</button>
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div id="login-modal" class="hidden fixed inset-0 bg-gray-900/60 flex items-center justify-center p-4 z-50">
        <div class="bg-white p-8 rounded-2xl w-full max-w-md relative shadow-2xl">
            <button onclick="toggleModal('login-modal')" class="absolute top-4 right-4 text-gray-500 font-bold text-xl cursor-pointer">✕</button>
            <h3 class="text-2xl font-extrabold text-gray-900 mb-6 text-center">Customer Login</h3>

            <form action="/login" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700">Email Address</label>
                    <input type="email" name="email" required class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700">Password</label>
                    <input type="password" name="password" required class="w-full mt-1 p-3 border rounded-xl focus:outline-orange-500">
                </div>
                <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-xl font-bold hover:bg-orange-600 transition cursor-pointer">Login</button>
            </form>
        </div>
    </div>

    <!-- Simple JS to handle modals -->
    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }
    </script>
</body>
</html>

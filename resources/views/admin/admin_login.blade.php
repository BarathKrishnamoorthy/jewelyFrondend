<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Background zoom animation */
    @keyframes zoom {
      0% { transform: scale(1); filter: brightness(0.8); }
      100% { transform: scale(1.1); filter: brightness(1); }
    }

    .bg-animated {
      animation: zoom 30s ease-in-out infinite alternate;
    }

    /* Gradient shift animation */
    @keyframes gradientShift {
      0% { background: rgba(0, 0, 0, 0.4); }
      50% { background: rgba(0, 0, 0, 0.6); }
      100% { background: rgba(0, 0, 0, 0.4); }
    }

    .gradient-overlay {
      animation: gradientShift 20s ease-in-out infinite alternate;
    }
  </style>
</head>
<body class="h-screen w-screen overflow-hidden relative font-sans">

  <!-- Background image with animation -->
  <div class="absolute inset-0 z-0 bg-cover bg-center bg-animated" style="background-image: url('/images/golds.jpg');"></div>

  <!-- Gradient overlay -->
  <div class="absolute inset-0 z-10 gradient-overlay bg-black bg-opacity-50"></div>

  <!-- Login card container -->
  <div class="relative z-20 flex items-center justify-center h-full px-4">
    <div class="bg-white bg-opacity-20 backdrop-blur-lg shadow-2xl rounded-xl p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold text-center text-black-800 mb-6">Admin Login</h2>

      <!-- Flash success message -->
      @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('admin.doLogin') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-black-700 font-semibold mb-1">Email Address</label>
          <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none @error('email') border-red-500 @enderror"
            placeholder="you@example.com"
            required
          />
          @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password" class="block text-black-700 font-semibold mb-1">Password</label>
          <input
            type="password"
            name="password"
            id="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none @error('password') border-red-500 @enderror"
            placeholder="Enter your password"
            required
          />
          @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
          Login
        </button>
      </form>
    </div>
  </div>
</body>
</html>

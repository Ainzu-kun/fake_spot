<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts: Inter + Orbitron -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Orbitron:wght@700&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .designer-font {
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center relative">

        <!-- Background Image -->
        <img src="{{ asset('assets/img/Arisu.png') }}" alt="Background"
            class="fixed inset-0 w-full h-full object-cover -z-20" />

        <!-- Overlay Gelap -->
        <div class="fixed inset-0 bg-black bg-opacity-60 -z-10"></div>

        <!-- Login Form -->
        <form action="{{ route('auth.authorization') }}" method="POST"
            class="bg-white/10 backdrop-blur-md rounded-2xl p-8 w-full max-w-sm shadow-xl text-white">
            @csrf

            <h1 class="text-2xl font-extrabold mb-1 text-center">
                Welcome to <span class="designer-font">FAKESPOT</span>
            </h1>
            <p class="text-sm text-center text-white mb-6">Please enter your account details</p>

            <!-- Username -->
            <label for="username" class="text-sm mb-1 block">Username</label>
            <div class="flex items-center mb-4 w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2">
                <i class="fas fa-user text-white"></i>
                <input id="username" type="text" name="username"
                    class="ml-3 w-full bg-transparent outline-none placeholder:text-gray-300"
                    placeholder="Ainz Ooal Gown" />
            </div>
            @error('username')
                <div class="text-red-400 text-sm mb-4">{{ $message }}</div>
            @enderror

            <!-- Password -->
            <label for="password" class="text-sm mb-1 block">Password</label>
            <div class="flex items-center mb-6 w-full bg-white/10 border border-white/20 rounded-lg px-3 py-2">
                <i class="fas fa-lock text-white text-lg mr-3"></i>
                <input id="password" type="password" name="password"
                    class="w-full bg-transparent outline-none placeholder:text-gray-300" placeholder="" />
                <i class="fas fa-eye-slash text-white text-lg cursor-pointer" id="togglePassword"></i>
            </div>
            @error('password')
                <div class="text-red-400 text-sm mb-4">{{ $message }}</div>
            @enderror

            <!-- Submit -->
            <button type="submit"
                class="bg-black text-white rounded-full w-full py-3 text-base font-semibold hover:bg-gray-800 transition duration-300 ease-in-out">
                Submit
            </button>

            <!-- Register -->
            <p class="mt-6 text-xs text-center text-white">
                Don’t have an account?
                <a href="{{ route('auth.register') }}" class="text-blue-400 hover:underline">Register</a>
            </p>
        </form>
    </div>

    <!-- Password Toggle Script -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>

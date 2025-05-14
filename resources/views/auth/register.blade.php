<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Register</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Google Font: Orbiton -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Orbitron:wght@700&display=swap"
        rel="stylesheet" />

    <style>
        body {
            font-family: "inter", sans-serif;
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

        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-60 -z-10"></div>

        <!-- Form -->
        <form action="{{ route('auth.store') }}" method="POST" class="z-10 w-full max-w-sm">
            @csrf
            <div class="my-12 bg-black/10 backdrop-blur-md rounded-xl p-6 shadow-xl">
                <h1 class="text-2xl font-extrabold mb-1 text-center text-white">
                    Welcome to <span class="designer-font">FAKESPOT</span>
                </h1>
                <p class="text-sm text-center text-white mb-6">Please enter your account details</p>

                <!-- Name -->
                <label class="block text-sm text-white mb-1" for="name">Name</label>
                <div class="flex items-center bg-white/20 border border-white rounded-lg px-4 py-2 mb-4">
                    <i class="fas fa-user text-white mr-3"></i>
                    <input name="nama" type="text" placeholder="Ainz Ooal Gown"
                        class="w-full bg-transparent outline-none text-white placeholder:text-gray-300" />
                </div>

                <!-- Email -->
                <label class="block text-sm text-white mb-1" for="email">Email</label>
                <div class="flex items-center bg-white/20 border border-white rounded-lg px-4 py-2 mb-4">
                    <i class="fas fa-envelope text-white mr-3"></i>
                    <input name="email" type="email" placeholder="email@example.com"
                        class="w-full bg-transparent outline-none text-white placeholder:text-gray-300" />
                </div>

                <!-- Username -->
                <label class="block text-sm text-white mb-1" for="username">Username</label>
                <div class="flex items-center bg-white/20 border border-white rounded-lg px-4 py-2 mb-4">
                    <i class="fas fa-user text-white mr-3"></i>
                    <input name="username" type="text" placeholder="your username"
                        class="w-full bg-transparent outline-none text-white placeholder:text-gray-300" />
                </div>

                <!-- Gender -->
                <label class="block text-sm mb-1 text-white" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="flex items-center bg-white/20 border border-white rounded-lg px-4 py-2 mb-5">
                    <i class="fas fa-venus-mars text-white text-lg mr-3"></i>
                    <select name="jenis_kelamin"
                        class="w-full outline-none text-white bg-transparent placeholder:text-white">
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option class="text-black" value="L">Laki-laki</option>
                        <option class="text-black" value="P">Perempuan</option>
                    </select>
                </div>

                <!-- Password -->
                <label class="block text-sm text-white mb-1" for="password">Password</label>
                <div class="flex items-center bg-white/20 border border-white rounded-lg px-4 py-2 mb-4">
                    <i class="fas fa-lock text-white mr-3"></i>
                    <input id="password" name="password" type="password" placeholder="Password"
                        class="w-full bg-transparent outline-none text-white placeholder:text-gray-300" />
                    <i class="fas fa-eye-slash text-white cursor-pointer" id="togglePassword"></i>
                </div>

                <!-- Confirm Password -->
                <label class="block text-sm text-white mb-1" for="confirm_password">Confirm Password</label>
                <div class="flex items-center bg-white/20 border border-white rounded-lg px-4 py-2 mb-6">
                    <i class="fas fa-lock text-white mr-3"></i>
                    <input id="confirm_password" name="password_confirmation" type="password"
                        placeholder="Confirm Password"
                        class="w-full bg-transparent outline-none text-white placeholder:text-gray-300" />
                    <i class="fas fa-eye-slash text-white cursor-pointer" id="toggleConfirmPassword"></i>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-full font-semibold hover:bg-gray-800 transition duration-300 ease-in-out">
                    Submit
                </button>

                <!-- Login link -->
                <p class="text-center text-sm text-white mt-6">
                    Do you have an account?
                    <a href="{{ route('auth.login') }}" class="text-blue-300 hover:underline">Login</a>
                </p>
            </div>
        </form>
    </div>

    <!-- Password Toggle Script -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPasswordInput = document.querySelector('#confirm_password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', () => {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            toggleConfirmPassword.classList.toggle('fa-eye');
            toggleConfirmPassword.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>

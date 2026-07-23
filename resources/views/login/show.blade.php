<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - BDE Events</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/your-kit.js" crossorigin="anonymous"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-orange-50 via-white to-orange-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-2xl rounded-3xl p-8">

        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-r from-blue-600 to-purple-600 flex items-center justify-center mb-4">
                <i class="fa-solid fa-user text-white text-3xl"></i>
            </div>

            <h2 class="text-3xl font-bold text-gray-800">
                Connexion
            </h2>

            <p class="text-gray-500 mt-2">
                Connectez-vous à votre compte
            </p>
        </div>

        <form method="POST" action="{{ route('login.store') }}">

            @csrf

            <!-- Email -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Adresse Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="amine@gmail.com"
                    required>

                @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

            <!-- Password -->
            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Mot de passe
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"
                    placeholder="********"
                    required>

                @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

            </div>

       <div class="mb-5">
            <label class="block mb-2 font-medium">Rôle</label>

        <select
        name="role_user"
        class="w-full border rounded-xl px-4 py-3">

            <option value="etudiant">Étudiant</option>
            <option value="admin">Admin</option>

        </select>
                @error('role_user')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror

       </div>



            <!-- Remember -->
            <div class="flex justify-between items-center mb-6">

                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>

                <a href="#" class="text-blue-600 text-sm hover:underline">
                    Mot de passe oublié ?
                </a>

            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold">

                Se connecter

            </button>

        </form>

        <p class="text-center mt-6 text-gray-600">

            Vous n'avez pas de compte ?

            <a href=""
               class="text-blue-600 font-semibold hover:underline">

                Créer un compte

            </a>

        </p>


 </div>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-black/50 text-white p-4 flex justify-between">

    <h1 class="text-2xl font-bold">
        Dashboard Étudiant
    </h1>

    <div>
        {{ Auth::user()->name }}
    </div>

</nav>

<div class="p-8">

    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-3xl font-bold mb-4">
            Bienvenue {{ Auth::user()->name }}
        </h2>

        <p class="text-gray-600 mb-6">
            Vous êtes connecté avec succès.
        </p>

        <div class="space-y-2">

            <p>
                <strong>Email :</strong>
                {{ Auth::user()->email }}
            </p>

            <p>
                <strong>Rôle :</strong>
                {{ Auth::user()->role_user }}
            </p>

        </div>

    </div>

</div>

</body>
</html>

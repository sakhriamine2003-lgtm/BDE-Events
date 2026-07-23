<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-black/50 text-white p-4 flex justify-between">
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>

    <div>
        Bienvenue {{ Auth::user()->name }}
    </div>
</nav>

<div class="p-8">

    <h2 class="text-3xl font-bold mb-8">
        Bonjour Admin : {{Auth::user()->name }}
    </h2>

    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500">Utilisateurs</h3>
            <p class="text-4xl font-bold">{{ App\Models\User::count() }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500">Étudiants</h3>
            <p class="text-4xl font-bold">
                {{ App\Models\User::where('role_user','Etudiant')->count() }}
            </p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500">Administrateurs</h3>
            <p class="text-4xl font-bold">
                {{ App\Models\User::where('role_user','Admin')->count() }}
            </p>
        </div>

        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-gray-500">Mon rôle</h3>
            <p class="text-2xl font-bold text-blue-600">
                {{ Auth::user()->role_user }}
            </p>
        </div>
        <div>
            <a href="{{route('Evenement')}}">Cree Event</a>
            <a class="mx-12" href="{{route('AfficherEvenement')}}">voir les evenement</a>
        </div>

    </div>

</div>

</body>
</html>

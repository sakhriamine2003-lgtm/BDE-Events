<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Événements</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-3xl font-bold text-center text-indigo-600 mb-6">
            Liste des Événements
        </h2>

        <a href="@if (auth()->user()->role_user == 'Admin') {{ url('/Admin') }} @elseif (auth()->user()->role_user == 'Etudiant') {{ url('/Etudiant') }} @endif" class="inline-block mb-4 text-indigo-600 hover:underline font-semibold">
            &larr; Retour
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="py-3 px-4 border">ID</th>
                        <th class="py-3 px-4 border">Titre</th>
                        <th class="py-3 px-4 border">Date</th>
                        <th class="py-3 px-4 border">Heure</th>
                        <th class="py-3 px-4 border">Lieu</th>
                        <th class="py-3 px-4 border">Prix</th>
                        <th class="py-3 px-4 border">Places</th>
                        <th class="py-3 px-4 border">Les places réservées</th>
                        <th class="py-3 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($Evenement as $ev)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">{{ $ev->id }}</td>
                            <td class="border px-4 py-2">{{ $ev->title }}</td>
                            <td class="border px-4 py-2">{{ $ev->date }}</td>
                            <td class="border px-4 py-2">{{ $ev->heure }}</td>
                            <td class="border px-4 py-2">{{ $ev->Lieu }}</td>
                            <td class="border px-4 py-2">{{ $ev->Prix }}</td>
                            <td class="border px-4 py-2">{{ $ev->maxPlaces }}</td>
                            <td class="border px-4 py-2">1</td>

                            <td class="border px-4 py-2 space-x-2">
                                @if(Auth::user()->role_user == 'Admin')
                                    <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 inline-block">
                                        Modifier
                                    </a>


                                    <form action="{{ route('SupprimerEvent', $ev->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet événement ?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Supprimer
                                        </button>
                                    </form>
                                @else
                                    <!-- Action pour Étudiant (Exemple: Réservation) -->
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                            Réservation
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

</body>
</html>

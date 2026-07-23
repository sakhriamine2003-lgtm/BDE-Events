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
        <a href="{{'Admin'}}">router</a>


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
                        <th class="py-3 px-4 border">Actions</th>
                    </tr>
                </thead>
  @foreach ($Evenement as $ev )
                <tbody class="text-center">
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{$ev->id}}</td>
                        <td class="border px-4 py-2">{{$ev->title}}</td>
                        <td class="border px-4 py-2">{{$ev->date}}</td>
                        <td class="border px-4 py-2">{{$ev->heure}}</td>
                        <td class="border px-4 py-2">{{$ev->Lieu}}</td>
                        <td class="border px-4 py-2">{{$ev->Prix}}</td>
                        <td class="border px-4 py-2">{{$ev->maxPlaces}}</td>
                        <td class="border px-4 py-2 space-x-2">

                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Modifier
                            </button>

                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Supprimer
                            </button>
                        </td>
                        @endforeach
                    </tr>
                </td>
                    </tr>

                </tbody>

            </table>
        </div>

    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Événement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white w-full max-w-2xl p-8 rounded-2xl shadow-lg">

        <h2 class="text-3xl font-bold text-center text-indigo-600 mb-8">
            Ajouter un Événement
        </h2>

        <form action="/evenements" method="POST" class="space-y-5">

            <!-- @csrf -->

            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    Titre
                </label>
                <input
                    type="text"
                    name="title"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Titre de l'événement"
                    required>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        Date
                    </label>
                    <input
                        type="date"
                        name="date"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        Heure
                    </label>
                    <input
                        type="time"
                        name="heure"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">
                    Lieu
                </label>
                <input
                    type="text"
                    name="lieu"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Ex : ENAA Béni Mellal"
                    required>
            </div>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        Prix (DH)
                    </label>
                    <input
                        type="number"
                        name="prix"
                        min="0"
                        step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500"
                        placeholder="0"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">
                        Places Maximum
                    </label>
                    <input
                        type="number"
                        name="maxPlaces"
                        min="1"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500"
                        placeholder="100"
                        required>
                </div>

            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300">
                Ajouter l'événement
            </button>

        </form>

    </div>

</body>
</html>

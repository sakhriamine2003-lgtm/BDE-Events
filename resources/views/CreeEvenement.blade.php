<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Événement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 antialiased text-slate-800">

    <div class="bg-white w-full max-w-2xl p-6 sm:p-10 rounded-2xl shadow-xl border border-slate-200/80">

        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl mb-3">
                📅
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Ajouter un Événement
            </h2>
            <p class="text-slate-500 text-sm mt-1">Remplissez les détails ci-dessous pour publier un nouvel événement.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('createEvenement') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Titre -->
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                    Titre de l'événement
                </label>
                <input type="text" name="title"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                    placeholder="Ex: Conférence Tech 2026" required>
            </div>

            <!-- Date et Heure -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                        Date
                    </label>
                    <input type="date" name="date"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                        required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                        Heure
                    </label>
                    <input type="time" name="heure"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                        required>
                </div>

            </div>

            <!-- Lieu -->
            <div>
                <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                    Lieu
                </label>
                <input type="text" name="lieu"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                    placeholder="Ex : ENAA Béni Mellal" required>
            </div>

            <!-- Prix et Places -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                        Prix (DH)
                    </label>
                    <input type="number" name="prix" min="0" step="0.01"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                        placeholder="0.00" required>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-2">
                        Places Maximum
                    </label>
                    <input type="number" name="maxPlaces" min="1"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200"
                        placeholder="100" required>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold py-3.5 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
                    ➕ Ajouter l'événement
                </button>
            </div>

        </form>

    </div>

</body>

</html>

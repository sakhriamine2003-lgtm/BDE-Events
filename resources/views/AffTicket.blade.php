<script src="https://cdn.tailwindcss.com"></script>

<script>
    window.print();
</script>

@foreach ($reservations as $reservation)
    <div
        class="max-w-md mx-auto my-6 bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden relative group hover:shadow-xl transition-shadow duration-300">

        <!-- En-tête du billet -->
        <div class="bg-gradient-to-r from-indigo-600 to-violet-600 p-5 text-white relative">
            <div class="flex justify-between items-start">
                <div>
                    <span
                        class="inline-block px-2.5 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider text-white mb-2">
                        Billet d'entrée
                    </span>
                    <h2 class="text-xl font-bold leading-tight drop-shadow-sm">
                        {{ $reservation->evenement->title }}
                    </h2>
                </div>
            </div>
        </div>

        <!-- Section Détails -->
        <div class="p-5 space-y-4 text-slate-700">
            <!-- Étudiant & Numéro -->
            <div class="grid grid-cols-2 gap-4 pb-3 border-b border-slate-100">
                <div>
                    <p class="text-xs uppercase tracking-wider text-slate-400 font-medium">Étudiant</p>
                    <p class="font-semibold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                </div>
                <div>

                    <p class="font-mono font-semibold text-indigo-600">
                        {{ $reservation->evenement->id . '_' . $reservation->evenement->date . '_' . $reservation->evenement->heure . '_' . $reservation->evenement->lieu }}
                    </p>
                </div>
            </div>

            <!-- Date, Heure & Lieu -->
            <div class="grid grid-cols-3 gap-2 text-sm">
                <div>
                    <p class="text-xs text-slate-400 font-medium">Date</p>
                    <p class="font-medium text-slate-800">{{ $reservation->evenement->date }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 font-medium">Heure</p>
                    <p class="font-medium text-slate-800">{{ $reservation->evenement->heure }}</p>
                </div>
                <div>
                    <p class="text-xs text-slate-400 font-medium">Lieu</p>
                    <p class="font-medium text-slate-800 truncate" title="{{ $reservation->evenement->lieu }}">
                        {{ $reservation->evenement->lieu }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Ligne de séparation style ticket avec encoches -->
        <div class="relative flex items-center my-1">
            <div class="w-4 h-8 bg-gray-100 rounded-r-full border-r border-t border-b border-slate-200 -ml-1"></div>
            <div class="flex-1 border-b-2 border-dashed border-slate-200 mx-2"></div>
            <div class="w-4 h-8 bg-gray-100 rounded-l-full border-l border-t border-b border-slate-200 -mr-1"></div>
        </div>

        <!-- Pied du billet (Code-barres / Validation) -->
        <div class="px-5 pb-5 pt-2 bg-slate-50 flex items-center justify-between">
            <div class="flex items-center space-x-1">
                <!-- Décoration style Code-barres -->
                <div class="flex space-x-0.5 opacity-70">
                    <div class="w-1 h-8 bg-slate-800"></div>
                    <div class="w-0.5 h-8 bg-slate-800"></div>
                    <div class="w-1.5 h-8 bg-slate-800"></div>
                    <div class="w-0.5 h-8 bg-slate-800"></div>
                    <div class="w-1 h-8 bg-slate-800"></div>
                    <div class="w-2 h-8 bg-slate-800"></div>
                    <div class="w-0.5 h-8 bg-slate-800"></div>
                </div>
                <span class="text-[10px] text-slate-400 font-mono ml-2">PASS-VALIDE</span>
            </div>
            <span
                class="inline-flex items-center text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                Confirmé
            </span>
        </div>

    </div>
@endforeach

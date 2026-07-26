<script src="https://cdn.tailwindcss.com"></script>

<div class="max-w-5xl mx-auto mt-10 px-4 mb-12">

    <!-- Section Title -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">
            🎟️ Mes Billets & Pass Étudiant
        </h2>
        <p class="text-gray-500 mt-2 text-sm">
            Retrouvez ici tous vos pass numériques d'accès aux événements.
        </p>
    </div>

    <!-- Student Header Summary -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl p-6 shadow-md mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <span class="text-xs font-semibold uppercase tracking-wider text-indigo-200">Étudiant Connecté</span>
            <h3 class="text-2xl font-bold">{{ Auth::user()->nom ?? Auth::user()->name }}</h3>
            <p class="text-indigo-100 text-sm opacity-90">{{ Auth::user()->email }}</p>
        </div>
        <div class="bg-white/10 backdrop-blur-md px-4 py-2 rounded-xl border border-white/20 text-center">
            <span class="block text-2xl font-black">{{ Auth::user()->reservations->count() }}</span>
            <span class="text-xs uppercase text-indigo-200 font-medium">Réservation(s)</span>
        </div>
    </div>

    <!-- Tickets Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse (Auth::user()->reservations as $reservation)
            <!-- Ticket Card -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col justify-between relative">

                <!-- Ticket Top Decorator Header -->
                <div class="bg-indigo-600 text-white p-4 flex justify-between items-center border-b border-indigo-500">
                    <div class="flex items-center space-x-2">
                        <span class="bg-white text-indigo-600 p-1.5 rounded-lg text-xs font-bold">BDE PASS</span>
                        <span class="text-xs font-semibold text-indigo-200 uppercase tracking-wider">Événement BDE</span>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        ● Valide
                    </span>
                </div>

                <!-- Ticket Content -->
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-900 mb-4 line-clamp-1">
                        {{$reservation->Evenement->title }}
                    </h4>

                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-6">
                        <div class="flex items-center space-x-2">
                            <span class="text-indigo-500">📅</span>
                            <div>
                                <p class="text-xs text-gray-400 font-medium uppercase">Date</p>
                                <p class="font-semibold text-gray-800">{{ $reservation->Evenement->date }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <span class="text-indigo-500">⏰</span>
                            <div>
                                <p class="text-xs text-gray-400 font-medium uppercase">Heure</p>
                                <p class="font-semibold text-gray-800">{{ $reservation->Evenement->heure }}</p>
                            </div>
                        </div>

                        <div class="col-span-2 flex items-center space-x-2">
                            <span class="text-indigo-500">📍</span>
                            <div>
                                <p class="text-xs text-gray-400 font-medium uppercase">Lieu</p>
                                <p class="font-semibold text-gray-800">{{ $reservation->Evenement->lieu }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Unique Ticket Number / Barcode Style Section -->
                    <div class="bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl p-4 text-center relative">
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold mb-1">
                            N° de Réservation Unique
                        </p>
                        <p class="font-mono text-sm font-bold text-indigo-600 tracking-wider select-all">
                            {{ $reservation->id_reservation }}
                        </p>
                    </div>
                </div>

                <!-- Visual Ticket Cutouts (Side Notches) -->
                <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 w-5 h-5 bg-gray-100 rounded-full border-r border-gray-200"></div>
                <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 w-5 h-5 bg-gray-100 rounded-full border-l border-gray-200"></div>

            </div>
        @empty
            <!-- Empty State -->
            <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm">
                <div class="text-5xl mb-4">🎟️</div>
                <h3 class="text-lg font-bold text-gray-700">Aucun pass disponible</h3>
                <p class="text-gray-500 text-sm mt-1">Vous n'avez effectué aucune réservation pour le moment.</p>
            </div>
        @endforelse

    </div>

</div>

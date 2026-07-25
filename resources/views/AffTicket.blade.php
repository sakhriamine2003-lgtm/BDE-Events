<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billets d'entrée</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles spécifiques à l'impression -->
    <style>
        @media print {
            body {
                background-color: #ffffff !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .no-print {
                display: none !important;
            }
            .ticket-card {
                break-inside: avoid;
                page-break-after: always;
                box-shadow: none !important;
                border: 1px solid #e2e8f0 !important;
            }
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen py-8 print:py-0 print:bg-white">

    <!-- Bouton d'impression manuel (Masqué à l'impression) -->
    <div class="max-w-md mx-auto mb-6 text-center no-print">
        <button onclick="window.print()"
                class="inline-flex items-center justify-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg shadow transition duration-200 gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Imprimer les billets
        </button>
    </div>

    <!-- Boucle des réservations -->
    @foreach ($reservations as $reservation)
        @php
            // Génération d'une référence unique pour le ticket
            $ticketRef = 'EVT-' . ($reservation->evenement->id ?? '0') . '-' . ($reservation->id ?? rand(1000, 9999));
        @endphp

        <div class="ticket-card max-w-md mx-auto my-6 bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden relative">

            <!-- En-tête du billet -->
            <div class="bg-gradient-to-r from-indigo-600 to-violet-600 p-5 text-white relative">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="inline-block px-2.5 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider text-white mb-2">
                            Billet d'entrée
                        </span>
                        <h2 class="text-xl font-bold leading-tight text-white drop-shadow-sm">
                            {{ $reservation->evenement->title ?? 'Titre de l\'événement' }}
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Section Détails -->
            <div class="p-5 space-y-4 text-slate-700">
                <!-- Étudiant & Référence -->
                <div class="grid grid-cols-2 gap-4 pb-3 border-b border-slate-100">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-slate-400 font-medium">Étudiant</p>
                        <p class="font-semibold text-slate-800 truncate">{{ Auth::user()->name ?? 'Nom de l\'étudiant' }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-wider text-slate-400 font-medium">Référence</p>
                        <p class="font-mono font-semibold text-indigo-600 text-sm truncate" title="{{ $ticketRef }}">
                            {{ $ticketRef }}
                        </p>
                    </div>
                </div>

                <!-- Date, Heure & Lieu -->
                <div class="grid grid-cols-3 gap-2 text-sm">
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Date</p>
                        <p class="font-medium text-slate-800">{{ $reservation->evenement->date ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Heure</p>
                        <p class="font-medium text-slate-800">{{ $reservation->evenement->heure ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Lieu</p>
                        <p class="font-medium text-slate-800 truncate" title="{{ $reservation->evenement->lieu ?? 'N/A' }}">
                            {{ $reservation->evenement->lieu ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ligne de séparation style ticket avec encoches -->
            <div class="relative flex items-center my-1">
                <div class="w-4 h-8 bg-slate-100 print:bg-white rounded-r-full border-r border-t border-b border-slate-200 -ml-1"></div>
                <div class="flex-1 border-b-2 border-dashed border-slate-200 mx-2"></div>
                <div class="w-4 h-8 bg-slate-100 print:bg-white rounded-l-full border-l border-t border-b border-slate-200 -mr-1"></div>
            </div>

            <!-- Pied du billet (Code QR / Validation) -->
            <div class="px-5 pb-5 pt-2 bg-slate-50 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <!-- Génération de QR Code dynamique via API (Remplace par QrCode::generate() si vous utilisez simplesoftwareio/simple-qrcode) -->
                    <div class="w-12 h-12 bg-white p-1 rounded border border-slate-200">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($ticketRef) }}"
                             alt="QR Code"
                             class="w-full h-full object-contain">
                    </div>
                    <div>
                        <span class="block text-[10px] text-slate-400 font-mono">CODE-BILLET</span>
                        <span class="text-xs font-mono font-bold text-slate-700">{{ $ticketRef }}</span>
                    </div>
                </div>

                <span class="inline-flex items-center text-xs font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                    Confirmé
                </span>
            </div>

        </div>
    @endforeach

    <!-- Auto-impression au chargement -->
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            // Décommenter si vous souhaitez le déclenchement automatique
            // window.print();
        });
    </script>
</body>
</html>

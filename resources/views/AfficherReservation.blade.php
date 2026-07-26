<!-- Title -->
<h4 class="text-xl font-bold text-gray-900 mb-4 line-clamp-1">
    {{ $reservation->evenement?->title ?? 'Événement supprimé' }}
</h4>

<!-- Date -->
<p class="font-semibold text-gray-800">
    {{ $reservation->evenement?->date ?? 'Non spécifiée' }}
</p>

<!-- Time -->
<p class="font-semibold text-gray-800">
    {{ $reservation->evenement?->heure ?? 'Non spécifiée' }}
</p>

<!-- Location -->
<p class="font-semibold text-gray-800">
    {{ $reservation->evenement?->lieu ?? 'Non spécifié' }}
</p>

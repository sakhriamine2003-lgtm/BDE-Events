    <script src="https://cdn.tailwindcss.com"></script>

    <div class="max-w-5xl mx-auto mt-10 px-4">

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
            📅 Mes Réservations
        </h2>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            <div class="bg-indigo-600 text-white p-6">
                <h4 class="text-xl font-semibold">{{ Auth::user()->name }}</h4>
                <small class="text-indigo-200 text-sm">{{ Auth::user()->email }}</small>
            </div>


            <div class="p-6 overflow-x-auto">
                <table class="w-full border-collapse text-center">
                    <thead>
                        <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                            <th class="py-3 px-4 border-b border-gray-700">#</th>
                            <th class="py-3 px-4 border-b border-gray-700">Événement</th>
                            <th class="py-3 px-4 border-b border-gray-700">Date</th>
                            <th class="py-3 px-4 border-b border-gray-700">Heure</th>
                            <th class="py-3 px-4 border-b border-gray-700">Lieu</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-700 text-sm">
                        @php $i = 1; @endphp

                        @foreach ($Users as $user)
                            @foreach ($user->reservations as $reservation)
                                <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                                    <td class="py-3 px-4 font-semibold text-gray-600">{{ $i++ }}</td>
                                    <td class="py-3 px-4 font-medium text-gray-900">{{ $reservation->evenement->title }}
                                    </td>
                                    <td class="py-3 px-4">{{ $reservation->evenement->date }}</td>
                                    <td class="py-3 px-4">{{ $reservation->evenement->heure }}</td>
                                    <td class="py-3 px-4">{{ $reservation->evenement->lieu }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

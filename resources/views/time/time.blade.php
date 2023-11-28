
@php
     function calculateLateArrival($loginDate) {
        // Heure prévue d'arrivée
        $expectedArrival = new DateTime('08:30');
        
        // Convertir la date de connexion en objet DateTime
        $loginDateTime = new DateTime($loginDate);

        // Calculer la différence entre l'heure prévue d'arrivée et l'heure réelle d'arrivée
        $interval = $expectedArrival->diff($loginDateTime);

        // Extraire le retard en heures, minutes et secondes
        $hours = $interval->format('%H');
        $minutes = $interval->format('%I');
        $seconds = $interval->format('%S');

        return [
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds,
        ];
    }

    function calculatePrime($lateArrival) {
    // Prime de base
    $basePrime = 600;

    // Retard en minutes
    $lateMinutes = calculateLateArrival($lateArrival);

    // Calcul de la prime en fonction du retard
    if ($lateMinutes <= 10) {
        return $basePrime;
    } elseif ($lateMinutes <= 20) {
        return $basePrime - 25;
    } elseif ($lateMinutes <= 30) {
        return $basePrime - 50;
    } elseif ($lateMinutes <= 60) {
        return $basePrime - 100;
    } else {
        return $basePrime - 300;
    }
}
@endphp

<x-app-layout >
   
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
                    Welcome, {{ Auth::user()->name }}!
                </h2>
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">

                    <!-- Bouton vert -->
                    <button id="pauseButton" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                        PAUSE
                    </button>

                    <!-- Bouton jaune -->
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <button onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-4">
                        {{ __('Log Out') }}
                    </button>

                </div>
         

            
               
           

            <div class="py-1">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                        <table class="w-full text-sm text-center text-gray-500 border border-gray-300 border-collapse">
                            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border">Login </th>
                                    <th scope="col" class="px-6 py-3 border">Service</th>
                                    <th scope="col" class="px-6 py-3 border">Retard</th>
                                    <th scope="col" class="px-6 py-3 border">Pause</th>
                                    <th scope="col" class="px-6 py-3 border">Prime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-6 py-4 border">{{ $loginDate }}</td>
                                    <td class="px-6 py-4 border"><span id="pauseTimer">00:00:00</span></td>
                                    <td class="px-6 py-4 border"> {{ calculateLateArrival($loginDate)['hours'] }} :
                                                                  {{ calculateLateArrival($loginDate)['minutes'] }} :
                                                                  {{ calculateLateArrival($loginDate)['seconds'] }} </td>
                                    <td class="px-6 py-4 border"><span id="ServiceTimer">01:00:00</span></td>
                                    <td class="px-6 py-4 border">{{ calculatePrime($lateArrival) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set the initial pause timer value
            let pauseTimerValue = 0;
            // Set the initial service timer value
            let serviceTimerValue = 3600; // 1 hour in seconds

            // Function to update the pause timer every second
            function updatePauseTimer() {
                pauseTimerValue++;
                updateTimer('pauseTimer', pauseTimerValue);
            }

            // Function to update the service timer every second
            function updateServiceTimer() {
                serviceTimerValue--;
                updateTimer('serviceTimer', serviceTimerValue);
            }

            // Function to update the timer based on the given timerId and value
            function updateTimer(timerId, timerValue) {
                const hours = Math.floor(timerValue / 3600);
                const minutes = Math.floor((timerValue % 3600) / 60);
                const seconds = timerValue % 60;

                // Format the time with leading zeros
                const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

                // Update the span element with the formatted time
                document.getElementById(timerId).textContent = formattedTime;
            }

            // Start the pause timer and service timer when the page loads
            const pauseTimerInterval = setInterval(updatePauseTimer, 1000);
            const serviceTimerInterval = setInterval(updateServiceTimer, 1000);

            // Example: Stop the pause timer when the "PAUSE" button is clicked
            document.getElementById('pauseButton').addEventListener('click', function () {
                clearInterval(pauseTimerInterval);
                clearInterval(serviceTimerInterval);
                alert('Pause timer stopped!');
            });
       
    </script>
    <div class="flex justify-center items-start mt-2 ">
        <!-- Première carte -->
        <div class="styled-card mr-5 h-full">
            <img src="{{ asset('images/delay.jpg') }}" alt="delay">
            <div class="card-content">
                <h3>Règles de Retard</h3>
                <p>00 min -->10 min = -00 dh</p>
                <p>10 min -->20 min = -25 dh</p>
                <p>20 min -->30 min = -50 dh</p>
                <p>30 min -->60 min = -100 dh</p>
                <p>+60 min = -300 dh</p>
            </div>
        </div>


</x-app-layout>

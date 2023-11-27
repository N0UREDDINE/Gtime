<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-auto">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">

                    <!-- Bouton vert -->
                    <button id="pauseButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
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
            </div>

            <x-slot name="header">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    Tableau de Temps avec Horloges
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                        <table class="w-full text-sm text-center text-gray-500 border border-gray-300 border-collapse">
                            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 border">Login </th>
                                    <th scope="col" class="px-6 py-3 border">Service</th>
                                    <th scope="col" class="px-6 py-3 border">Retard</th>
                                    <th scope="col" class="px-6 py-3 border">Pause</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-6 py-4 border">{{ $loginDate }}</td>
                                    <td class="px-6 py-4 border"><span id="pauseTimer">00:00:00</span></td>
                                    <td class="px-6 py-4 border">{{ $lateArrival }}</td>
                                    <td class="px-6 py-4 border"><span id="ServiceTimer">01:00:00</span></td>
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
        });
    </script>
    
</x-app-layout>

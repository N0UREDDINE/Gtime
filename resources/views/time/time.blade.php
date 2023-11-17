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

                    <p class="mb-4">You're logged in!</p>

                    <!-- Bouton vert -->
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        PAUSE
                    </button>

                    <!-- Bouton jaune -->
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <button onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-4">
                        {{ __('Log Out') }}
                    </button>

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
                                        @forelse ($times as $time)
                                            <tr>
                                                <td class="px-6 py-4 border">
                                                    <span id="loginClock{{ $time->id }}" class="clock"></span>
                                                </td>
                                                <td class="px-6 py-4 border">
                                                    <span id="serviceClock{{ $time->id }}" class="clock"></span>
                                                </td>
                                                <td class="px-6 py-4 border">
                                                    <span id="delayClock{{ $time->id }}" class="clock"></span>
                                                </td>
                                                <td class="px-6 py-4 border">
                                                    <span id="logoutClock{{ $time->id }}" class="clock"></span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="px-6 py-4">
                                                    <center class="text-2xl font-bold">Il n'y a pas encore de données temporelles !</center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Ajouter du JavaScript pour mettre à jour les horloges -->
                    <script>
                    @foreach ($times as $time)
                        updateClock('loginClock{{ $time->id }}', '{{ $time->Login_time }}');
                        updateServiceClock('serviceClock{{ $time->id }}');
                        updateDelayClock('delayClock{{ $time->id }}', '{{ $time->Login_time }}');
                        updatePauseClock('pauseClock{{ $time->id }}', '{{ $time->break_start_time }}');
                        updateClock('logoutClock{{ $time->id }}', '{{ $time->break_start_time }}');
                    @endforeach     

                        function updateServiceClock(elementId) {
                            const clockElement = document.getElementById(elementId);
                            let seconds = 0;

                            setInterval(() => {
                                const hours = Math.floor(seconds / 3600).toString().padStart(2, '0');
                                const minutes = Math.floor((seconds % 3600) / 60).toString().padStart(2, '0');
                                const remainingSeconds = (seconds % 60).toString().padStart(2, '0');
                                clockElement.textContent = `${hours}:${minutes}:${remainingSeconds}`;
                                seconds++;
                            }, 1000);
                        }
            function calculateDelay(loginTime) {
            const expectedTime = '08:30:00';
            const loginTimestamp = new Date(`2000-01-01 ${loginTime}`);
            const expectedTimestamp = new Date(`2000-01-01 ${expectedTime}`);
            const delayTimestamp = new Date(loginTimestamp - expectedTimestamp);

            const hours = delayTimestamp.getUTCHours().toString().padStart(2, '0');
            const minutes = delayTimestamp.getUTCMinutes().toString().padStart(2, '0');
            const seconds = delayTimestamp.getUTCSeconds().toString().padStart(2, '0');

            return `${hours}:${minutes}:${seconds}`;
        }

        function updateDelayClock(elementId, loginTime) {
            const clockElement = document.getElementById(elementId);
            setInterval(() => {
                const delay = calculateDelay(loginTime);
                clockElement.textContent = delay !== 'NaN:NaN:NaN' ? delay : '00:00:00';
            }, 1000);
        }
        function updatePauseClock(elementId, pauseStartTime) {
        const clockElement = document.getElementById(elementId);
        const pauseDuration = 60 * 60 * 1000; // 1 heure en millisecondes
        const pauseEndTime = new Date(pauseStartTime).getTime() + pauseDuration;

    setInterval(() => {
        const now = new Date().getTime();
        let remainingMilliseconds = pauseEndTime - now;

        if (remainingMilliseconds >= 0) {
            const hours = Math.floor(remainingMilliseconds / 3600000).toString().padStart(2, '0');
            const minutes = Math.floor((remainingMilliseconds % 3600000) / 60000).toString().padStart(2, '0');
            const seconds = Math.floor((remainingMilliseconds % 60000) / 1000).toString().padStart(2, '0');

            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        } else {
            clockElement.textContent = '00:00:00'; // Pause terminée
        }
    }, 1000);
}


                        function updateClock(elementId, time) {
                            const clockElement = document.getElementById(elementId);
                            setInterval(() => {
                                const now = new Date();
                                const hours = now.getHours().toString().padStart(2, '0');
                                const minutes = now.getMinutes().toString().padStart(2, '0');
                                const seconds = now.getSeconds().toString().padStart(2, '0');
                                clockElement.textContent = `${hours}:${minutes}:${seconds}`;
                            }, 1000);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

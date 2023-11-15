{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">You're logged in!</p>

                    <!-- Bouton vert -->
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        PAUSE
                    </button>

                    <!-- Bouton jaune -->
                    {{-- <button id="logoutButton" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-4 ">
                        LOGOUT
                    </button> --}}
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                    <button onclick="event.preventDefault(); document.getElementById('logoutForm').submit();" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-4 ">
                        {{ __('Log Out') }}
                    </button>
                    
                    
                    <script>
                        // Assuming you have a logout function defined
                        function logout() {
                            // Perform logout actions here
                            console.log("Logout function called");
                            // Add your logout logic here, such as redirecting to a logout page or making an API call
                        }
                    
                        // Add click event listener to the button
                        document.getElementById("logoutButton").addEventListener("click", logout);
                    </script>
                    

                    <!-- Ajoutez d'autres fonctionnalités ici -->
                    
                    <!-- Liste des statuts avec horloge -->
                    <ul>
                        <li>
                            <span>Login</span>
                            <span id="loginClock">00:00:00</span>
                        </li>
                        <li>
                            <span>Retard</span>
                            <span id="retardClock">00:00:00</span>
                        </li>
                        <li>
                            <span>En service</span>
                            <span id="serviceClock">00:00:00</span>
                        </li>
                        <li>
                            <span>En pause</span>
                            <span id="pauseClock">00:00:00</span>
                        </li>
                    </ul>

                    <!-- Ajouter du JavaScript pour mettre à jour l'horloge -->
                    <script>
                        
                        function updateClock(elementId) {
                            const clockElement = document.getElementById(elementId);
                            setInterval(() => {
                                const now = new Date();
                                const hours = now.getHours().toString().padStart(2, '0');
                                const minutes = now.getMinutes().toString().padStart(2, '0');
                                const seconds = now.getSeconds().toString().padStart(2, '0');
                                clockElement.textContent = `${hours}:${minutes}:${seconds}`;
                            }, 1000);
                        }

                        updateClock('loginClock');
                        updateClock('retardClock');
                        updateClock('serviceClock');
                        updateClock('pauseClock');
                  
                </div>
            </div>
            <script>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


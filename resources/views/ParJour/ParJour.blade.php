<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Date Bar --}}
            <div class="date-bar" style="width: 90%; text-align: center; margin-top:1px;">
                <span style="font-weight: bold; font-size: 18px;">Current Date: {{ $dt }}</span>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('success'))
                <div id="flash-message" style="width: 400px; position: fixed; top: 150px; right: 10px"
                    class="bg-green-500 text-white py-2 px-4 rounded">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="mt-6">
                {{-- Search Form --}}
                <form enctype="multipart/form-data" method="get" action="{{ route('ParJour') }}" autocomplete="off">

                    @csrf
                    <div class="flex items-center">
                        <label for="id_doss" class="text-sm font-bold text-gray-700">Date</label>
                        <input type="text" name="dt" value="{{ $dt }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-200 ml-2">
                        <button class="search rech bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow ml-2" name="rechercher" id="search">Rechercher</button>
                    </div>
                </form>
                
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-center text-gray-500 border border-gray-300 border-collapse">
                    <thead class="text-xs text-gray-900 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">Nom Employé</th>
                            <th scope="col" class="px-6 py-3 border">LogIn_time</th>
                            <th scope="col" class="px-6 py-3 border">Delay_time</th>
                            <th scope="col" class="px-6 py-3 border">Full_time</th>
                            <th scope="col" class="px-6 py-3 border">break_time</th>
                            <th scope="col" class="px-6 py-3 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($parjours as $parjour)
                            <tr>
                                <td class="px-2 py-4 border">
                                    @if ($parjour->user)
                                        {{ $parjour->user->name }}
                                    @else
                                        N/A or any default value
                                    @endif
                                </td>
                                <td class="px-1 py-4 border">
                                    @if ($parjour->time)
                                        {{ $parjour->time->login_time }}
                                    @else
                                        N/A or any default value
                                    @endif
                                </td>
                                <td class="px-1 py-4 border">
                                    @if ($parjour->time)
                                        {{ $parjour->time->delay_time }}
                                    @else
                                        N/A or any default value
                                    @endif
                                </td>
                                <td class="px-1 py-4 border">
                                    @if ($parjour->time)
                                        {{ $parjour->time->full_time }}
                                    @else
                                        N/A or any default value
                                    @endif
                                </td>
                                <td class="px-1 py-4 border">
                                    @if ($parjour->time)
                                        {{ $parjour->time->break_time }}
                                    @else
                                        N/A or any default value
                                    @endif
                                </td>
                                <td class="px-1 py-4 border">
                                    @if ($parjour->user)
                                        {{ $parjour->user->status }}
                                    @else
                                        N/A or any default value
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No records found for the selected date.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 4000);
    </script>
</x-app-layout>

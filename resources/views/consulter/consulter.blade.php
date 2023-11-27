<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Consulter') }}
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
                <form method="get" action="{{ route('consulter') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center">
                        <input type="text" name="search" placeholder="Search by name" class="mr-2 p-2 border rounded"
                            value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
                        @if (request('search'))
                            <h2 class="font-semibold text-2xl text-gray-800 leading-tight ml-4">
                                Results for: {{ request('search') }}
                            </h2>
                        @endif
                    </div>
                </form>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-center text-gray-500 border border-gray-300 border-collapse">
                    <thead class="text-xs text-gray-900 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">Date</th>
                            <th scope="col" class="px-6 py-3 border">LogIn_time</th>
                            <th scope="col" class="px-6 py-3 border">Delay_time</th>
                            <th scope="col" class="px-6 py-3 border">Full_time</th>
                            <th scope="col" class="px-6 py-3 border">break_time</th>
                            <th scope="col" class="px-6 py-3 border">Logout_time</th>
                            <th scope="col" class="px-6 py-3 border">Prime</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Times as $time)
                            <tr>
                                <td class="px-2 py-4 border">{{ $time->record_date }}</td>
                                <td class="px-1 py-4 border">{{ $time->login_time }}</td>
                                <td class="px-1 py-4 border">{{ $time->delay_time }}</td>
                                <td class="px-1 py-4 border">{{ $time->service_time }}</td>
                                <td class="px-1 py-4 border">{{ $time->break_end_time }}</td>
                                <td class="px-1 py-4 border">{{ $time->logout_time }}</td>
                                <td class="px-1 py-4 border">{{ $time->prime }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 border">
                                    <center class="text-2xl font-bold">No data available for this user.</center>
                                </td>
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

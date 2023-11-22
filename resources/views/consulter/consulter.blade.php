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
                        <input type="text" name="search" placeholder="Search by name" class="mr-2 p-2 border rounded">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
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
                        @foreach ($Consulters as $Consulter)
                            <tr>
                                <td class="px-2 py-4 border">{{ $Consulter->name }}</td>
                                <td class="px-1 py-4 border">{{ $Consulter->work_time }}</td>
                                <td class="px-1 py-4 border">{{ $Consulter->email }}</td>
                                <td class="px-1 py-4 border">{{ $Consulter->password }}</td>
                                <td class="px-1 py-4 border">{{ $Consulter->name }}</td>
                                <td class="px-1 py-4 border">{{ $Consulter->name }}</td>
                                <td class="px-1 py-4 border">{{ $Consulter->name }}</td>
                            </tr>
                        @endforeach
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

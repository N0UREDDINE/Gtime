<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="">

            @if (session()->has('success'))
                <div id="flash-message" style="width: 400px; position: fixed; top: 150px; right: 10px"
                    class="bg-green-500 text-white py-2 px-4 rounded">
                    {{ session()->get('success') }}
                </div>
            @endif

            <center>
                <h1 style="font-size: 2rem; font-weight: bold; color: black;">Liste Des Roles</h1>

            </center>
            <a href="{{ route('createRole') }}" class="inline-block bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium text-black rounded-lg text-sm px-6 py-3 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Ajouter Role
            </a>



            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">

                <table class="w-full text-sm text-center text-gray-500 border border-gray-300 border-collapse">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 border">ID</th>
                            <th scope="col" class="px-6 py-3 border">role</th>
                            <th scope="col" class="px-6 py-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td class="px-6 py-4 border">{{ $role->id }}</td>
                                <td class="px-6 py-4 border">{{ $role->role }}</td>
                                <td class="px-6 py-4 border">
                                    <form action="{{ route('destroyRole', $role) }}" method="POST">
                                        <a href="/role/{{ $role->id }}/edit"
                                            style="color: green; font-weight: bold">Edit</a> &nbsp; | &nbsp;
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="color: red; font-weight: bold;">Delete</button>
                                    </form>
                                </td>
                            @empty
                                <td colspan="4" class="px-6 py-4">
                                    <center class="text-2xl font-bold">There is no Role yet !</center>
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

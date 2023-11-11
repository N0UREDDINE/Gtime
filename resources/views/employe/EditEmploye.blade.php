<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('employes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold mb-10 text-center">Modifer Une La Marque</h1>
                    <form method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label for="FN" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="Name" name="Name" value="{{ $employe->name }}" class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 dark:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Name ..." required autofocus>
                        </div>
                        <div class="mb-6">
                            <label for="LN" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" id="Email" name="Email" value="{{ $employe->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Email ..." required>
                        </div>

                        <div class="mb-6">
                            <label for="Email" class="block mb-2 text-sm font-medium text-gray-900">Phone</label>
                            <input type="text" id="Phone" name="Phone" value="{{ $employe->phone }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Phone ..." required>
                        </div>

                        <div class="mb-6">
                            <label for="Phone" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <input type="text" id="Role" name="Role" value="{{ $employe->role }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Role ..." required>
                        </div>

                        <div class="mb-6">
                            <label for="Address" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="text" id="Address" name="Address" value="{{ $employe->Address }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-blue-500 light:focus:border-blue-500" placeholder="Password ..." >
                        </div>
                        <button type="submit" style="background-color: darkorchid; padding: 10px 20px; border-radius: 8px;" class="text-white hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 ...">
                            Edit
                          </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
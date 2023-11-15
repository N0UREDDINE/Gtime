<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ParJour') }}
        </h2>
    </x-slot>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="search" style="width:90%; margin:auto">
                            <form enctype="multipart/form-data" method="post" autocomplete="off">
                                <ul for="form" id="ulform">
                                    <li>
                                        <label for="id_doss">Date</label>
                                        <button class="btn btn-primary" name="rechercher" id="search">Rechercher</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <br>
                        <hr class="style-eight">

                        <div class="m relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                            <table class="w-full text-sm text-center text-gray-500">
                                <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nom Employé</th>
                                        <th scope="col" class="px-6 py-3">Login</th>
                                        <th scope="col" class="px-6 py-3">Retard</th>
                                        <th scope="col" class="px-6 py-3">En service</th>
                                        <th scope="col" class="px-6 py-3">En Pause</th>
                                        <th scope="col" class="px-6 py-3">Logout</th>
                                        <th scope="col" class="px-6 py-3">Statue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $us)
                                        <?php
                                        $nom_user = '<span style="font-size:22px">' . $us['prenom_user'] . '</span> ' . $us['nom_user'];
                                        $user = $us['user'];
                                        $heure_start = "08:00:00";
                                        $time_retard = "00:15:00";
                                        $time_work = "08:00:00";
                                        $time_p = "01:00:00";
                                        $heure_stop = "17:00:00";
                                        $statue = "<img src=images/offline.png width=64/>";
                                        ?>
                                        <tr>
                                            <td class="px-6 py-4" style="text-align:left">{{ $nom_user }}</td>
                                            <td class="px-6 py-4">{{ $heure_start }}</td>
                                            <td class="px-6 py-4" style="color:red">{{ $time_retard }}</td>
                                            <td class="px-6 py-4" style="color:green">{{ $time_work }}</td>
                                            <td class="px-6 py-4" style="color:blue">{{ $time_p }}</td>
                                            <td class="px-6 py-4">{{ $heure_stop }}</td>
                                            <td class="px-6 py-4">{!! $statue !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    
</x-app-layout>

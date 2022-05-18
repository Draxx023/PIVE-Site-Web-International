<?php

use App\Candidature;
use App\VariableGlobal;

$datelimite = VariableGlobal::find("1");

$annees = [];
$candidatures = [];
$candidatures = Candidature::latest()->get();
?>
<x-layout-admin>
    <x-slot name='fiches'>
        <style>
            #fiches {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            }

            ;
        </style>
    </x-slot>
    <x-slot name='panel'>
        <script>
            //fonction chercher pour afficher uniquement les éléments de class fiche qui correspondent à la recherche qui ne sont pas dans un tableau
            function chercher() {
                var recherche = document.getElementById("recherche").value;
                var fiches = document.getElementsByClassName("fiche");
                for (var i = 0; i < fiches.length; i++) {
                    var fiche = fiches[i];
                    var nom = fiche.innerHTML;
                    if (nom.toLowerCase().indexOf(recherche.toLowerCase()) == -1) {
                        parent = fiche.parentNode.style.display = "none";
                    } else {
                        fiche.parentNode.removeAttribute("style");
                    }
                }
            }
        </script>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fiches de Candidature</h3>
                    <span class="text-base font-normal text-gray-500">Vous pouvez ici visualiser et bloquer ou débloquer la modification des fiches de candidature soumises par les étudiants souhaitant partir en mobilité</span>
                </div>
            </div>
        </div>
        <form id="datelimite" method="POST" action="{{ action('CandidatureController@changerdatelimite') }}">
            @csrf
            <label for="datelimite"> Date limite de dépôt de candidature
            </label>
            <input value="<?php if($datelimite!=null) echo($datelimite->datelimite_candidature); ?>" type="date" name="datelimite">
            <button type="submit"> Changer </button>
        </form>
        <div class="flex flex-row">
            <div class="flex flex-col m-4">
                <div class="p-2 w-1/3 mx-0 flex justify-between text-gray-600 border-2 border-gray-300 bg-white  rounded-lg text-sm">
                    <input class="focus:outline-none w-full" type="text" name="query" id="recherche" placeholder="Chercher..." onkeyup="chercher()">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </div>
                <div class="overflow-x-auto border-2 border-gray-300 rounded-lg mt-2">
                    <div class="align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nom Etudiant
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date Création Fiche
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date dernière modification
                                        </th>
                                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions Administrateur
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach($candidatures as $candidature)
                                    <tr>
                                        <td class="fiche p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                            <a href="/admin/fiche/{{$candidature->email}}" class="underline text-blue-700">
                                                {{$candidature->nom}} {{$candidature->prenom}}
                                            </a>
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                            {{$candidature->created_at}}
                                        </td>
                                        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                            {{$candidature->updated_at}}
                                        </td>
                                        <td class="flex flex-row m-2">
                                            <form id="block" method="POST" action="{{ action('CandidatureController@bloquer') }}">
                                                @csrf
                                                <input type="hidden" name="email" value="{{$candidature->email}}" />
                                                <button form="block" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">
                                                    @if($candidature->blocked)
                                                    Débloquer
                                                    @else
                                                    Bloquer
                                                    @endif
                                                </button>
                                            </form>
                                            <form id="mail" method="post" action="{{ action('CandidatureController@mail') }}">
                                                @csrf
                                                <input type="hidden" name="email" value="{{$candidature->email}}" />
                                                <button form="mail" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Contacter</button>
                                            </form>
                                            <form id="excel" method="post" action="">
                                                @csrf
                                                <input type="hidden" name="email" value="{{$candidature->email}}" />
                                                <button form="excel" class="items-center hover:bg-green-700 hover:text-white bg-white text-green-700 px-3 py-2 rounded-md text-sm font-medium">To Excel</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <form id="deleteAll" method="POST" action="{{ action('CandidatureController@deleteAll') }}">
                @csrf
                <button form="deleteAll" onclick="return confirm('Êtes-vous sûr de vouloir supprimer toutes les fiches de candidatures ? Vous ne pourrez pas revenir en arrière.')" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium"> Supprimer les fiches de candidatures </button>
            </form>
        </div>
    </x-slot>
</x-layout-admin>
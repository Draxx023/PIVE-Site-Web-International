<x-layout-admin>
    <x-slot name='fichiers'>
		<style>
            #fichiers {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        <script>
            function afficher_pdf(pdf){
                img=document.getElementById(pdf);
                if(img.style.display=="none") {
                    img.style.display ="block";
                    document.getElementById("bouton_"+pdf).innerHTML = "Cacher";
                }
                else {
                    img.style.display ="none";
                    document.getElementById("bouton_"+pdf).innerHTML = "Voir";
                }
            }
            function afficher_detail(pdf){
                img=document.getElementById(pdf);
                if(img.style.display=="none") {
                    img.style.display ="block";
                    document.getElementById("bouton_"+pdf).innerHTML = "^";
                }
                else {
                    img.style.display ="none";
                    document.getElementById("bouton_"+pdf).innerHTML = "v";
                }
            }
            //fonction pour telecharger en blob le pdf avec un nom donné
            function telecharger_pdf(pdf, nom){
                var xhr = new XMLHttpRequest();
                xhr.open('GET', "../"+pdf, true);
                xhr.responseType = 'blob';
                xhr.onload = function(e) {
                    if (this.status == 200) {
                        var myBlob = this.response;
                        var blob = new Blob([myBlob], {type: 'application/pdf'});
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = nom;
                        link.click();
                    }
                };
                xhr.send();
            }
            
        </script>
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
        @foreach($fichiers as $byuid)
        <div>
            {{$byuid[0]->uid}}
            <button type="button" id="bouton_{{$byuid[0]->uid}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='afficher_detail("{{$byuid[0]->uid}}")'>v</button>
            <div id="{{$byuid[0]->uid}}" style="display:none">
            @foreach($byuid as $fichier)
            <div>
                <h2 class="text-gray-600 text-sm font-semibold mb-2">{{$fichier->nom}}</h2>
                <button type="button" id="bouton_{{$fichier->nom}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='afficher_pdf("{{$fichier->nom}}")'>Voir</button>
                <button type="button" id="bouton_{{$fichier->nom}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium" onclick='telecharger_pdf("{{$fichier->url}}","{{$fichier->nom}}")'>Télécharger</button>
                <form action="{{route('fichier.delete')}}" class="inline" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$fichier->id}}">
                    <input type="hidden" name="redirect" value="/admin/fichiers">
                    <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                </form>
                <embed
                    src="../{{$fichier->url}}"
                    type="application/pdf"
                    frameBorder="0"
                    scrolling="auto"
                    height="600px"
                    width="1000px"
                    id={{$fichier->nom}}
                    style="display:none"
                />
            </div>
            @endforeach
            </div>
        </div>
        @endforeach
    </div>
    </x-slot>
</x-layout-admin>
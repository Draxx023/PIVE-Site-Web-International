<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    @include("nav")
</head>
<script>
      function afficherMasquer(element){
      img=document.getElementById(element);
      if(img.style.display=="none") {
          img.style.display ="block";
      }
      else {
          img.style.display ="none";
      }
      }
      function supprimage(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deleteimg[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function suppAncienLien(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deletelien[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function suppAncienBlog(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deleteblog[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function suppAncienCours(element){
          var newdiv=document.createElement('div');
          newdiv.innerHTML="<input name='deletecours[]' value='"+element+"' class='hidden'>";
          document.getElementById('suppr').appendChild(newdiv);
          document.getElementById(element).parentNode.remove();
      }
      function newCours(){
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-5 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Semestre :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"semestre[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"code[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"titre[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">ECTS</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"ects[]\" type=\"number\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nombre d'échanges</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nombre[]\" type=\"number\"/>"+
            "</div></div>"+
            "<div class=\"grid grid-cols-1 mt-5 mx-7\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>"+
              "<textarea style=\"white-space: pre-wrap\" class=\"h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"contenu[]\" type=\"text\"></textarea>"+
              "</div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppCours(this)\">Supprimer ce cours</button></div>";
          document.getElementById('cours').appendChild(newdiv);
      };
      function suppCours(btn){
        btn.parentNode.remove();
      };
      function newBlog(){
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomblog[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienblog[]\" type=\"text\"/>"+
            "</div></div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppBlog(this)\">Supprimer ce blog</button></div>";
          document.getElementById('blog').appendChild(newdiv);
      };
      function suppBlog(btn){
        btn.parentNode.remove();
      };
      function newLien(){
        var newdiv=document.createElement('div');
        newdiv.innerHTML="<div><div class=\"grid grid-cols-2 mt-5 mx-7\">"+
          "<div class=\"grid grid-cols-1\">"+
          "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Nom :</label>"+
            "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"nomlien[]\" type=\"text\"/>"+
            "</div>"+
            "<div class=\"grid grid-cols-1 ml-1\">"+
              "<label class=\"uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Lien :</label>"+
              "<input class=\"py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent\" name=\"lienlien[]\" type=\"text\"/>"+
            "</div></div>"+
            "<button class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick=\"suppLien(this)\">Supprimer ce lien</button></div>";
          document.getElementById('lien').appendChild(newdiv);
      };
      function suppLien(btn){
        btn.parentNode.remove();
      };
</script>
<body>
    <form method="post" enctype="multipart/form-data" action="{{ route('editDestination',$destination->nom) }}">
        @csrf
        <div id="suppr"></div>
    <div class="flex items-center justify-center  mt-10 mb-10">
        <div class="grid bg-white rounded-lg shadow-xl w-full md:w-11/12 lg:w-1/2">
          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Modification de la page {{$destination->nom}}</h1>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Introduction</label>
            <textarea name="intro" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$destination->intro)}}</textarea>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Images</label>
            @foreach($photos->where("categorie","intro") as $photo)
            <?php 
              $url=$photo->url;
              $photo=explode("/",$photo->url)[2];
            ?>
            <div class="flex space-x-4"><span class="px-3 py-2 text-sm font-medium">{{$photo}}</span>
              <button onclick="afficherMasquer('{{$url}}')" type="button" class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Afficher/Masquer</button>
              <button onclick="supprimage('{{$url}}')" type="button" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
              <img id='{{$url}}' style="display: none" class="object-contain w-full h-96" src="/{{$url}}"/></div>
            @endforeach
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ajouter de nouvelles images</label>
            <input name="introphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Témoignages</label>
            <textarea name="temoignages" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$destination->intro)}}
                </textarea>
          </div>
          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Images</label>
            @foreach($photos->where("categorie","temoignages") as $photo)
            <?php 
              $url=$photo->url;
              $photo=explode("/",$photo->url)[2];
            ?>
            <div class="flex space-x-4"><span class="px-3 py-2 text-sm font-medium">{{$photo}}</span>
              <button onclick="afficherMasquer('{{$url}}')" type="button" class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Afficher/Masquer</button>
              <button onclick="supprimage('{{$url}}')" type="button" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
              <img id='{{$url}}' style="display: none" class="object-contain w-full h-96" src="/{{$url}}"/></div>
            @endforeach
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ajouter de nouvelles images</label>
            <input name="temoignagesphotos[]" accept="image/*" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="file" multiple>
          </div>

          <div id="cours" div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Liste des cours choisis par les étudiants</label>
            @foreach($cours as $cour)
              <div>
                <div class="grid grid-cols-5 mt-5 mx-7">
                  <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Semestre :</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value='{{$cour->semestre}}' name="updatesemestre[]" type="text"/>
                  </div>
                  <div class="grid grid-cols-1 ml-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Code :</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value='{{$cour->code}}' name="updatecode[]" type="text" readonly>
                  </div>
                  <div class="grid grid-cols-1 ml-1\">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Titre</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value='{{$cour->titre}}' name="updatetitre[]" type="text"/>
                  </div>
                  <div class="grid grid-cols-1 ml-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">ECTS</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value='{{$cour->ects}}' name="updateects[]" type="number"/>
                  </div>
                  <div class="grid grid-cols-1 ml-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre d'échanges</label>
                    <input class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" value='{{$cour->nombre}}' name="updatenombre[]" type="number"/>
                  </div>
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7\">
                  <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold\">Contenu</label>
                  <textarea style="white-space: pre-wrap" class="h-24 py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="updatecontenu[]" type="text">{{$cour->contenu}}</textarea>
                </div>
                  <button type='button' id='{{$cour->code}}' class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="suppAncienCours('{{$cour->code}}')\">Supprimer ce cours</button>
                </div>
            @endforeach
          </div>
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newCours()">Ajouter un cours</button>
          </div>
          <div id="blog" div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Blogs réalisés par les étudiants</label>
            @foreach($blogs as $blog)
            <div><div class="grid grid-cols-2 mt-5 mx-7">
              <div class="grid grid-cols-1">
              <label class="md:text-sm text-xs text-gray-500 text-light font-semibold">NOM : {{$blog->nom}}</label>
                </div>
                <div class="grid grid-cols-1 ml-1\">
                  <label class="md:text-sm text-xs text-gray-500 text-light font-semibold">LIEN : {{$blog->lien}}</label>
                </div></div>
                <button type="button" id="{{$blog->nom}}" class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="suppAncienBlog('{{$blog->nom}}')">Supprimer ce blog</button></div>
            @endforeach
          </div>
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newBlog()">Ajouter un blog</button>
          </div>
          <div id="lien" div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Liens utiles</label>
            @foreach($liens as $lien)
            <div><div class="grid grid-cols-2 mt-5 mx-7">
              <div class="grid grid-cols-1">
              <label class="md:text-sm text-xs text-gray-500 text-light font-semibold">NOM : {{$lien->nom}}</label>
                </div>
                <div class="grid grid-cols-1 ml-1\">
                  <label class="md:text-sm text-xs text-gray-500 text-light font-semibold">LIEN : {{$lien->lien}}</label>
                </div></div>
                <button type="button" id="{{$lien->nom}}" class='grid grid-cols-1 mt-5 mx-7 w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' onclick="suppAncienLien('{{$lien->nom}}')">Supprimer ce lien</button></div>
            @endforeach
          </div>
          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button" onclick="newLien()">Ajouter un lien</button>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-bold">Astuces et informations complémentaires</label>
            <textarea name="astucesinfos" style="white-space: pre-wrap" class="py-2 px-3 rounded-lg border-2 border-blue-300 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" type="text" required>{{str_replace("<br />","",$destination->astucesinfos)}}</textarea>
          </div> 


          <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <button class='w-auto bg-blue-500 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="submit">Sauvegarder les modifications</button>
          </div>

        </div>
      </div>
    </form>
</body>
<footer>
@include("footer")
</footer>
</html>

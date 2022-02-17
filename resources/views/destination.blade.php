<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polytech Nancy International</title>
    <link rel ="stylesheet" href ="{{ asset('css/app.css')}}">
    @include("nav")
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<body>
    <main class="relative container mx-auto bg-white px-4">

        <article class="max-w-4xl mx-auto py-8">
            <h1 class="text-3xl font-bold">{{$destination->nom}}</h1>

            <h3 class="text-2xl font-semibold">Introduction</h3>
            <p class="mt-4 mb-6"><?php echo($destination->intro) ?></p>
            <div class="swiper intro">
                <div class="swiper-wrapper">
                  @foreach($photos->where("categorie","intro") as $photo)
                  <div class="swiper-slide">
                    <img
                      class="object-contain w-full h-96"
                      src="{{$photo->url}}"
                      alt="image"
                    />
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <h3 class="text-2xl font-semibold">Nos étudiants sur place</h3>
            <p class="mt-4 mb-6"><?php echo($destination->temoignages) ?></p>
            <div class="swiper temoignages">
                <div class="swiper-wrapper">
                  @foreach($photos->where("categorie","temoignages") as $photo)
                  <div class="swiper-slide">
                    <img
                      class="object-contain w-full h-96"
                      src="{{$photo->url}}"
                      alt="image"
                    />
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <h3 class="text-2xl mt-6 font-semibold">Liste des cours</h3>
            <p class="mt-4 mb-6">Tableau récapitulatif des cours par filières.</p>
            <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3">Semestre</th>
                    <th class="px-4 py-3">Code</th>
                    <th class="px-4 py-3">Titre Cours</th>
                    <th class="px-4 py-3">ECTS</th>
                    <th class="px-4 py-3">Nombre d'échanges</th>
                    <th class="px-4 py-3">Contenu</th>
                </tr>
                @foreach($cours as $cour)
                <tr class="bg-gray-100 border-b border-gray-200">
                  <td class="px-4 py-3">{{$cour->semestre}}</td>
                  <td class="px-4 py-3">{{$cour->code}}</td>
                  <td class="px-4 py-3">{{$cour->titre}}</td>
                  <td class="px-4 py-3">{{$cour->ects}}</td>
                  <td class="px-4 py-3">{{$cour->nombre}}</td>
                  <td class="px-4 py-3"><?php echo($cour->contenu) ?></td>
                </tr>
                @endforeach
            </table>
            <h3 class="text-2xl mt-6 font-semibold">Blogs/Presentations réalisés par nos étudiants</h3>
            @foreach($blogs as $blog)
            <a href="{{$blog->lien}}"><p class="mt-4 mb-6 underline">{{$blog->nom}}</p></a>
            @endforeach
            <h3 class="text-2xl mt-6 font-semibold">Documentation, liens utiles.</h3>
            @foreach($liens as $lien)
            <a href="{{$lien->lien}}"><p class="mt-4 mb-6 underline">{{$lien->nom}}</p></a>
            @endforeach
            <h3 class="text-2xl mt-6 font-semibold">Astuces et informations complémentaires</h3>
            <p class="mt-4 mb-6"><?php echo($destination->astucesinfos) ?></p>
        </article>
    </main>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.intro', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
      var swiper = new Swiper('.temoignages', {
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>
</body>
<footer>
@include("footer")
</footer>
</html>
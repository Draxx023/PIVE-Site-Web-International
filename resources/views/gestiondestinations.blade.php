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
<body>
    <main class="relative container mx-auto bg-white px-4">
        <article class="max-w-4xl mx-auto py-8">
            <h3 class="text-2xl font-semibold">Liste des destinations disponibles</h3>
    <?php
    $noms=DB::select('select nom from destination');
    foreach($noms as $nom){
        $nom=$nom->nom;
        $token=csrf_token();
        echo("<div class=\"flex space-x-4\"><span class=\"px-3 py-2 text-sm font-medium\">$nom</span>");
        echo("<a href=\"/edit/$nom\" class=\"hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium\">Modifier</a>");
        echo("<form method=\"post\"><input type=\"hidden\" name=\"_token\" value=\"$token\"/><input type=\"hidden\" name=\"delete\" value=\"$nom\"/><button class=\"items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium\">Supprimer</button></form></div>");
    }
    ?>
        </article>
    </main>
</body>
<footer>
@include("footer")
</footer>
</html>
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Destination;
use App\Assoblog;
use App\Assolien;
use App\Assoimage;
use App\Assocours;

class DestinationController extends Controller
{
    public function liste(){
        $destinations=Destination::all();
        return view('gestiondestinations',['destinations' => $destinations]);
    }
    public function nouvelleDestination(){
        $nom=$_POST["nom"];
        $destination=new Destination();
        $destination->nom=$_POST["nom"];
        $destination->intro=nl2br($_POST["intro"]);
        $destination->temoignages=nl2br($_POST["temoignages"]);
        $destination->astucesinfos=nl2br($_POST["astucesinfos"]);
        $destination->save();
        if(isset($_POST["nomblog"])){
            $nomsblog=$_POST["nomblog"];
            $liensblog=$_POST["lienblog"];
            for($i=0;$i<count($nomsblog);$i++){
                $assoblog=new Assoblog();
                $assoblog->nomdestination=$nom;
                $assoblog->nom=$nomsblog[$i];
                $assoblog->lien=$liensblog[$i];
                $assoblog->save();
            }
        }
        if(isset($_POST["nomlien"])){
            $nomslien=$_POST["nomlien"];
            $lienslien=$_POST["lienlien"];
            for($i=0;$i<count($nomslien);$i++){
                $assolien=new Assolien();
                $assolien->nomdestination=$nom;
                $assolien->nom=$nomslien[$i];
                $assolien->lien=$lienslien[$i];
                $assolien->save();
            }
        }
        if(isset($_POST["semestre"])){
            $semestre=$_POST["semestre"];
            $code=$_POST["code"];
            $titre=$_POST["titre"];
            $ects=$_POST["ects"];
            $nombre=$_POST["nombre"];
            $contenu=$_POST["contenu"];
            for($i=0;$i<count($semestre);$i++){
                $assocours=new Assocours();
                $assocours->nomdestination=$nom;
                $assocours->semestre=$semestre[$i];
                $assocours->code=$code[$i];
                $assocours->titre=$titre[$i];
                $assocours->ects=$ects[$i];
                $assocours->nombre=$nombre[$i];
                $assocours->contenu=nl2br($contenu[$i]);
                $assocours->save();
            }
        }
        $j=0;
        if($_FILES["introphotos"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["introphotos"]["name"]);$i++){
                $info = pathinfo($_FILES["introphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j.".$ext; 
                $target = "img/destinations/$nom".$newname;
                move_uploaded_file( $_FILES["introphotos"]["tmp_name"][$i], $target);
                $j++;
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="intro";
                $assoimage->url=$target;
                $assoimage->save();
            }
        }
        if($_FILES["temoignagesphotos"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["temoignagesphotos"]["name"]);$i++){
                $info = pathinfo($_FILES["temoignagesphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j.".$ext; 
                $target = "img/destinations/$nom".$newname;
                move_uploaded_file( $_FILES["temoignagesphotos"]["tmp_name"][$i], $target);
                $j++;
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="temoignages";
                $assoimage->url=$target;
                $assoimage->save();
            }
        }
        return view("newdestination");
    }
    public function editDestination($nom){
        if(isset($_POST['deleteimg'])){
            foreach($_POST['deleteimg'] as $img){
                Assoimage::where('url',$img)->delete();
                unlink($img); //unlink supprime le fichier du stockage
            }
        }
        if(isset($_POST['deleteblog'])){
            foreach($_POST['deleteblog'] as $blog){
                Assoblog::where('nom',$blog)->delete();
            }
        }
        if(isset($_POST['deletelien'])){
            foreach($_POST['deletelien'] as $lien){
                Assolien::where('nom',$lien)->delete();
            }
        }
        if(isset($_POST['deletecours'])){
            foreach($_POST['deletecours'] as $cours){
                Assocours::where('code',$cours)->delete();
            }
        }
        if(isset($_POST["nomblog"])){
            $nomsblog=$_POST["nomblog"];
            $liensblog=$_POST["lienblog"];
            for($i=0;$i<count($nomsblog);$i++){
                $assoblog=new Assoblog();
                $assoblog->nomdestination=$nom;
                $assoblog->nom=$nomsblog[$i];
                $assoblog->lien=$liensblog[$i];
                $assoblog->save();
            }
        }
        if(isset($_POST["nomlien"])){
            $nomslien=$_POST["nomlien"];
            $lienslien=$_POST["lienlien"];
            for($i=0;$i<count($nomslien);$i++){
                $assolien=new Assolien();
                $assolien->nomdestination=$nom;
                $assolien->nom=$nomslien[$i];
                $assolien->lien=$lienslien[$i];
                $assolien->save();
            }
        }
        if(isset($_POST["semestre"])){
            $semestre=$_POST["semestre"];
            $code=$_POST["code"];
            $titre=$_POST["titre"];
            $ects=$_POST["ects"];
            $nombre=$_POST["nombre"];
            $contenu=$_POST["contenu"];
            for($i=0;$i<count($semestre);$i++){
                $assocours=new Assocours();
                $assocours->nomdestination=$nom;
                $assocours->semestre=$semestre[$i];
                $assocours->code=$code[$i];
                $assocours->titre=$titre[$i];
                $assocours->ects=$ects[$i];
                $assocours->nombre=$nombre[$i];
                $assocours->contenu=nl2br($contenu[$i]);
                $assocours->save();
            }
        }
        $j=-1;
        $photos=Assoimage::where('nom',$nom)->get();
        foreach($photos as $photo){
            $photo=explode("/",$photo->url)[2];
            $photo = pathinfo($photo, PATHINFO_FILENAME);
            if($j<substr($photo,strlen($nom))) $j=substr($photo,strlen($nom));
        }
        $j++;
        if($_FILES["introphotos"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["introphotos"]["name"]);$i++){
                $info = pathinfo($_FILES["introphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j.".$ext; 
                $target = "img/destinations/$nom".$newname;
                move_uploaded_file( $_FILES["introphotos"]["tmp_name"][$i], $target);
                $j++;
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="intro";
                $assoimage->url=$target;
                $assoimage->save();
            }
        }
        if($_FILES["temoignagesphotos"]["name"][0]!=""){
            for($i=0;$i<count($_FILES["temoignagesphotos"]["name"]);$i++){
                $info = pathinfo($_FILES["temoignagesphotos"]["name"][$i]);
                $ext = $info["extension"];
                $newname = "$j.".$ext; 
                $target = "img/destinations/$nom".$newname;
                move_uploaded_file( $_FILES["temoignagesphotos"]["tmp_name"][$i], $target);
                $j++;
                $assoimage=new Assoimage();
                $assoimage->nom=$nom;
                $assoimage->categorie="temoignages";
                $assoimage->url=$target;
                $assoimage->save();
            }
        }
        if(isset($_POST["updatesemestre"])){
            $semestre=$_POST["updatesemestre"];
            $code=$_POST["updatecode"];
            $titre=$_POST["updatetitre"];
            $ects=$_POST["updateects"];
            $nombre=$_POST["updatenombre"];
            $contenu=$_POST["updatecontenu"];
            for($i=0;$i<count($semestre);$i++){
                $cours=Assocours::where('code',$code[$i])->first();
                $cours->semestre=$semestre[$i];
                $cours->titre=$titre[$i];
                $cours->ects=$ects[$i];
                $cours->nombre=$nombre[$i];
                $cours->contenu=nl2br($contenu[$i]);
                $cours->nomdestination=$nom;
                $cours->save();
            }
        }       
        if(isset($_POST['intro'])){
            $intro=nl2br($_POST['intro']);
            $temoignages=nl2br($_POST['temoignages']);
            $astucesinfos=nl2br($_POST['astucesinfos']);
            $destination=Destination::where('nom',$nom)->first();
            $destination->intro=$intro;
            $destination->temoignages=$temoignages;
            $destination->astucesinfos=$astucesinfos;
            $destination->save();
        }
        return redirect("/edit/$nom");

    }
    public function suppDestination(){
        $nom=$_POST['delete'];
        Destination::where('nom',$nom)->delete();
        Assolien::where('nomdestination',$nom)->delete();
        $urls=Assoimage::where('nom',$nom)->get();
        foreach($urls as $url){
            unlink($url->url);
        }
        Assoimage::where('nom',$nom)->delete();
        Assocours::where('nomdestination',$nom)->delete();
        Assoblog::where('nomdestination',$nom)->delete();
        return redirect('/GestionDestinations');
    }
    public function affichageEdition($nom){
        $destination=Destination::where('nom',$nom)->first();
        $cours=Assocours::where('nomdestination',$nom)->get();
        $blogs=Assoblog::where('nomdestination',$nom)->get();
        $liens=Assolien::where('nomdestination',$nom)->get();
        $photos=Assoimage::where('nom',$nom)->get();
        return view('editdestination',['destination' => $destination, 'cours' => $cours, 'blogs' => $blogs, 'liens' => $liens, 'photos' => $photos]);
    }
    public function affichageDestination($nom){
        $destination=Destination::where('nom',$nom)->first();
        $cours=Assocours::where('nomdestination',$nom)->get();
        $blogs=Assoblog::where('nomdestination',$nom)->get();
        $liens=Assolien::where('nomdestination',$nom)->get();
        $photos=Assoimage::where('nom',$nom)->get();
        return view('destination',['destination' => $destination, 'cours' => $cours, 'blogs' => $blogs, 'liens' => $liens, 'photos' => $photos]);
    }
}

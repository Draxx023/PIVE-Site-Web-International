<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\FichiersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/creation', function () {
return view('admin-creation');
})->middleware('admin');

Route::post('admin-creation', 'DestinationController@nouvelleDestination')->middleware('admin');
Route::post('/admin/creation', 'DestinationController@suppDestination')->middleware('admin');
Route::post('/admin/modification', 'DestinationController@editDestination')->middleware('admin');

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/admin/gestion', function () {
    return view('admin-gestion');
})->middleware('admin');

Route::get('/admin/fiches', function () {
    return view('admin-fiches');
})->middleware('admin');

Route::get('/admin/utilisateurs', [UserController::class,'liste'])->middleware('admin');
Route::post('/admin/utilisateurs/delete', [UserController::class,'delete'])->middleware('admin')->name('deleteadmin');
Route::post('/admin/utilisateurs/add', [UserController::class,'add'])->middleware('admin')->name('addadmin');

Route::get('/admin/fichiers', [FichiersController::class, 'showadmin'])->middleware('admin');

Route::get('/storage/{uid}/{filename}', function ($uid,$filename) {
    $file = Storage::disk('local')->get($uid.'/'.$filename);
    return response($file, 200)->header('Content-Type', 'application/pdf');
})->middleware('filesecu:{uid}');

Route::post('/admin/fiches/exportExcel', 'FastExcelController@exportCandidature')->middleware('admin');
Route::post('/admin/fiches/block', 'CandidatureController@bloquer')->middleware('admin');
Route::post('/admin/fiches/mail', 'CandidatureController@mail')->middleware('admin');
Route::get("/admin/fiche/{email}", "CandidatureController@showAdmin")->middleware('admin');
Route::post('/admin/fiche', "CandidatureController@storeAdmin")->name('fiche_candidature.storeAdmin')->middleware('admin');

Route::get("/admin-modification/{nom}", "DestinationController@affichageEdition")->middleware('admin');
Route::post("/admin-modification/{nom}",['as' => 'editDestination', 'uses' => 'DestinationController@editDestination'])->middleware('admin');


Route::get('/profil', function () {
    return view('profil');
});

Route::get('/profil/candidature', function () {
    return view('profil-candidature');
})->middleware('polytech');

Route::post('/profil/candidature', [CandidatureController::class, 'store'])->name('fiche_candidature.store')->middleware('polytech');
Route::post('/profil/fichiers/store', [FichiersController::class, 'store'])->name('fichier.store')->middleware('polytech');
Route::post('/profil/fichiers/delete', [FichiersController::class, 'delete'])->name('fichier.delete')->middleware('polytech');

Route::get('/profil/cv', function () {
    return view('profil-cv');
})->middleware('polytech');
Route::get('/profil/fichiers', [FichiersController::class, 'show'])->middleware('polytech');

Route::get('/auth/login', "AuthController@login");
Route::get('/auth/logout', "AuthController@logout");

Route::get('/destinations', 'DestinationController@affichageDestinations');
Route::get("/destination/{nom}", "DestinationController@affichageDestination");



?>

<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VouterController;
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
//route pour la page d'acceuil
Route::get('/', function () {
    return view('survey.home');
});
//route pour le forumlaire de connexion
Route::get('login',function(){
    return view('survey.login');
});
Route::post('login',[VouterController::class,'login']);
Route::get('signin', [VouterController::class,'create']);
Route::post('signin',[VouterController::class,'store']);
Route::get('profile',function () {

    return view('survey.profile');
})->middleware('profil');
//Route afficher toute les Survey disponible
Route::get('surveys',[SurveyController::class,'index']);
//route affiche survey en detail
Route::get('survey',function(){
    return view('survey.survey');
})->middleware('survey');
//Route afficher une survey en detail grâce à son id
Route::get('survey/{id}',[SurveyController::class,'show']);
//Route d'affichage des survey pour lesquels le vouter à voté.
Route::get('vouter/surveys',[VouterController::class,'surveys']);
// route pour deconnexion
Route::get('logout',[VouterController::class,'logout']);
// les routes de la partie admin voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// Route pour voter
Route::get('vote/{id}/{vote}',[VouterController::class,'vote']);
// Route pour les resultats

Route::get('results',[SurveyController::class,'resultats']);
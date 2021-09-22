<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //fonction qui retourne la liste des surveys en cours
    public function index()
    {
        $current_date = date('Y-m-d');
        $surveys=  Survey::with('Projet')
            ->whereDate('date_debut','<=',$current_date)
            ->whereDate('date_fin','>=',$current_date)
            ->get();

        return $surveys;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //fonction qui affiche les details d'un surveys
    public function show($id)
    {
        try{
            $survey = Survey::with('Projet')
                ->where('id', '=', $id)->first();
            if(session()->has('message')) {
                $message=session()->get('message');
                return redirect('survey')->with(compact('survey', 'message'));
            } else {
                return redirect('survey')->with('survey',$survey);
            }
        }
        catch(ModelNotFoundException $e){
             return redirect('profile');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resultats(){
        //creer une collection qui contiendra la liste des survey avec les nombre des votes pour et contres
        $resultat=collect();
        // recuperer toutes les surveys
        $surveys =Survey::all();
        // une boucle pour parcourir survey par survey
        foreach($surveys as $survey){
        //recuperation des nombre des vote pour (pour le survey encoure dans la boucle
        $vote_pour= DB::table('survey_vouter')->where('survey_id', $survey->id )->where('vote','Pour')->count();
        //recuperation des nombre des vote Contre (pour le survey encoure dans la boucle
        $vote_contre= DB::table('survey_vouter')->where('survey_id', $survey->id )->where('vote','Contre')->count();
       //creer un tableau qui contiendra 3 elements (survey (encours),nombres vote pour et nombre votes contre)
        $result = [$survey,$vote_pour,$vote_contre];
        // inserrer le tableau dans la collection creer initialement
        $resultat->push($result);
        }
        // retourner la vue avec la collection en param
        return view('survey/resultat',['resultat'=>$resultat]);


    }
}

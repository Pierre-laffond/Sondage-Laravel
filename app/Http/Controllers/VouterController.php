<?php

namespace App\Http\Controllers;

use App\Models\Partie;
use App\Models\Survey;
use App\Models\Vouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VouterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $parties = Partie::all();
        return view('survey/signin',['parties'=>$parties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //s'inscrire et enregistrement d'un user
    public function store(Request $request)
    {
        $vouter = new Vouter();
        $vouter->first_name= $request->first_name;
        $vouter->last_name=$request->last_name;
        $vouter->email=$request->email;
        $vouter->password=$request->password;
        $vouter->birthdate=$request->birthdate;
        $vouter->phone_number=$request->phone_number;
        $vouter->partie_id=$request->partie_id;

        try{
            $vouter->save();
            session(['vouter' => $vouter]);
            $partie = $vouter->partie()->first();
            session(['partie' => $partie]);
            // recuperer la liste des surveys encours
            $surveyController = new SurveyController();
            $surveys = $surveyController->index();

            if($surveys){
                session()->forget('surveys');
                session(['surveys' => $surveys]);
            }

            session()->forget('vouter');
            session()->forget('partie');

            return redirect('profile');
        }
        catch(\Exception $e){

            $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    //fonction de connection d'un vouter a la database
    public function login(Request $request){
       $vouter=  Vouter::where('email', $request->email)
           ->where('password',$request->password)
           ->first();
       if($vouter){
           session()->forget('vouter');
           session()->forget('partie');

           session(['vouter' => $vouter]);
           $partie = $vouter->partie()->first();
           session(['partie' => $partie]);
           // recuperer la liste des surveys encours
           $surveyController = new SurveyController();
           $surveys = $surveyController->index();
           VouterController::surveys();
           if($surveys){
            session()->forget('surveys');
            session(['surveys' => $surveys]);
           }



          return redirect('profile');
       }
       else{
          return redirect('login');
       }

    }
   //vider la session pour se deconnecter
    public function logout(){

        session()->forget('vouter');
        session()->flush();
        session()->forget('surveys');
        session()->flush();
        session()->forget('partie');
        session()->flush();
        session()->forget('voted_surveys');
        session()->flush();
        return redirect('/');

    }
    // recuperer les resultats des votes
    public function getResult($id){

        $vote_pour= DB::table('survey_vouter')->where('survey_id', $id )->where('vote','Pour')->count();
        $vote_contre= DB::table('survey_vouter')->where('survey_id', $id )->where('vote','Contre')->count();
        $result = $vote_pour * 100/($vote_pour + $vote_contre);
        //var_dump($result);
        Survey::where('id',$id)->update(['resultat'=>$result]);
        return $result;
    }
    //voter sur un sondage
    public function vote($id,$vote)
    {
        $vouter=session()->get('vouter');
        $surveys_voted= DB::table('survey_vouter')->where('survey_id', $id )->where('vouter_id',$vouter->id)->count();

        if(!$surveys_voted){

            $vouter->surveys()->attach($id,['vote'=>$vote]);
            // Compte les pour et les contre
            $result = VouterController::getResult($id);
            $voted_survey= session('voted_surveys');
            $voted_survey->push(Survey::find($id));
            session()->forget('voted_surveys');
            session(['voted_surveys' => $voted_survey]);

            return redirect('survey/'.$id);
        } else {

            $result = VouterController::getResult($id);

           return redirect('survey/'.$id)->with('message','Vous avez déjà voter');
        }
    }
    //recuperer les survey sur lesquels on a voté
    public  function surveys(){
        $vouter = session()->get('vouter');

        $surveys= $vouter->surveys()->get();
        if($surveys){
            session()->forget('voted_surveys');
            session(['voted_surveys' =>$surveys]);
        }


    }
}

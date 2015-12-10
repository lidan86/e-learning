<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Posts;
use App\Questions;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnswersController extends Controller
{

    public function getFile($fileName){
        return '/js/' . $fileName;
    }

    public function getAnswer($QuestionID){

    }

    public function checkAnswer($QuestionID, $AnswerID){
        $answer = Answers::findOrNew($AnswerID)->toArray();
        $result = '<response><logical>' . $answer['Logical'] . '</logical><answer>';
        $answers = Answers::where('QuestionID', '=', $QuestionID)->get()->toArray();
        $answerid = '';
        foreach($answers as $a){
            if ($a['Logical'] == 1){
                $answerid = $a['id'];
                break;
            }

        }
        $result .= $answerid . '</answer></response>';
        return $result;
    }

    public function addAnswer($QuestionID){
        $question = Questions::findOrNew($QuestionID)->toArray();
        $photo = $question['Photo'];
        $answers = Answers::where('QuestionID', '=', $QuestionID)->get()->toArray();
        $result = array('QuestionID' => $QuestionID, 'Answers' => $answers, 'Photo' => $photo);
        return view('admin.addanswer')->with(["QuestionID" => $QuestionID, 'Photo' => $photo, 'Answers' => $answers]);
    }

    public function saveAnswer(Request $request){
        $data = $request->all();
        $answer = new Answers();
        $answer->QuestionID = $data['QuestionID'];
        if (array_key_exists('Logical', $data))
            $answer->Logical = $data['Logical'];
        $answer->Detail = $data['Detail'];
        $answer->toArray();
        $answer->save();
        return redirect('/admin/addanswer/'.$answer->QuestionID);
    }

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
}

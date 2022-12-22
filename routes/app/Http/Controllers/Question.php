<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Question extends Controller
{
    //take question from database
    public function index()
    {
        $questions = \App\Models\Question::all();
        return view('welcome')->with('questions', $questions);
    }
   
    //add type of question to database
    public function type(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        DB::table('questions')->insert([
            'type' => $request->type,
        ]);

        return redirect('/welcome');
    }


    //add new question to database after validation using DB
    public function create(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($request->type == 'MCQ' || $request->type == 'DCQ') {
            $request->validate([
                'option1' => 'required',
                'option2' => 'required',
                'option3' => 'required',
            ]);
            // If one of the options is not the same as the answer, then show error but if type is text, then do not show error
            if ($request->option1 != $request->answer && $request->option2 != $request->answer && $request->option3 != $request->answer && $request->option4 != $request->answer) {
                return redirect('/create')->with('error', 'One of the options must be the same as the answer');
            }
    
            // If one of the options is the same as the other one, then show error 
            if ($request->option1 == $request->option2 || $request->option1 == $request->option3 || $request->option1 == $request->option4 || $request->option2 == $request->option3 || $request->option2 == $request->option4 || $request->option3 == $request->option4) {
                return redirect('/create')->with('error', 'Options must be different from each other');
            }
            DB::table('questions')->insert([
                'question' => $request->question,
                'answer' => $request->answer,
                'type' =>   $request->type,
                'option1' => $request->option1,
                'option2' => $request->option2,
                'option3' => $request->option3,
            ]);
        }

        else{
            DB::table('questions')->insert([
                'question' => $request->question,
                'answer' => $request->answer,
                'type' =>   $request->type,
            ]);
        }


        
        

        

        

        return redirect('/welcome');
    }

    //delete question from database
    
    public function delete($id)
    {
        DB::table('questions')->where('id', $id)->delete();
        return redirect('/welcome');
    }
    //edit question from database
    public function edit($id)
    {
        $question = \App\Models\Question::find($id);
        return view('edit_question')->with('question', $question);
    }


    //update question from database
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'option' => 'required'
        ]);

        DB::table('questions')->where('id', $id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'type' => $request->type,   
            'option' => $request->option
        ]);

        return redirect('/welcome');
    }

}

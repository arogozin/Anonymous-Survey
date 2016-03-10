<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\Survey;
use Hash;
use Carbon\Carbon;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.index');
    }
    
    public function login(Request $request)
    {
        $request->session()->forget('identity');
        return view('survey.login');
    }
    
    public function identify($request, $netid)
    {
        $secret = Hash::make($netid);
        $takenIdentities = Identity::whereTaken(true)->get();
        $identity = null;
        
        foreach ($takenIdentities as $takenIdentity) {
            if (Hash::check($netid, $takenIdentity->secret)) {
                $identity = $takenIdentity;
            }
        }
        
        if (!$identity) {
            $identity = Identity::whereTaken(false)->get()->random(1);
            $identity->secret = $secret;
        }

        $request->session()->put('identity', $identity->name);
        $request->session()->forget('netid');
        
        $identity->taken = true;
        $identity->save();
        
        return $identity;
    }
    
    public function survey(Request $request)
    {
        $request->session()->forget('identity');
        $identity = $this->identify($request, strtolower($request->input('netid')));

        $surveys = Survey::whereActive(true)->get();
        
        if (sizeof($identity->answers) < 1) {
            $survey = Survey::whereActive(true)->first();
            
            if ($survey) {
                return view('survey.form', ['survey' => $survey, 'identity' => $identity]);
            } else {
                return view('survey.404');
            }
        } else {
            $survey_ids = [];
            foreach ($identity->answers as $answer) {
                array_push($survey_ids, $answer['survey_id']);
            }
            
            foreach ($surveys as $survey) {
                if ($survey->repeat) {                    
                    if (!in_array($survey->id, $survey_ids) || !array_key_exists('repeat', $identity->answers[$survey->id])) {
                        return view('survey.form', ['survey' => $survey, 'identity' => $identity]);
                    }
                } else {
                    if (!in_array($survey->id, $survey_ids)) {
                        return view('survey.form', ['survey' => $survey, 'identity' => $identity]);
                    }
                }
            }
        }
        if ($surveys) {
            return view('survey.result');
        } else {
            return view('survey.404');
        }
        
        //return view('survey.form', ['survey' => $survey]);
        //return view('survey.index');
    }
    
    public function result(Request $request)
    {
        // ['survey_id', 'identity_id', 'identity', 'answers'];
        $identity = Identity::whereName($request->input('identity'))->first();
        $current_time = Carbon::now()->toDayDateTimeString();
        $answer = [
            'survey_id' => $request->input('survey_id'),
            'answers' => [],
            'timestamp' => $current_time,
        ];
        
        foreach ($request->all() as $key => $value) {
            if ($key[0] == 'a') {
                $answer['answers'][(int) str_replace('a', '', $key)] = $value;
            }
        }
        
        $answers = $identity->answers;
        if (array_key_exists($request->input('survey_id'), $answers)) {
            $answers[$request->input('survey_id')]['repeat'] = $answer;
        } else {
            $answers[$request->input('survey_id')] = $answer;
        }
        
        $identity->answers = $answers;
        
        if (!$identity->taken) {
            $identity->taken = true;
        }
        
        $identity->confirmed = true;
        $identity->save();
        
        return view('survey.result');
    }
    
    public function create()
    {
        return view('admin.survey.create');
    }
    
    public function store(Request $request)
    {
        // ['title', 'class', 'semester', 'questions', 'active'];
        $survey = Survey::create([
            'title' => $request->input('title'),
            'class' => $request->input('class'),
            'semester' => $request->input('semester'),
            'questions' => $request->input('questions'),
            'active' => false,
        ]);
        
        return response()->json($survey);
    }
    
    public function delete($id)
    {
        if ($survey = Survey::find($id)) {
            $survey->delete();
        }
        
        return redirect('admin/survey');
    }
    
    public function activate($id)
    {
        if ($survey = Survey::find($id)) {
            $survey->active = true;
            $survey->save();
        }
        
        return redirect('admin/survey');
    }
    
    public function deactivate($id)
    {
        if ($survey = Survey::find($id)) {
            $survey->active = false;
            $survey->save();
        }
        
        return redirect('admin/survey');
    }
    
    public function view($id)
    {
        if ($survey = Survey::find($id)) {
            $answers = [];
            
            foreach (Identity::whereConfirmed(true)->get() as $identity) {
                if (array_key_exists($survey->id, $identity->answers)) {
                    $answers[$identity->name]['answers'] = $identity->answers[$survey->id]['answers'];
                    
                    if (array_key_exists('repeat', $identity->answers[$survey->id])) {
                        $answers[$identity->name]['repeat'] = $identity->answers[$survey->id]['repeat']['answers'];
                    }
                }
            }
            
            return view('admin.survey.view', ['survey' => $survey, 'answers' => $answers]);
        }
        
        return redirect('admin/survey');
    }
    
    public function repeat($id)
    {
        if ($survey = Survey::find($id)) {
            $survey->repeat = !$survey->repeat;
            $survey->active = ($survey->repeat)?true:$survey->active;
            $survey->save();
        }
        
        return redirect('admin/survey');
    }
}

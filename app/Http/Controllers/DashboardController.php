<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Identity;
use App\Models\Survey;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.survey.index', ['surveys' => Survey::all()]);
    }
}

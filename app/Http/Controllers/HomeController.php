<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Biodata;
use App\Models\Motivation;


class HomeController extends Controller
{
    public function index(){
        return view('home.index', [
            'title' => ' | Home',
            'subjects' => Subject::where('grade_id', auth()->user()->grade_id)->get(),
            'biodata' => Biodata::all(),
            'motivations' => Motivation::all()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index()
    {


        return view('admin.index');
    }
}

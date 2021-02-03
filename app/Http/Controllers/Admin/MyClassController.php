<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassType;
use App\Models\MyClass;

class MyClassController extends Controller
{
    public function index()
    {
        $d['my_classes'] = MyClass::orderBy('name', 'asc')->with('class_type')->get();
        $d['class_types'] = ClassType::orderBy('name', 'asc')->get();

        return view('admin.classes.index', $d);
    }
}

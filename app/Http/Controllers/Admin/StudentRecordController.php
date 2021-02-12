<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRecordController extends Controller
{
    public function create()
    {
        // $data['my_classes'] = $this->my_class->all();
        // $data['parents'] = $this->user->getUserByType('parent');
        // $data['dorms'] = $this->student->getAllDorms();
        // $data['states'] = $this->loc->getStates();
        // $data['nationals'] = $this->loc->getAllNationals();
        return view('admin.students.create');
    }
}

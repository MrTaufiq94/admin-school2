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

    public function create()
    {
        $d['my_classes'] = MyClass::orderBy('name', 'asc')->with('class_type')->get();
        $d['class_types'] = ClassType::orderBy('id', 'asc')->get();
        // $d['class_types'] = ClassType::whereNotExists(function($query){
        //     $query->select(DB::raw(1))
        //           ->from('my_classes');
        // })->orderBy('id', 'asc')->get();

        return view('admin.classes.create', $d);
    }

    public function store(Request $req)
    {
        //print_r($req->all());exit();
        $this->validate($req, [
            'name' => 'required|string|min:3',
            'class_type_id' => 'required'
        ]);
        if(MyClass::where('name',$req->name)->exists()){
            return redirect()
            ->route('admin.classes.create')
            ->with('toast_error','Name Already Exist!');
        }else{
            $c = MyClass::create([
                'name' => $req->name,
                'class_type_id' => $req->class_type_id
            ]);
        }

        if($c) {
            return redirect()
            ->route('admin.classes.index')
            ->with('toast_success','Class has been inserted!');
        }else {
            return redirect()
            ->route('admin.classes.index')
            ->with('toast_error','Class failed to insert!');
        }
       
    } 

    public function edit($id)
    {
        $d['c'] = $c = MyClass::find($id);

        return  view('admin.classes.edit', $d) ;
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'name' => 'required|string|min:3',
        ]);

        $c = MyClass::find($id);
        $c->update(["name"=>$req->name]);
        
        if($c) {
            return redirect()
            ->route('admin.classes.index')
            ->with('toast_success','Class has been updated!');
        } else {
            return redirect()
            ->route('admin.classes.index')
            ->with('toast_error','Class failed to update!');
        }
    }

    public function destroy($id)
    {
        $c = MyClass::find($id);
        $c->delete();
        if($c){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    
}

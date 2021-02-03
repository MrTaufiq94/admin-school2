<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use Storage;

class SettingController extends Controller
{
    public function index()
    {
        $s = Setting::all();
        //  $d['class_types'] = $this->my_class->getTypes();
        $d['s'] = $s->flatMap(function($s){
            return [$s->type => $s->description];
        });
        return view('admin.setting.index', $d);
    }

    public function update(Request $req,Setting $setting)
    {
        
        $validator = Validator::make($req->all(), [
            'system_name' => 'required|string|min:10',
            'current_session' => 'required|string',
            'address' => 'required|string|min:15',
            'system_email' => 'sometimes|nullable|email',
            'lock_exam' => 'required',
            'logo' => 'sometimes|nullable|image|mimes:jpeg,gif,png,jpg|max:2048',     
        ]); 

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $sets = $req->except('_token', '_method', 'logo');
        $sets['lock_exam'] = $sets['lock_exam'] == 1 ? 1 : 0;
        $keys = array_keys($sets);
        $values = array_values($sets);
        for($i=0; $i<count($sets); $i++){
            Setting::where('type', $keys[$i])->update(['description' => $values[$i]]);
            //$this->setting->update($keys[$i], $values[$i]);
        }

        if($req->hasFile('logo')){
            //rename file eg: 10-2020-22.jpg
            $filename = $setting->find(13)->type.'-'.date("Y-m-d").'.'.$req->logo->getClientOriginalExtension();

            //store file on storage
            Storage::disk('public')->put($filename, File::get($req->logo));

            //update row with filename
            $setting->find(13)->update(['description' => $filename]);
        }

        return redirect()
            ->route('admin.setting.index')
            // ->with([
            //     'alert-type' => 'success',
            //     'alert' => 'Your setting has been updated!'
            // ]);
            ->with('toast_success','Your setting has been updated!');

    }
}

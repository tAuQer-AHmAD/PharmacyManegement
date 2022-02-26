<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;
use App\Models\company;

class medicineController extends Controller
{
    public function create() {
        
        $Plane = company::all();
        return view ("medicine/add")->with(['Plane' => $Plane]);

        
        // return view ("buyer/store");
        }
        public function store (Request $request)
        {
            $tmpbuyerInfo = new medicine;
            
            $tmpbuyerInfo->name = $request->get('name');
            $tmpbuyerInfo->code = $request->get('code');
            
            $tmpbuyerInfo->comp_id = $request->get('comp');

            
    
            $tmpbuyerInfo->save();
    
            return redirect('medicine/read');
        }
    public function read()
    {
        $medicine = Medicine::all();
        return view('medicine/read')->with(['medicine' => $medicine]);
    }
    public function update($id)
    {
        $medicine = Medicine::find($id);     	// Load students using the model 'Student'
        // $departments = Department::all();     	// Load students using the model 'Student'
    
        // Pass the $students to the view, 'student/read'
        return view('medicine/update')
            ->with(['medicine' => $medicine]);
            // ->with (['departments' => $departments]);
    }
    public function destroy($id) 
            {
               $nooras = medicine::where('id', $id)->firstorfail()->delete();
               echo ("User Record deleted successfully.");
               return redirect('medicine/read');
            }
}
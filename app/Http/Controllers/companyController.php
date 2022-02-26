<?php

namespace App\Http\Controllers;
use App\Models\company;
use Illuminate\Http\Request;

class companyController extends Controller
{
    public function create() {
        return view ("company/add");
        // return view ("buyer/store");
        }
    public function store (Request $request)
        {
            $tmpbuyerInfo = new company;
            $tmpbuyerInfo->name = $request->get('name');
            $tmpbuyerInfo->reg = $request->get('reg');
            $tmpbuyerInfo->hq = $request->get('hq');
            
            
    
            $tmpbuyerInfo->save();
    
            return redirect('company/read')->with('status', 'name'.$tmpbuyerInfo->name.' Name added Successfully!');
        }
    public function read()
        {
            $company = company::all();
            return view('company/read')->with(['company' => $company]);
        }
        public function update($id)
        {
            $medicine = company::find($id);     	// Load students using the model 'Student'
            // $departments = Department::all();     	// Load students using the model 'Student'
        
            // Pass the $students to the view, 'student/read'
            return view('company/update')
                ->with(['medicine' => $medicine]);
                // ->with (['departments' => $departments]);
        }
    
        public function saveUpdatedData(request $updateForm, $id) {
            $medicine = company::find($id);     // Load students using the model 'Student'
        
            $medicine->name = $updateForm->get('name');
            $medicine->reg = $updateForm->get('reg');
            $medicine->hq = $updateForm->get('hq');
            
            // $medicine->married = $updateForm->get('maritalStatus');
        
            $medicine->save();
        
            // Reload the read page
            return redirect('company/read');
            }

            public function destroy($id) 
            {
               $nooras = company::where('id', $id)->firstorfail()->delete();
               echo ("User Record deleted successfully.");
               return redirect('company/read');
            }
}
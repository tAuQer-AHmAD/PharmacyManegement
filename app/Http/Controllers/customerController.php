<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function create() {
        return view ("customer/add");
        // return view ("buyer/store");
        }
    public function store (Request $request)
        {
            $tmpbuyerInfo = new customer;
            $tmpbuyerInfo->name = $request->get('name');
            $tmpbuyerInfo->cnic = $request->get('cnic');
            $tmpbuyerInfo->phone = $request->get('phone');
            $tmpbuyerInfo->adress = $request->get('adress');
            
    
            $tmpbuyerInfo->save();
    
            return redirect('customer/read')->with('status', 'name'.$tmpbuyerInfo->name.'Customer Name added Successfully!');
        }
    public function read()
        {
            $customer = customer::all();
            return view('customer/read')->with(['customer' => $customer]);
        }
        public function update($id)
        {
            $medicine = customer::find($id);     	// Load students using the model 'Student'
            // $departments = Department::all();     	// Load students using the model 'Student'
        
            // Pass the $students to the view, 'student/read'
            return view('customer/update')
                ->with(['medicine' => $medicine]);
                // ->with (['departments' => $departments]);
        }
    
        public function saveUpdatedData(request $updateForm, $id) {
            $medicine = customer::find($id);     // Load students using the model 'Student'
        
            $medicine->name = $updateForm->get('name');
            $medicine->cnic = $updateForm->get('cnic');
            $medicine->phone = $updateForm->get('phone');
            $medicine->adress = $updateForm->get('adress');
            // $medicine->married = $updateForm->get('maritalStatus');
        
            $medicine->save();
        
            // Reload the read page
            return redirect('customer/read');
            }
            public function destroy($id) 
            {
               $nooras = customer::where('id', $id)->firstorfail()->delete();
               echo ("User Record deleted successfully.");
               return redirect('customer/read');
            }
}
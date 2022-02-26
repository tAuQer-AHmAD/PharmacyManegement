<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sale;
use App\Models\medicine;
use App\Models\customer;
class saleController extends Controller
{
    public function create() {
        
        $inventory = medicine::all();
        $customer = customer::all(); // Load all departments. To add in the dropdown
        return view ("sale/add")->with(['inventory' => $inventory])->with(['customer' => $customer]);

        
        // return view ("buyer/store");
        }
        public function store (Request $request)
        {
            $tmpbuyerInfo = new sale;
            
            $tmpbuyerInfo->med_id = $request->get('inv');
            $tmpbuyerInfo->cust_id = $request->get('cust');
            $tmpbuyerInfo->quantity = $request->get('quantity');
           

            
    
            $tmpbuyerInfo->save();
    
            return redirect('sale/read');
        }
    public function read()
    {
        $sale = sale::all();
        $customer = customer::all();
        $inventory = medicine::all();
        
        return view('sale/read')->with(['sale' => $sale])->with(['customer' => $customer])->with(['inventory' => $inventory]);
    }
    public function update($id)
    {
        $med = sale::find($id);     	// Load students using the model 'Student'
        // $departments = Department::all();     	// Load students using the model 'Student'
    
        // Pass the $students to the view, 'student/read'
        return view('sale/update')
            ->with(['med' => $med]);
            // ->with (['departments' => $departments]);
    }
    public function saveUpdatedData(request $updateForm, $id) {
        $medicine = sale::find($id);     // Load students using the model 'Student'
    
        $medicine->quantity = $updateForm->get('stock');
        
        
        // $medicine->married = $updateForm->get('maritalStatus');
    
        $medicine->save();
    
        // Reload the read page
        return redirect('sale/read');
        }
    public function destroy($id) 
            {
               $nooras = sale::where('id', $id)->firstorfail()->delete();
               echo ("User Record deleted successfully.");
               return redirect('sale/read');
            }
    
}
<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('dashboard.admin.customer.index');
    }


    public function store(StoreCustomerRequest $request) {
        $validator = $request->validated(); // Obtain the validated data
        
        // Check if validation fails
        if (empty($validator)) {
            return response()->json([
                'status' => 'failed',
                'message' =>   $validator->messages()->all(),
            ]);
        }

        $customerData = new Customer();
        $customerData->name        = $request->name;
        $customerData->email       = $request->email;
        $customerData->phoneNumber = $request->phoneNumber;
        $customerData->address     = $request->address;

        $customerData->save();
        
        return response()->json([
            "status" => "success"
        ]);
    }

    public function viewAllCustomer(Request $request){
        $allCustomer = Customer::query();
        
        if (!empty($request->searchValue)) {
            $allCustomer->where('name', 'like', '%' . $request->searchValue . '%');
        }
        
        $allCustomer = $allCustomer->get(); // Paginate the results
        
        return response()->json([
            "status"       => "success",
            "allcustomer"  => $allCustomer
        ]);
    }

    public function editCustomer($id){
        $customer = Customer::find($id);

        return response()->json([
            "status"=>"success",
            "data"=>$customer
        ]);
    }

    public function updateCustomer(Request $request,$id) {
       
        $customerData = Customer::find($id);
        $customerData->name        = $request->name;
        $customerData->email       = $request->email;
        $customerData->phoneNumber = $request->phoneNumber;
        $customerData->address     = $request->address;

        $customerData->save();
        
        return response()->json([
            "status" => "success"
        ]);
    }

    public function deletecustomer($id){
        $customerData = customer::find($id);
        $customerData->delete();
        
        return response()->json([
            "status" => "success"
        ]);

    }


    
}

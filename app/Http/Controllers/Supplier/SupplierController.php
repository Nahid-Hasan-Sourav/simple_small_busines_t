<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('dashboard.admin.supplier.index');
    }

    public function store(StoreSupplierRequest $request) {
        $validator = $request->validated(); // Obtain the validated data
        
        // Check if validation fails
        if (empty($validator)) {
            return response()->json([
                'status' => 'failed',
                'message' =>   $validator->messages()->all(),
            ]);
        }

        $supplierData = new Supplier();
        $supplierData->name        = $request->name;
        $supplierData->email       = $request->email;
        $supplierData->phoneNumber = $request->phoneNumber;
        $supplierData->address     = $request->address;

        $supplierData->save();
        
        return response()->json([
            "status" => "success"
        ]);
    }

    public function viewAllSupplier(Request $request){
        $allSupplier = Supplier::query();
        
        if (!empty($request->searchValue)) {
            $allSupplier->where('name', 'like', '%' . $request->searchValue . '%');
        }
        
        $allSupplier = $allSupplier->get(); // Paginate the results
        
        return response()->json([
            "status"       => "success",
            "allSupplier"  => $allSupplier
        ]);
    }

    public function editSupplier($id){
        $supplier = Supplier::find($id);

        return response()->json([
            "status"=>"success",
            "data"=>$supplier
        ]);
    }

    public function updateSupplier(Request $request,$id) {
       
        $supplierData = Supplier::find($id);
        $supplierData->name        = $request->name;
        $supplierData->email       = $request->email;
        $supplierData->phoneNumber = $request->phoneNumber;
        $supplierData->address     = $request->address;

        $supplierData->save();
        
        return response()->json([
            "status" => "success"
        ]);
    }

    public function deleteSupplier($id){
        $supplierData = Supplier::find($id);
        $supplierData->delete();
        
        return response()->json([
            "status" => "success"
        ]);

    }


    
    
    
    
}

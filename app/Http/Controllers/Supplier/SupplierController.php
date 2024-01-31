<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
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
        
        return response()->json([
            "status" => "success"
        ]);
    }
    
    
    
}

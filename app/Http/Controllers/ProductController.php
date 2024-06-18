<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create(){
         return view("frontend.product-create");
    }

    public function store(ProductFormRequest $request){
// we can validate it by using request validation functions 
// we can validate it by using request validation functions 

        $request->validated();


// we can validate it in this way 
// we can validate it in this way 

    //   $validator = Validator::make($request->all(), [
    //           'name' =>'required|min:3|max:255|string',
    //         'description' =>'required|string',
    //         'price' =>'required|numeric',
    //         'stock' => 'required|numeric',
    //         'is_active' =>'sometimes',
    //   ]);

    //   if($validator->fails()){
    //     return redirect()->back()->withErrors($validator->errors())->withInput();
    //   }

// we can validate it in this way 
// we can validate it in this way 

        // $request->validate([
        //     'name' =>
        //     ['required','min:3','max:255','string'],
        //     'description' =>'required|string',
        //     'price' =>'required|numeric',
        //     'stock' => 'required|numeric',
        //     'is_active' =>'sometimes',

        // ],[
        //     'name.required' =>'Product Name cannot be empty',
        //      'name.min' =>'Product Name must be at least 3 characters',
        // ]);


// we can validate it in this way 
// we can validate it in this way 

        // $request->validate([
        //     'name' =>'required|min:3|max:255|string',
        //     'description' =>'required|string',
        //     'price' =>'required|numeric',
        //     'stock' => 'required|numeric',
        //     'is_active' =>'sometimes',

        // ]);

// you can store the data in this way 
// you can store the data in this way 

        // $product = new Product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->is_active = $request->is_active == true ? 1:0;
        // $product->save();

// you can also store the data in this way 
// you can also store the data in this way 

        // Product::create([
        // 'name' => $request->name,   
        // 'description' => $request->description,
        // 'price' => $request->price,
        // 'stock' => $request->stock,
        // 'is_active' => $request->is_active == true ? 1:0,
        // ]);

// you can also store the data in this way 
// you can also store the data in this way

// Product::create($request->all());


// you can also store the data in this way 
// you can also store the data in this way

    //    $product =  new  Product ([
    //     'name' => $request->name,   
    //     'description' => $request->description,
    //     'price' => $request->price,
    //     'stock' => $request->stock,
    //     'is_active' => $request->is_active == true ? 1:0,
    //     ]);  
    //     $product->save();

// you can also store the data in this way 
// you can also store the data in this way

    // $product =  new  Product();
    // $product ->fill([
    //     'name' => $request->name,   
    //     'description' => $request->description,
    //     'price' => $request->price,
    //     'stock' => $request->stock,
    //     'is_active' => $request->is_active == true ? 1:0,
    //     ]);
    //     $product->save();

// you can also store the data in this way 
// you can also store the data in this way
    
    // DB::table("products")->insert([
    //     'name' => $request->name,   
    //     'description' => $request->description,
    //     'price' => $request->price,
    //     'stock' => $request->stock,
    //     'is_active' => $request->is_active == true ? 1:0,
    // ]);

// you can also store the data in this way 
// you can also store the data in this way

    // Product::insert([
    //     'name' => $request->name,   
    //     'description' => $request->description,
    //     'price' => $request->price,
    //     'stock' => $request->stock,
    //     'is_active' => $request->is_active == true ? 1:0,
    // ]);


// you can also store the data in this way 
// you can also store the data in this way

// Product::firstOrCreate(
//     [
//         'name' => $request->name, 
//     ],
//     [
//         'description' => $request->description,
//             'price' => $request->price,
//             'stock' => $request->stock,
//             'is_active' => $request->is_active == true ? 1:0,
//     ]
// );

// you can also store the data in this way 
// you can also store the data in this way

// $product = Product::firstOrCreate(
//     [
//         'name' => $request->name, 
//     ],
//     [
//         'description' => $request->description,
//             'price' => $request->price,
//             'stock' => $request->stock,
//             'is_active' => $request->is_active == true ? 1:0,
//     ]
// );

// $product->save();

// we can also update the data in this way to taking name otherwise if type new data then it should be created new data into database
// we can also update the data in this way to taking name otherwise if type new data then it should be created new data into database



Product::updateOrCreate(
    [
        'name' => $request->name, 
    ],
    [
        'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_active' => $request->is_active == true ? 1:0,
    ]
);


        return redirect('/products/create')->with('status','Product Added successfully');
    }
}

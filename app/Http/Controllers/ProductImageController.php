<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    public function index(int $productId){
        $productImage = ProductImage::where("product_id", $productId)->get();
        $product  = Product::findOrFail($productId);
      return view("product-image.index",compact("product","productImage"));
    }  

    public function store(Request $request, int $productId){
       $request->validate([
        'images.*' => 'required|image|mimes:png,jpg,jpeg,gif,webp,'
       ]);

     $product = Product::findOrFail($productId);
        
       $files = '';
       $imageData = [];
       if($files = $request->file('images')){
        foreach($files as $key => $file){
            $extension = $file->getClientOriginalExtension();
            $filename = $key.'-'.time().'.'.$extension;
            $path = "uploads/products/";
            $file->move($path, $filename);

            $imageData[] = [
              'product_id' => $product->id,
              'image' => $path.$filename,
            ];
        }
       }

       ProductImage::insert($imageData);

       return redirect()->back()->with('status','Uploaded successfully');
    }

    public function destroy(int $productImageId){
        $productImage = ProductImage::findOrFail($productImageId);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
           }
        $productImage->delete();

        return redirect()->back()->with('status','Deleted successfully');
    }
}

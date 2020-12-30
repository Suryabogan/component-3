<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //

    public function Homepage()
    {
       $items = Product::all();
        return response()->json($items);
    }

    public function addNewproduct(Request $request)
    {

        // dd($request->all());   
        $res = Product::create($request->all());
        if ($res) {
            return $res;
        }else{
            echo "Failed to add";
        }
    }

    public function getByid($id)
    {
        $data = Product::find($id)->first();
        return $data;
    }

    public function deleteItem($id)
    {
        
        return ($data = Product::find($id)->delete()) ? response("deleted") : response("Error");

    }

    public function updateItem(Request $request)
    {
        $id = $request->id;  

        $product = Product::find($id)->first();
        
        $product->producttype = $request->product_type;
        $product->title = $request->title;
        $product->fname = $request->firstname; 
        $product->sname = $request->surname; 
        $product->price = $request->price; 
        $product->pages = $request->pages;

        $res= $product->save();
        if ($res) {
            return response("updated");
        }else{
            echo "Failed to update";
        }
    }
}

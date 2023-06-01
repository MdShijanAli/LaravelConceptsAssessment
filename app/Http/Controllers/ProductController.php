<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
{

    $products = DB::table('products')->get();


    foreach ($products as $product) {
        echo "Product ID: $product->id, Name: $product->name, Price: $product->price<br>";
    }
}

public function create()
{

    echo "Create Product Form";

}


public function store()
{

    $product = new Product;
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];


    $product->save();


    echo "Product created successfully!";
}


public function edit($id)
{

    $product = Product::find($id);

    if ($product) {

        echo "Edit Product Form";

    } else {

        echo "Product not found!";
    }
}


public function update($id)
{

    $product = Product::find($id);

    if ($product) {

        $product->name = $_POST['name'];
        $product->price = $_POST['price'];

        $product->save();

        echo "Product updated successfully!";
    } else {
        echo "Product not found!";
    }
}


public function destroy($id)
{
    $product = Product::find($id);

    if ($product) {
        $product->delete();

        echo "Product deleted successfully!";
    } else {
        echo "Product not found!";
    }
}


}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducStoreRequest; 
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create instance of the Product model.
        $products = Product::all();
        // Return the view with the products. 
        return view('products.index', compact('products'));
        // compact() return data to the vire index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Define $product como variable e instaciamos el modelo Product. Con su fatory method create()
        $product = new Product();
        // Return the view with the products. 
        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Aplicamos nuestro Request creado al controllador en la funcion Store 
    public function store(ProducStoreRequest $request)
    {
        $data = $request->all();  // Creamos variable y le asignamos el valor de la variable request
        if ($request->hasFile('image')) { //  Definimos si reuquest tiene un archivo con nombre image que viene del input
            $image_path = $request->file('image')->store('medias');  // Definomos la variable path para asignarle de rrequest el archivo image y que lo almacene en "medias" 
            $data['img_url'] = $image_path; // Asignamos el valor de la variable path a la variable img_url
            // Esto nos devolvera la ruta de la imagen para ser usada en la base de datos
        }
        Product::create($data); // Creamos el producto con los datos de la variable data
        return redirect()->route('products.index')->with('success', 'Product created successfully'); // Redirecionamos a la ruta products.index con un mensaje de exito
        // return redirect()->route('products.index')->with(['status'=>'success', 'message'=> 'Product created successfully']); // Redirecionamos a la ruta products.index con un mensaje de exito
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

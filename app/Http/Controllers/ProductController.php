<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
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
            $image_path = Cloudinary::upload($request->file('image')->getRealPath(),['folder'=>'invoiceApp/img/products'])->getSecurePath();  // Definomos la variable path para asignarle de rrequest el archivo image y que lo almacene en "medias"
            $data['img_url'] = $image_path; // Asignamos el valor de la variable path a la variable img_url
            // Esto nos devolvera la ruta de la imagen para ser usada en la base de datos
        }
        Product::create($data); // Creamos el producto con los datos de la variable data
        return redirect()->route('products.index')->with(['status'=>'success', 'color'=>'green' , 'message'=> 'Product created successfully']); // Redirecionamos a la ruta products.index con un mensaje de exito
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
        return view('products.create', compact('product'));
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
        $data = $request->all();  // Recibimos todo
        if ($request->hasFile('image')) {
            Cloudinary::destroy($product->img_url);
            $image_path = Cloudinary::upload($request->file('image')->getRealPath(),['folder'=>'invoiceApp/img/products'])->getSecurePath();  // Definomos la variable path para asignarle de rrequest el archivo image y que lo almacene en "medias"
            $data['img_url'] = $image_path; // Asignamos el valor de la variable path a la variable img_url
            // Esto nos devolvera la ruta de la imagen para ser usada en la base de datos
        }
        $product->fill($data);
        $product->save(); // Creamos el producto con los datos de la variable data
        return redirect()->route('products.index')->with(['status'=>'success', 'color'=>'blue', 'message'=> 'Product Update successfully']); // Redirecionamos a la ruta products.index con un mensaje de exito
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // dd($product);
        try {
            $product->delete();
            $result = ['status' => 'success', 'color' => 'red', 'message' => 'Deleted successfully'];
        } catch (\Exception $e) {
            $result = ['status' => 'error', 'color' => 'red', 'message' => 'Product cannot be delete'];
        }
        return redirect()->route('products.index')->with($result);
    }
}

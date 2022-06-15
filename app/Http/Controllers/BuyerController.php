<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::all();
        return view('buyers.index', compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyer = new Buyer();
        return view('buyers.create', compact('buyer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();  // Creamos variable y le asignamos el valor de la variable request
        if ($request->hasFile('image')) { //  Definimos si reuquest tiene un archivo con nombre image que viene del input
            $image_path = $request->file('image')->store('medias');  // Definomos la variable path para asignarle de rrequest el archivo image y que lo almacene en "medias" 
            $data['img_url'] = $image_path; // Asignamos el valor de la variable path a la variable img_url
            // Esto nos devolvera la ruta de la imagen para ser usada en la base de datos
        }
        Buyer::create($data); // Creamos el producto con los datos de la variable data
        // return redirect()->route('products.index')->with('success', 'Product created successfully'); // Redirecionamos a la ruta products.index con un mensaje de exito
        return redirect()->route('buyers.index')->with(['status'=>'success', 'color'=>'green' , 'message'=> 'Buyer created successfully']); // Redirecionamos a la ruta products.index con un mensaje de exito
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit(Buyer $buyer)
    {
        return view('buyers.create', compact('buyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        $data = $request->all();  // Recibimos todo
        if ($request->hasFile('image')) { 
            Storage::delete($buyer->img_url); // Eliminamos la imagen anterior
            $image_path = $request->file('image')->store('medias');  // Definomos la variable path para asignarle de rrequest el archivo image y que lo almacene en "medias" 
            $data['img_url'] = $image_path; // Asignamos el valor de la variable path a la variable img_url
            // Esto nos devolvera la ruta de la imagen para ser usada en la base de datos
        }
        $buyer->fill($data);
        $buyer->save(); // Creamos el producto con los datos de la variable data

        return redirect()->route('buyers.index')->with(['status'=>'success', 'message'=> 'Buyer Update successfully']); // Redirecionamos a la ruta products.index con un mensaje de exito
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        // dd($product);
        try {
            $buyer->delete();
            $result = ['status' => 'success', 'color' => 'green', 'message' => 'Deleted successfully'];
        } catch (\Exception $e) {
            $result = ['status' => 'error', 'color' => 'red', 'message' => 'Buyer cannot be delete'];
        }

        return redirect()->route('buyers.index')->with($result);
    }
}

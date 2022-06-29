<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Mail\InvoiceMail;
use App\Http\Requests\InvoiceStoreRequest;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Logger\ConsoleLogger;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $invoices = Invoice::all();
        $buyers = Buyer::all();
        // return view('invoices.index', compact('invoices'));
        $invoices = Invoice::with('buyer')->paginate(5);
        return view('invoices.index', compact('invoices', 'buyers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = new invoice();
        $buyers= Buyer::all();
        return view('invoices.create', compact('invoice', 'buyers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceStoreRequest $request)
    {
        $invoice = Invoice::create($request->validated());
        return redirect()->route('invoices.add_products', ['invoice' => $invoice->id]); // Redirecionamos a la ruta invoices.index con un mensaje de exito    }
        // return redirect()->route('invoices.add_products', ['invoice' => $invoice->id])->with(['status'=>'success', 'message'=> 'invoice created successfully']); // Redirecionamos a la ruta invoices.index con un mensaje de exito    }
        // return redirect()->route('invoices.add_products')->with(["invoice" => $invoice->id, 'status'=>'success', 'message'=> 'invoice created successfully']); // Redirecionamos a la ruta invoices.index con un mensaje de exito    }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        // return view('invoices.create', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        // $data = $request->validate();
        // $invoice->fill($data);
        // $invoice->save();
        // return redirect()->route('invoices.index')->with(['status'=>'success', 'message'=> 'invoice created successfully']); // Redirecionamos a la ruta invoices.index con un mensaje de exito
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            $result = ['status' => 'success', 'color' => 'green', 'message' => 'Deleted successfully'];
        } catch (\Exception $e) {
            $result = ['status' => 'error', 'color' => 'red', 'message' => 'Invoice cannot be delete'];
        }

        return redirect()->route('invoices.index')->with($result);
    }

    public function completeSend(Request $request, Invoice $invoice)
    {
        // dd($invoice->buyer->email);

        // $invoice->buyer->email = $request->email;
        $details = InvoiceDetail::with('product')
            ->where('invoice_id', $invoice->id)
            ->get();
        Mail::to($invoice->buyer->email)->queue(new InvoiceMail($invoice, $details));
        // Mail::to($invoice->buyer->email)->send(new InvoiceMail($invoice));
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Creating new resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $users = User::role('user')
            ->whereHas('purchases', function (Builder $query) {
                $query->whereNull('invoice_id');
            })
            ->with(['purchases' => function ($query) {
                $query->whereNull('invoice_id');
            }]);

        if (!$users->exists()) {
            return back()->with('error', 'There are no pending purchases to be invoiced');
        }

        foreach ($users->get() as $user) {
            $subTotal = $user->purchases()
                ->whereNull('invoice_id')
                ->sum('product_sub_total');

            $total = $user->purchases()
                ->whereNull('invoice_id')
                ->sum('product_total');

            $total_vat = $user->purchases()
                ->whereNull('invoice_id')
                ->sum('product_price_vat');

            $invoice = new Invoice([
                'sub_total' => $subTotal,
                'total' => $total,
                'total_vat' => $total_vat
            ]);

            $invoice->user()->associate($user);
            $invoice->save();

            foreach ($user->purchases as $purchase) {
                $purchase->invoice()->associate($invoice);
                $purchase->save();
            }
        }

        return back()->with('successful', 'Invoice generated successfully');
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }
}

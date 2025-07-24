<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\InvoiceRecord;
use Filament\Notifications\Notification;

class InvoiceController extends Controller
{

    /**
     * Summary of printInvoice
     * @param  $id
     */
    public function printInvoice($id)
    {
        $purchase = Purchase::with(['provider', 'product'])->find($id);

        if ($purchase) {
            InvoiceRecord::create([
                'user_id' => auth()->user()->id,
                'purchase_id' => $id,
            ]);

            $pdf = Pdf::loadView('pdf.purchase_invoice', ['purchase' => $purchase]);
            return $pdf->stream("invoice-{$id}.pdf");
        }

        Notification::make()
            ->title('No purchase record found')
            ->danger()
            ->send();

        return redirect()->back();
    }

}

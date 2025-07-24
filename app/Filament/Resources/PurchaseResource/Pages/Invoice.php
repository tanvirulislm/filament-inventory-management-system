<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use App\Models\Purchase;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\PurchaseResource;

class Invoice extends Page
{
    protected static string $resource = PurchaseResource::class;

    public $record;
    public $purchase;

    public function mount($record): void
    {
        $this->record = $record;
        $this->purchase = Purchase::with(['provider', 'product'])->findOrFail($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('print')
                ->icon('heroicon-o-printer')
                ->label('Print')
                ->requiresConfirmation()
                ->url(fn () => route('print.purchase_invoice', ['id' => $this->record])),
        ];
    }

    protected static string $view = 'filament.resources.purchase-resource.pages.invoice';
}

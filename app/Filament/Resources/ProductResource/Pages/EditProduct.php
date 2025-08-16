<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Store;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('kembali')
                ->url(ProductResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left'),
            Actions\DeleteAction::make()
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['features'] = json_decode($data['features'], true);
        $data['specifications'] = json_decode($data['specifications'], true);
        $data['discount'] = $data['original_price'] ? true : false;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!isset($data['store_id']) || !$data['store_id']) {
            $user = Auth::user();
            $data['slug'] = Str::slug($user->store->slug . ' ' . $data['name']);
        } else {
            $user = Store::find($data['store_id']);
            $data['slug'] = Str::slug($user->slug . ' ' . $data['name']);
        }
        
        $data['features'] = json_encode($data['features']);
        $data['specifications'] = json_encode($data['specifications']);

        if (!$data['discount']) {
            $data['original_price'] = null;
        }

        return $data;
    }
}

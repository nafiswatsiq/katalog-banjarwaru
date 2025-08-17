<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Store;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function Livewire\store;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('kembali')
                ->url(ProductResource::getUrl('index'))
                ->icon('heroicon-o-arrow-left')
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!isset($data['store_id']) || !$data['store_id']) {
            $user = Auth::user();
            $data['store_id'] = $user->store->id;
            $data['slug'] = Str::slug($user->store->slug . ' ' . $data['name'] . ' ' . uniqid());
        } else {
            $user = Store::find($data['store_id']);
            $data['slug'] = Str::slug($user->slug . ' ' . $data['name'] . ' ' . uniqid());
        }

        $data['features'] = json_encode($data['features']);
        $data['specifications'] = json_encode($data['specifications']);

        return $data;
    }
}

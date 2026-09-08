<?php

namespace App\Filament\Resources\Migrations\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class MigrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. Pesan Peringatan (dibuat lebar penuh agar input turun ke baris baru)
                Placeholder::make('warning_message')
                    ->label('')
                    ->content(new HtmlString(view('filament.components.migration-warning')->render()))
                    ->columnSpanFull(),
                    
                // 2. Input migration akan otomatis berada tepat di bawah peringatan
                TextInput::make('migration')
                    ->required(),
                    //->columnSpanFull(), // Opsional: Tambahkan ini juga jika ingin input formnya memanjang penuh
                    
                TextInput::make('batch')
                    ->required()
                    ->numeric(),
            ]);
    }
}
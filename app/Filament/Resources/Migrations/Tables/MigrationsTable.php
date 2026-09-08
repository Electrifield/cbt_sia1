<?php

namespace App\Filament\Resources\Migrations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MigrationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('migration')
                    ->searchable(),
                TextColumn::make('batch')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // Tombol Lihat (View)
                ViewAction::make(),
                
                // Tombol Ubah (Edit)
                EditAction::make(),
                
                // Tombol Hapus dengan Peringatan tapi Dimatikan (Tidak Bisa Dihapus)
                DeleteAction::make()
                    ->label('Hapus')
                    ->modalHeading('Peringatan Penghapusan')
                    // Memanggil view blade yang sudah Anda buat
                    ->modalContent(view('filament.components.migration-warning'))
                    ->modalSubmitAction(false) // Menghilangkan tombol "Konfirmasi Hapus"
                    ->modalCancelAction(fn ($action) => $action->label('Tutup')), // Ubah teks batal jadi "Tutup"
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->modalHeading('Peringatan Penghapusan Massal')
                        ->modalContent(view('filament.components.migration-warning'))
                        ->modalSubmitAction(false)
                        ->modalCancelAction(fn ($action) => $action->label('Tutup')),
                ]),
            ]);
    }
}
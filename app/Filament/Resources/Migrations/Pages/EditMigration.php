<?php

namespace App\Filament\Resources\Migrations\Pages;

use App\Filament\Resources\Migrations\MigrationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification; // Tambahkan import ini
use Filament\Support\Exceptions\Halt; // Tambahkan import ini

class EditMigration extends EditRecord
{
    protected static string $resource = MigrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // Hook ini akan dijalankan saat tombol "Simpan" ditekan, sebelum data masuk ke database
    protected function beforeSave(): void
    {
        // 1. Tampilkan notifikasi peringatan kepada pengguna
        Notification::make()
            ->warning()
            ->title('Aksi Ditolak')
            ->body('Data migrasi dikunci oleh sistem dan tidak dapat diubah.')
            ->send();

        // 2. Hentikan proses simpan agar data di database tidak berubah
        throw new Halt();
    }
}
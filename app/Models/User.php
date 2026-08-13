<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;

#[Fillable([
    'name',
    'email',
    'password',
    'username',
    'phone',
    'is_staff',
    'photo_path',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Autorisasi user agar dapat login ke Filament Panel
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_staff;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_staff' => 'boolean',
        ];
    }

    /**
     * Method untuk menangani event model.
     */
    protected static function booted(): void
    {
        // Berjalan tepat SEBELUM data di-update ke database
        static::updating(function ($model) {
            // Cek apakah ada perubahan pada kolom 'photo_path' dan apakah data aslinya ada
            if ($model->isDirty('photo_path') && ($model->getOriginal('photo_path') !== null)) {
                // Hapus file foto yang lama dari storage
                Storage::disk('public')->delete($model->getOriginal('photo_path'));
            }
        });

        // (Opsional) Berjalan saat data user dihapus
        static::deleted(function ($model) {
            // Bersihkan file fotonya juga saat user dihapus
            if ($model->photo_path !== null) {
                Storage::disk('public')->delete($model->photo_path);
            }
        });
    }

    // user avatar url
    public function getFilamentAvatarUrl(): ?string
    {
        // cek apakah user punya foto tersimpan
        if (
            $this->photo_path &&
            Storage::disk('public')->exists($this->photo_path)
        ) {
            // return url foto
            return Storage::disk('public')->url($this->photo_path);
        }
        return null;
    }
}
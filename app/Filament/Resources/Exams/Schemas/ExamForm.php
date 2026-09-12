<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('duration')
                    ->required()
                    ->numeric(),
                TextInput::make('threshold')
                    ->required()
                    ->numeric()
                    ->default(50.0),
                DateTimePicker::make('started_at')
                    ->required(),
                DateTimePicker::make('expired_at'),
                Toggle::make('exact_time')
                    ->required(),
                Toggle::make('is_available')
                    ->required(),
            ]);
    }
}

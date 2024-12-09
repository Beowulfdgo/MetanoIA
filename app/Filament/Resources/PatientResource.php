<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Models\Patient;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),

                TextInput::make('apellido')
                    ->label('Apellido')
                    ->required(),

                TextInput::make('direccion')
                    ->label('Dirección')
                    ->required(),

                TextInput::make('telefono')
                    ->label('Teléfono')
                    ->tel()
                    ->required(),

                TextInput::make('correo_electronico')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required(),

                TextInput::make('genero')
                    ->label('Género'),

                TextInput::make('contacto_emergencia')
                    ->label('Contacto de Emergencia'),

                DatePicker::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento'),

                FileUpload::make('avatar')
                    ->label('Avatar')
                    ->image()
                    ->directory('avatars'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('apellido')
                    ->label('Apellido')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('correo_electronico')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('avatar')
                    ->label('Avatar'),
            ])
            ->filters([
                // Agrega filtros aquí si los necesitas
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relaciones aquí si las necesitas
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}

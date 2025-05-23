<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('Utilisateur'),

                Forms\Components\Select::make('property_id')
                    ->relationship('property', 'name')
                    ->required()
                    ->label('Bien'),

                Forms\Components\DatePicker::make('start_date')
                    ->required()
                    ->label('Date de début'),

                Forms\Components\DatePicker::make('end_date')
                    ->required()
                    ->label('Date de fin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Utilisateur'),

                Tables\Columns\TextColumn::make('property.name')
                    ->label('Bien'),

                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->label('Début'),

                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->label('Fin'),
            ])
            ->filters([
                //
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }

    protected static ?string $recordTitleAttribute = 'id';
}

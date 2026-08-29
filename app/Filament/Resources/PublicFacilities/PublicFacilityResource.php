<?php

namespace App\Filament\Resources\PublicFacilities;

use App\Filament\Resources\PublicFacilities\Pages\CreatePublicFacility;
use App\Filament\Resources\PublicFacilities\Pages\EditPublicFacility;
use App\Filament\Resources\PublicFacilities\Pages\ListPublicFacilities;
use App\Models\PublicFacility;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PublicFacilityResource extends Resource
{
    protected static ?string $model = PublicFacility::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Fasilitas Umum';
    protected static ?string $modelLabel = 'Fasilitas Umum';
    protected static ?string $pluralModelLabel = 'Fasilitas Umum';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Fasilitas')
                    ->required(),
                FileUpload::make('photo_path')
                    ->label('Foto Fasilitas')
                    ->image()
                    ->directory('facilities'),
                TextInput::make('google_maps_link')
                    ->label('Link Google Maps (URL)')
                    ->url()
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi Lokasi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo_path')->label('Foto'),
                TextColumn::make('name')->label('Nama Fasilitas'),
                TextColumn::make('google_maps_link')->label('Link Maps')->limit(30),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPublicFacilities::route('/'),
            'create' => CreatePublicFacility::route('/create'),
            'edit' => EditPublicFacility::route('/{record}/edit'),
        ];
    }
}
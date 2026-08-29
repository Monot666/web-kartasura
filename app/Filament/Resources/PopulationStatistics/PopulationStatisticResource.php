<?php

namespace App\Filament\Resources\PopulationStatistics;

use App\Filament\Resources\PopulationStatistics\Pages\CreatePopulationStatistic;
use App\Filament\Resources\PopulationStatistics\Pages\EditPopulationStatistic;
use App\Filament\Resources\PopulationStatistics\Pages\ListPopulationStatistics;
use App\Filament\Resources\PopulationStatistics\Schemas\PopulationStatisticForm;
use App\Filament\Resources\PopulationStatistics\Tables\PopulationStatisticsTable;
use App\Models\PopulationStatistic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PopulationStatisticResource extends Resource
{
    protected static ?string $model = PopulationStatistic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Statistik Penduduk';
    protected static ?string $modelLabel = 'Statistik Penduduk';
    protected static ?string $pluralModelLabel = 'Statistik Penduduk';

    public static function form(Schema $schema): Schema
    {
        return PopulationStatisticForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PopulationStatisticsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPopulationStatistics::route('/'),
            'create' => CreatePopulationStatistic::route('/create'),
            'edit' => EditPopulationStatistic::route('/{record}/edit'),
        ];
    }
}
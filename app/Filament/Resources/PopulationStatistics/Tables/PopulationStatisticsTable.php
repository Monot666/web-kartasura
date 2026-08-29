<?php

namespace App\Filament\Resources\PopulationStatistics\Tables;

use App\Models\PopulationStatistic;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class PopulationStatisticsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rt')
                    ->label('RT')
                    ->searchable(),
                TextColumn::make('rw')
                    ->label('RW')
                    ->searchable(),
                TextColumn::make('month')
                    ->label('Bulan'),
                TextColumn::make('year')
                    ->label('Tahun'),
                TextColumn::make('jumlah_warga')
                    ->label('Jumlah Warga')
                    ->state(function (PopulationStatistic $record): int {
                        return $record->male_count + $record->female_count;
                    }),
                TextColumn::make('male_count')
                    ->label('Laki-laki'),
                TextColumn::make('female_count')
                    ->label('Perempuan'),
                TextColumn::make('birth_count')
                    ->label('Kelahiran'),
                TextColumn::make('death_count')
                    ->label('Kematian'),
            ])
            ->filters([
                Filter::make('periode')
                    ->form([
                        Select::make('month')
                            ->label('Filter Bulan')
                            ->options([
                                'Januari' => 'Januari',
                                'Februari' => 'Februari',
                                'Maret' => 'Maret',
                                'April' => 'April',
                                'Mei' => 'Mei',
                                'Juni' => 'Juni',
                                'Juli' => 'Juli',
                                'Agustus' => 'Agustus',
                                'September' => 'September',
                                'Oktober' => 'Oktober',
                                'November' => 'November',
                                'Desember' => 'Desember',
                            ]),
                        Select::make('year')
                            ->label('Filter Tahun')
                            ->options(
                                array_combine(
                                    range(2024, (int) date('Y') + 10),
                                    range(2024, (int) date('Y') + 10)
                                )
                            ),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['month'],
                                fn (Builder $query, $month): Builder => $query->where('month', $month),
                            )
                            ->when(
                                $data['year'],
                                fn (Builder $query, $year): Builder => $query->where('year', $year),
                            );
                    })
            ]);
    }
}
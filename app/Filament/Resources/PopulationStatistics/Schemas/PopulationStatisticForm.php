<?php

namespace App\Filament\Resources\PopulationStatistics\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class PopulationStatisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('rt')->label('RT')->required(),
                TextInput::make('rw')->label('RW')->required(),

                Select::make('month')
                    ->label('Bulan Periode')
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
                    ])
                    ->required()
                    ->default(match (date('m')) {
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember',
                    }),

                Select::make('year')
                    ->label('Tahun Periode')
                    ->options(
                        array_combine(
                            range(2024, (int) date('Y') + 10),
                            range(2024, (int) date('Y') + 10)
                        )
                    )
                    ->required()
                    ->default((int) date('Y')),

                TextInput::make('male_count')->label('Jumlah Laki-laki')->numeric()->default(0),
                TextInput::make('female_count')->label('Jumlah Perempuan')->numeric()->default(0),
                TextInput::make('birth_count')->label('Jumlah Kelahiran')->numeric()->default(0),
                TextInput::make('death_count')->label('Jumlah Kematian')->numeric()->default(0),
            ]);
    }
}
<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use Filament\Widgets\ChartWidget;

class BookStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Perbandingan Status Buku';

    protected function getData(): array
    {
        $tersedia = Book::where('status', 'available')->count();
        $dipinjam = Book::where('status', 'borrowed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Buku',
                    'data' => [$tersedia, $dipinjam],
                ],
            ],
            'labels' => ['Tersedia', 'Dipinjam'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

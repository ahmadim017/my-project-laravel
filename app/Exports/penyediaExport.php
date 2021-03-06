<?php

namespace App\Exports;

use App\datapenyedia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Jenssegers\Date\Date;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class penyediaExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A4:W4'; // All headers
                $font = 'Calibri';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont($font)->setSize(14);

                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ]
                    ]
                ];
                $event->sheet->getDelegate()->getStyle('A4:H4')->applyFromArray($styleArray);

            },
        ];
        
        
    }
    
    public function __construct($date1, $date2)
    {
     $this->date1 = $date1;
     $this->date2 = $date2;   
    }

    public function view(): View
    {
        Date::setLocale('id');
        return view('laporanlpse.penyediaExport',[
            'data' => datapenyedia::whereBetween('created_at',[$this->date1,$this->date2])->get()
        ]);
    }
}

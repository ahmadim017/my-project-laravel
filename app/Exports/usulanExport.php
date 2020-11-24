<?php

namespace App\Exports;

use App\usulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Jenssegers\Date\Date;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class usulanExport implements FromView, ShouldAutoSize, WithEvents
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
                $event->sheet->getDelegate()->getStyle('A4:K4')->applyFromArray($styleArray);

            },
        ];
        
        
    }
    
    public function __construct($opd, $kategori, $date1, $date2)
    {
     $this->opd = $opd;
     $this->kategori = $kategori;
     $this->date1 = $date1;
     $this->date2 = $date2;   
    }

    public function view(): View
    {
        Date::setLocale('id');
        return view('laporanulp.export',[
            'data' => usulan::where('id_opd','like','%'. $this->opd .'%')->where('kategori','like','%'. $this->kategori .'%')->whereBetween('tglusul',[$this->date1,$this->date2])->get()
        ]);
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PemesananExport implements FromView, WithEvents
{
    use RegistersEventListeners;

    /**
     * @return \Illuminate\Support\Collection
     */
    protected $pemesanan;

    public function __construct($pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }


//    public function headings(): array
//    {
//        return [
//            ['Laporan Pemesanan Lapangan Futsal'],
//            ["Tanggal", "Pemesan", "Lapangan", "Sesi", "Harga", "Status"]
//        ];
//    }
//
//    public function collection()
//    {
//        foreach ($this->pemesanan as $pesanan) {
//            $data[] = [
//                $pesanan->created_at,
//                $pesanan->user->name,
//                $pesanan->venue->title,
//                $pesanan->sesi->jam_mulai . "-" . $pesanan->sesi->jam_selesai . $pesanan->sesi->tanggal,
//                $pesanan->sesi->price->price,
//                $pesanan->status,
//            ];
//        }
//        return collect($data);
//    }

//    public static function afterSheet(AfterSheet $event)
//    {
//        // Create Style Arrays
//        $default_font_style = [
//            'font' => ['name' => 'Arial', 'size' => 10]
//        ];
//
//        $strikethrough = [
//            'font' => ['strikethrough' => true],
//        ];
//
//        // Get Worksheet
//        $active_sheet = $event->sheet->getDelegate();
//
//        // Apply Style Arrays
//        $active_sheet->getParent()->getDefaultStyle()->applyFromArray($default_font_style);
//
//        // strikethrough group of cells (A10 to B12)
//        $active_sheet->getStyle('A10:B12')->applyFromArray($strikethrough);
//        // or
//        $active_sheet->getStyle('A10:B12')->getFont()->setStrikethrough(true);
//
//        // single cell
//        $active_sheet->getStyle('A13')->getFont()->setStrikethrough(true);
//    }

    public function view(): \Illuminate\Contracts\View\View
    {

        return view('components.table-laporan', [
            'pesanans' => $this->pemesanan
        ]);
    }
}

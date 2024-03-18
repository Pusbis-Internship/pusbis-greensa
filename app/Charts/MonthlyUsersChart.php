<?php

namespace App\Charts;

use App\Models\OrderItem;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        $totalOrdersPerMonth = [];

        $monthLabels = []; // array untuk menyimpan label bulan

        // for ($i = 1; $i <= $bulan; $i++) {
        //     // Menghitung total pesanan untuk bulan ini
        //     $totalOrders = OrderItem::whereYear('created_at', $tahun)
        //         ->whereMonth('created_at', $i)
        //         ->where('status', 'Accepted')
        //         ->count();

        //     // Menyimpan total pesanan ke dalam array dengan kunci bulan
        //     $totalOrdersPerMonth[] = $totalOrders;

        //     // Menambahkan label bulan ke dalam array label bulan
        //     $monthLabels[] = \Carbon\Carbon::create($tahun, $i, 1)->format('F'); // Menggunakan Carbon untuk mendapatkan nama bulan
        // }
        for ($i = 11; $i >= 0; $i--) {
            // Mendapatkan bulan dan tahun untuk bulan saat ini ditambah $i bulan
            $bulanIni = \Carbon\Carbon::now()->subMonths($i);
            $tahun = $bulanIni->year;
            $bulan = $bulanIni->month;
        
            // Menghitung total pesanan dengan status "Accepted" untuk bulan ini
            $totalOrders = OrderItem::whereYear('created_at', $tahun)
                                     ->whereMonth('created_at', $bulan)
                                     ->where('status', 'Accepted')
                                     ->count();
        
            // Menyimpan total pesanan ke dalam array dengan kunci bulan
            $totalOrdersPerMonth[] = $totalOrders;
        
            // Menambahkan label bulan ke dalam array label bulan
            $monthLabels[] = $bulanIni->format('F'); // Menggunakan Carbon untuk mendapatkan nama bulan
        }
        

        return $this->chart->lineChart()
            ->setTitle('Total Order.')
            ->setSubtitle('Total Order selama 12 bulan.')
            ->addData('Total Order', $totalOrdersPerMonth)
            ->setHeight(280)
            ->setXAxis($monthLabels); // Mengatur sumbu x berdasarkan label bulan yang telah dibuat
    }
}

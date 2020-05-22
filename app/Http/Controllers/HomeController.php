<?php

namespace App\Http\Controllers;

use App\Consultation;
use Illuminate\Http\Request;
use App\Patient;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function home()
    {
        $consultation = new Consultation();
        $weekDay = Carbon::now()->startOfWeek();
        $diffDays = Carbon::now()->diffInDays($weekDay);
        $week = array();
        $months = array();
        $monthRevenue = array();
        $stats = "It's the beginning of the week";
        for($i=0; $i<=$diffDays; $i++)
        {
            array_push($week, Consultation::where('created_at', 'like', '%'.$weekDay->toDateString().'%')->count());
            $weekDay->addDay();
        }
        for($i=1; $i<=12; $i++)
        {
            array_push($months, $consultation->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', ($i<10) ? '0'.$i : $i)->sum('consultation_price'));
            array_push($monthRevenue, $consultation->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', ($i<10) ? '0'.$i : $i)->count());
        }
        if(count($week) != 1)
        {
            $sumWeek = 0;
            for($i=0;$i<count($week)-1;$i++)
            {
                $sumWeek += $week[$i];
            }
            $moy = $sumWeek/(count($week)-2);
            $stats = $week[count($week)-1] - $moy;
        }
        return view('dashboard', [
            'patients' => Patient::all()->count(),
            'monthRevenue' => $consultation->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->sum('consultation_price'),
            'todayConsultation' => $consultation->whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', date('m'))->whereDay('created_at', '=', date('d'))->count(),
            'weekConsultation' => $week,
            'yearRevenue' => $months,
            'yearConsultation' => $monthRevenue,
            'dailyStats' => round($stats, 2)
            ]);
    }
}
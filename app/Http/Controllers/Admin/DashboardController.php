<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingManage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pendingTotal = BookingManage::where('booking_manages.status', 'pending')
            ->join('services', 'booking_manages.services_id', '=', 'services.id')
            ->sum('services.price');
    
        $confirmedTotal = BookingManage::where('booking_manages.status', 'confirmed')
            ->join('services', 'booking_manages.services_id', '=', 'services.id')
            ->sum('services.price');
    
        $completedTotal = BookingManage::where('booking_manages.status', 'completed')
            ->join('services', 'booking_manages.services_id', '=', 'services.id')
            ->sum('services.price');
    
        $cancelledTotal = BookingManage::where('booking_manages.status', 'cancelled')
            ->join('services', 'booking_manages.services_id', '=', 'services.id')
            ->sum('services.price');
    
        $pendingCount = BookingManage::where('status', 'pending')->count();
        $confirmedCount = BookingManage::where('status', 'confirmed')->count();
        $completedCount = BookingManage::where('status', 'completed')->count();
        $cancelledCount = BookingManage::where('status', 'cancelled')->count();
    
        return view('admin.dashboard', compact('pendingTotal', 'confirmedTotal', 'completedTotal', 'cancelledTotal', 'pendingCount', 'confirmedCount', 'completedCount', 'cancelledCount'));
    }
}

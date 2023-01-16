<?php

namespace App\Http\Controllers;

use App\Models\Jadwalgp;
use App\Models\Vtunggakan;
use Illuminate\Http\Request;

class IdtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tp = Vtunggakan::where('is_alokasi_nosp2', true)->orderBy('spv1', 'asc')->orderBy('spv1', 'asc')->orderBy('kt1', 'asc')->get();
        $tp1 = Vtunggakan::where('is_sphp_lewat', true)->orderBy('spv1', 'asc')->orderBy('spv1', 'asc')->orderBy('kt1', 'asc')->get();
        $tp2 = Vtunggakan::where('fg_sphp', true)->where('is_sphp_lewat', false)->orderBy('spv1', 'asc')->orderBy('spv1', 'asc')->orderBy('kt1', 'asc')->get();
        // $gp = Jadwalgp::all();
        $gp = Jadwalgp::where('fg_show', true)->get();
        return view('idtp', compact('tp', 'tp1', 'tp2', 'gp'));
    }
}

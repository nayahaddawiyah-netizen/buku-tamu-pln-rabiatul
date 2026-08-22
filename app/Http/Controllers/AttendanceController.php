<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
public function index(Request $request)
{
    $search = $request->search;

    $attendances = Attendance::where(
        'guest_name',
        'like',
        "%$search%"
)->latest()->paginate(5);

    return view('attendances.index', compact(
        'attendances',
        'search'
    ));
}
    public function create()
    {
        return view('attendances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_name' => 'required',
            'purpose' => 'required',
            'visit_date' => 'required',
        ]);

            Attendance::create([
    'guest_name' => $request->guest_name,
    'purpose' => $request->purpose,
    'visit_date' => $request->visit_date,
]);

        return redirect('/attendances')
            ->with('success', 'Attendance berhasil ditambahkan');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);

        return view('attendances.edit', compact(
            'attendance'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guest_name' => 'required',
            'purpose' => 'required',
            'visit_date' => 'required',
        ]);

        $attendance = Attendance::findOrFail($id);

        $attendance->update([
            'guest_name' => $request->guest_name,
            'purpose' => $request->purpose,
            'visit_date' => $request->visit_date,
        ]);

        return redirect('/attendances')
            ->with('success', 'Attendance berhasil diupdate');
    }

public function destroy($id)
{
    $attendance = Attendance::findOrFail($id);

    $attendance->delete();

    return redirect('/attendances')
        ->with('success', 'Attendance berhasil dihapus');
}

public function exportPdf()
{
    $attendances = Attendance::latest()->get();

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
        'attendances.pdf',
        compact('attendances')
    );

    return $pdf->download('laporan-attendance.pdf');
}

}
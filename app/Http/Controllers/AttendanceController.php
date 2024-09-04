<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Yajra\DataTables\DataTables;


class AttendanceController extends Controller
{
    //
    public function index(){
        $employee = auth()->user()->employee;
        // get only date now
        $date_now = now()->format('Y-m-d');
        $cek_date = $employee->attendances()->whereDate('attendance_date', $date_now)->first();
        $cek_date_pulang = $employee->attendances()->whereDate('attendance_date', $date_now)->where('type', 'Pulang')->first();
        // return $cek_date;
        return view('attendance.index', compact('cek_date', 'cek_date_pulang'));
    }

    public function summary(){
        $employee = auth()->user()->employee;
        $attendances = $employee->attendances()->get();
        // return $attendances;
        return view('attendance.summary', compact('attendances'));
    }

    public function list(Request $request)
{
    // Assuming 'Attendance' is your model name
    if (auth()->user()->hasRole('superadmin')) {
        $attendances = Attendance::with('employee')->get();
    } else {
        $attendances = auth()->user()->employee->attendances;
    }
    // $attendances = Attendance::with('employee')->get();
     // Use the model and eager load the 'employee' relationship

    if ($request->ajax()) {
        return DataTables::of($attendances)
            ->addIndexColumn()
            ->addColumn('name', function($data){
                return $data->employee->name; // Replace 'employee_id' with 'name' or any relevant column from the employee
            })
            ->addColumn('attendance_date', function($data){
                return $data->attendance_date;
            })
            ->addColumn('attendance_status', function($data){
                if($data->attendance_status == 'Present'){
                    return '<span class="badge bg-success">Present</span>';
                }
                else if ($data->attendance_status == 'Alpha'){
                    return '<span class="badge bg-danger">Alpha</span>';
                }
                else{
                    return '<span class="badge bg-warning">'.$data->attendance_status.'</span>';
                }
            })
            ->addColumn('type', function($data){
                return $data->type;
            })
            
            ->addColumn('evidance', function($data){
                $fileExtension = pathinfo($data->evidance, PATHINFO_EXTENSION);
                $icon = '';
                
                // Periksa apakah evidance adalah gambar atau PDF dan tetapkan ikon yang sesuai
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $icon = '<i class="fas fa-image fa-2x"></i>'; // Ikon gambar dengan ukuran lebih besar
                } elseif ($fileExtension == 'pdf') {
                    $icon = '<i class="fas fa-file-pdf fa-2x"></i>'; // Ikon PDF dengan ukuran lebih besar
                }
                
                // Kembalikan ikon yang dibungkus dalam tautan yang membuka file di tab baru
                return '<a href="'.asset('storage/evidance/'.$data->evidance).'" target="_blank">'.$icon.'</a>';
            })
            ->rawColumns(['evidance','attendance_status'])

            
            ->make(true);
    }
}


public function masuk(Request $request){
    // return $request;
    // Validasi input
    $request->validate([
        'attendance_status' => 'required',
        'evidance' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
        'webcam_image' => 'nullable|string', // Validasi untuk gambar webcam
    ]);

    $employee = auth()->user()->employee;

    $name = null;

    // Proses jika ada file yang diunggah secara manual
    if ($request->hasFile('evidance')) {
        $image = $request->file('evidance');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/evidance');
        $image->move($destinationPath, $name);
    }

    // Proses gambar dari webcam jika ada
    if ($request->has('webcam_image' ) && !empty($request->input('webcam_image'))) {
        $imageData = $request->input('webcam_image');
        $name = time().'.png'; // Nama file untuk gambar dari webcam
        $destinationPath = public_path('/storage/evidance');
        $path = $destinationPath.'/'.$name;

        // Decode base64 menjadi file gambar
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        file_put_contents($path, $image);
    }

    // jika waktu masuk melebihi jam 09:00 statusnya menjadi late
    if (now()->format('H:i') > '09:00') {
        $request->merge(['attendance_status' => 'Late']);
    }
    // Buat data absen baru
    $employee->attendances()->create([
        'type' => 'Masuk',
        'employee_id' => $employee->id,
        'attendance_status' => $request->attendance_status,
        'evidance' => $name,
        'attendance_date' => now()
    ]);

    return back()->with('success', 'Anda berhasil melakukan absen masuk');
}

    public function pulang( Request $request){
        
        $employee = auth()->user()->employee;
        // return if employee has not attendance in today and time is less than 17:00
        if (!$employee->attendances()->whereDate('attendance_date', now())->where('type', 'Masuk')->first() || now()->format('H:i') < '17:00') {
            return back()->with('error', 'Anda belum melakukan absen masuk atau belum waktunya absen pulang');
        } 
        // return $employee;
        
        $employee->attendances()->create([
            'type' => 'Pulang',
            'employee_id' => $employee->id,
            'attendance_status' => "Go home",
            'evidance' => "No evidance",
            'attendance_date' => now()
        ]);

        return back()->with('success', 'Anda berhasil melakukan absen pulang');
    }
}

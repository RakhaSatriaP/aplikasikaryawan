<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Yajra\DataTables\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    public function index(){
        return view('employee.index');
    }

    public function list(Request $request){
        $employees = Employee::all();
        if($request->ajax()){
            return DataTables::of($employees)
            ->addIndexColumn()
            ->addColumn('name', function($data){
                return $data->name;
            })
            ->addColumn('email', function($data){
                return $data->user->email;
            })
            ->addColumn('phone', function($data){
                return $data->phone_number;
            })
            ->addColumn('department', function($data){
                return $data->department;
            })
            ->addColumn('start_date', function($data){
                return $data->start_date;
            })
            ->addColumn('end_date', function($data){
                return $data->end_date;
            })
            ->addColumn('address', function($data){
                return $data->address;
            })
            ->addColumn('bank_number', function($data){
                return $data->bank_number;
            })
            ->addColumn('bank', function($data){
                return $data->bank;
            })
            ->addColumn('Salary', function($data){
                return $data->Salary;
            })
            ->addColumn('status', function($data){
                if($data->status == 'Active'){
                    return '<span class="badge bg-success">Active</span>';
                }
                else{
                    return '<span class="badge bg-warning">InActive</span>';
                }
                // return $data->status;
            })
            ->addColumn('action', function($data){
                $edit_url = route('superadmin.employee.edit', $data->id); 
                $button = '<a type="button" href="'.$edit_url.'" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="ti ti-pencil"></i></a>';
                $button .= '&nbsp;&nbsp;&nbsp;<form action="'.route('superadmin.employee.delete', $data->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm(\'Yakin untuk di hapus?\')"><i class="ti ti-trash"></i></button>
                            </form>';
                return $button;
            })
            ->rawColumns(['action','status'])
            ->make(true);
        }
        return DataTables::queryBuilder($employees)->toJson();
        // return view('employee.list', compact('employees'));
    }

    public function create(){
        $roles = DB::table('roles')->get();
        return view('employee.create', compact('roles'));
    }

    public function store(Request $request){
        $password = 'Pegawaisalman123#';
        
        // Create user data in the users table
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->save();

        // Create employee data in the employees table
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->phone_number = $request->phone_number;
        $employee->status = $request->status;
        $employee->user_id = $user->id;
        $employee->birthday_date = $request->birthday_date;
        $employee->address = $request->address;
        $employee->start_date = $request->start_date;
        $employee->end_date = $request->end_date;
        $employee->blood = $request->blood;
        $employee->gender = $request->gender;
        $employee->bank_number = $request->bank_number;
        $employee->bank = $request->bank;
        $employee->department = $request->department;
        $employee->Salary = $request->Salary;
        $employee->save();

        $user->assignRole($request->role);

        return redirect()->route('superadmin.employee.index')->with('success', 'User Created successfully');
    }

    public function delete($id){
        $employee = Employee::find($id);
        $user = User::find($employee->user_id);
        $employee->delete();
        $user->delete();
        return redirect()->route('superadmin.employee.index')->with('success', 'User Deleted successfully');
    }

    public function edit($id){
        $employee = Employee::find($id);
        $user = User::find($employee->user_id);
        $roles = DB::table('roles')->get();
        return view('employee.edit', compact('employee', 'user', 'roles'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'birthday_date' => 'required',
            'blood' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'bank_number' => 'required',
            'bank' => 'required',
            'department' => 'required',
            'Salary' => 'required',
        ]);

        //update data to employee table and user table
        Employee::where('id', $id)->update([
            'name' => $request->name,
            'birthday_date' => $request->birthday_date,
            'blood' => $request->blood,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'bank_number' => $request->bank_number,
            'bank' => $request->bank,
            'department' => $request->department,
            'Salary' => $request->Salary,

        ]);

        $user = User::where('id', $request->user_id)->first();
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('superadmin.employee.index')->with('success', 'User Updated successfully');

    }


        
}

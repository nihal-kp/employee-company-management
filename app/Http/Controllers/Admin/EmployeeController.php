<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use MediaUploader;
use Plank\Mediable\Media;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,DataTables $datatables)
    {
        if($request->ajax()){
        
            $query = Employee::with(['company', 'createdBy', 'updatedBy'])->select('employees.*')->orderBy('id','DESC');
     
            return $datatables->eloquent($query)

           ->addColumn('image', function (Employee $employee){
             
            $image = $employee->getMedia('image')->first(); 
            
            return (!empty($employee->getMedia('image')->first()) ? '<img src="'.$image->getUrl().'" alt="" width="50%" height="50%">' : '');
               
           })

           ->addColumn('action', function (Employee $employee) {
    
             return '<a href="' . route('admin.employee.edit',$employee->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit"><i class="la la-edit" ></i></a>' .
             '<a data-toggle="modal" href="#delete-employee" data-href="' . route('admin.employee.destroy',$employee->id) . '" class="btn btn-sm btn-danger btn-icon employee-delete" title="Delete"><i class="flaticon-delete" ></i></a>';
           })
           
           ->rawColumns(['action', 'image'])
           ->make(true);
        }
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.form')->with([
            'employee'  => new Employee(),
            'companies' => Company::orderBy('id', 'desc')->get()->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,NULL,id,deleted_at,NULL',
            'company_id' => 'required|exists:companies,id',
            'mobile_number' => 'required|string|max:15|unique:employees,mobile_number,NULL,id,deleted_at,NULL',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'join_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['updated_by'] = Auth::guard('admin')->user()->id;

        $employee = Employee::create($data);

        if (!empty($request->file('image'))) {
            $time = time();
            $filename = 'employee_' . $time;
            $media = MediaUploader::fromSource($request->file('image'))
                ->useFilename($filename)
                ->toDirectory('employee')
                ->upload();
            $employee->attachMedia($media, ['image']);
        }

        return redirect()->route('employee.index')->with('message', 'Data created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $image = '';
        if (!empty($employee->getMedia('image')->first())) {
            $image = $employee->getMedia('image')->first();
        }

        return view('admin.employee.form')->with([
            'image' => $image,
            'employee' => $employee,
            'companies' => Company::orderBy('id', 'desc')->get()->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id . ',id,deleted_at,NULL',
            'company_id' => 'required|exists:companies,id',
            'mobile_number' => 'required|string|max:15|unique:employees,mobile_number,' . $employee->id . ',id,deleted_at,NULL',
            'image' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'join_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['updated_by'] = Auth::guard('admin')->user()->id;

        $employee->update($data);

        if (!empty($request->file('image'))) {

            $old_image = Media::whereId($request->old_image)->first();
            if ($old_image) {
                $old_image->delete();
            }

            $time = time();
            $filename = 'employee_' . $time;
            $media = MediaUploader::fromSource($request->file('image'))
                ->useFilename($filename)
                ->toDirectory('employee')
                ->upload();
            $employee->attachMedia($media, ['image']);
        }

        return redirect()->route('admin.employee.index')->with('message', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {  
        $employee->delete();
        return response()->json(['status' => 'success']);
    }
}

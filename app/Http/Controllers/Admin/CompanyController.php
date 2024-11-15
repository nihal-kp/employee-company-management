<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use MediaUploader;
use Plank\Mediable\Media;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class CompanyController extends Controller
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
        
            $query = Company::with(['createdBy', 'updatedBy'])->select('companies.*')->orderBy('id','DESC');
     
            return $datatables->eloquent($query)

           ->addColumn('logo', function (Company $company){
             
            $logo = $company->getMedia('logo')->first(); 
            
            return (!empty($company->getMedia('logo')->first()) ? '<img src="'.$logo->getUrl().'" alt="" width="50%" height="50%">' : '');
               
           })

           ->addColumn('action', function (Company $company) {
    
             return '<a href="' . route('admin.company.edit',$company->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit"><i class="la la-edit" ></i></a>' .
             '<a data-toggle="modal" href="#delete-company" data-href="' . route('admin.company.destroy',$company->id) . '" class="btn btn-sm btn-danger btn-icon company-delete" title="Delete"><i class="flaticon-delete" ></i></a>';
           })
           
           ->rawColumns(['action', 'logo'])
           ->make(true);
        }
        return view('admin.company.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.form')->with([
            'company'  => new Company(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'contact_number' => 'required|max:15|unique:companies,contact_number,NULL,id,deleted_at,NULL',
            'annual_turnover' => 'required|numeric|min:0',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['updated_by'] = Auth::guard('admin')->user()->id;

        $company = Company::create($data);

        if (!empty($request->file('logo'))) {
            $time = time();
            $filename = 'company_' . $time;
            $media = MediaUploader::fromSource($request->file('logo'))
                ->useFilename($filename)
                ->toDirectory('company')
                ->upload();
            $company->attachMedia($media, ['logo']);
        }
        return redirect()->route('admin.company.index')->with('message', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $logo = '';
        if (!empty($company->getMedia('logo')->first())) {
            $logo = $company->getMedia('logo')->first();
        }

        return view('admin.company.form')->with([
            'logo' => $logo,
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'contact_number' => 'required|max:15|unique:companies,contact_number,' . $company->id . ',id,deleted_at,NULL',
            'annual_turnover' => 'required|numeric|min:0',
            'logo' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = $request->all();
        $data['updated_by'] = Auth::guard('admin')->user()->id;

        $company->update($data);

        if (!empty($request->file('logo'))) {

            $old_logo = Media::whereId($request->old_logo)->first();
            if ($old_logo) {
                $old_logo->delete();
            }

            $time = time();
            $filename = 'company_' . $time;
            $media = MediaUploader::fromSource($request->file('logo'))
                ->useFilename($filename)
                ->toDirectory('company')
                ->upload();
            $company->attachMedia($media, ['logo']);
        }

        return redirect()->route('admin.company.index')->with('message', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if(Employee::where('company_id',$company->id)->get()->count() > 0)
        {
            return response()->json(['status'=>'fail']); 
        }
        else
        {
            $company->delete();
            return response()->json(['status' => 'success']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id','ASC')->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyFormRequest $request){
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/companies', $filename);
            $validatedData['logo'] = $filename; 
        }
        Company::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'logo' => $validatedData['logo'],
            'website' => $validatedData['website'],
        ]);

        return redirect('admin/companies')->with('message','Comapany added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Company $company){
        $company = Company::findOrFail($company->id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyFormRequest $request, Company $company)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->storeAs('public/companies', $filename);
            $validatedData['logo'] = $filename;
        }

        Company::where('id', $company->id)->update([
            'name'    => $validatedData['name'],
            'email'   => $validatedData['email'],
            'logo'    => $validatedData['logo'],
            'website' => $validatedData['website'],
        ]);

        return redirect('admin/companies')->with('message', 'Company Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('admin/companies')->with('message', 'Company deleted successfully');
    }
}

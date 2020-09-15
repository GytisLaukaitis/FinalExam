<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', ['companies' => Company::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        if($request['name'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti įmonės pavadinimą!']);
        } else if($request['address'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti įmonės adresą!']);
         } else {
        $company->fill($request->all());
        $company->save();
        return redirect()->route('company.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        if($request['name'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti įmonės pavadinimą!']);
        } else if($request['address'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti įmonės adresą!']);
         } else {
        $company->fill($request->all());
        $company->save();
        return redirect()->route('company.index');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (count($company->customers)){ 
            return back()->withErrors(['error' => ['Negalima ištrinti įmonės turinčios klientų. Pirmiausia ištrinkine priskirtus klientus.']]);
        }
        $company->delete();
        return redirect()->route('company.index');
    }
}
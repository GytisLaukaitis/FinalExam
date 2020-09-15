<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CustomerController extends Controller{
    public function index(Request $request){
        if(isset($request->company_id) && $request->company_id !== 0)
            $customers = \App\Models\Customer::where('company_id', $request->company_id)->orderBy('surname')->get();
        else
            $customers = \App\Models\Customer::orderBy('surname')->get();
        $companies = \App\Models\Company::orderBy('name')->get();
        return view('customers.index', ['customers' => $customers, 'companies' => $companies]);
    }
    public function create(){
        $companies = \App\Models\Company::orderBy('name')->get();
        return view('customers.create', ['companies' => $companies]);
    }
    public function store(Request $request){
        $customer = new Customer();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();

        if($request['name'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo vardą!']);
        } else if($request['surname'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo pavardę!']);
        } else if($request['phone'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo telefono numerį!']);
         } else if($request['email'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo el. paštą!']);
         } else if($request['comment'] === null) {
            return Redirect::back()->withErrors(['Privalomas komentaras']);
         }else {
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customers.index');
         }
    }


    public function show(Customer $customer){
        //
    }
    public function edit(Customer $customer){
        $companies = \App\Models\Company::orderBy('name')->get();
        return view('customers.edit', ['customer' => $customer, 'companies' => $companies]);
    }
    public function update(Request $request, Customer $customer){

        if($request['name'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo vardą!']);
        } else if($request['surname'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo pavardę!']);
        } else if($request['phone'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo telefono numerį!']);
         } else if($request['email'] === null) {
            return Redirect::back()->withErrors(['Privaloma įvesti vartotojo el. paštą!']);
         } else if($request['comment'] === null) {
            return Redirect::back()->withErrors(['Privalomas komentaras']);
         }else {
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customers.index');
         }
    }

    
    public function destroy(Customer $customer, Request $request)
    {
        $customer->delete();
        return redirect()->route('customers.index', ['company_id'=> $request->input('company_id')]);
    }

    public function travel($id){
        $customer = Customer::find($id);
        return view('customers.travel', ['customer' => $customer]);
    }

}
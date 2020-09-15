@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Sukurkime klientą:</div>
               <div class="card-body">
                   <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Telefonas: </label>
                            <input type="text" name="phone" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label>Komentarai: </label>
                            <textarea id="mce" name="comment" rows=10 cols=100 class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Priklauso įmonei: </label>
                            <select name="company_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite įmonę</option>
                                 @foreach ($companies as $company)
                                 <option value="{{ $company->id }}">{{ $company->name }}</option>
                                 @endforeach
                            </select>
                        </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
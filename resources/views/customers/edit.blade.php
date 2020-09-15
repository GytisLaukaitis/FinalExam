@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime kliento informaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>
                        <div class="form-group">
                            <label>Pavardė: </label>
                            <input type="text" name="surname" class="form-control" value="{{ $customer->surname }}"> 
                        </div>
                        <div class="form-group">
                            <label>Telefonas: </label>
                            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}"> 
                        </div>
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" name="email" class="form-control" value="{{ $customer->email }}"> 
                        </div>
                        <div class="form-group">
                            <label for="">Komentarai</label>
                            <textarea id="mce" type="text" name="comment" rows=10 cols=100 class="form-control">{{ $customer->comment }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Priklauso įmonei: </label>
                            <select name="company_id" id="" class="form-control">
                                 <option value="" selected disabled>Pasirinkite įmonę</option>
                                 @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == $customer->company_id) selected="selected" @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
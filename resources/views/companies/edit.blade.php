@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeiskime įmonė sinformaciją</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('company.update', $company->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Pavadinimas</label>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Adresas</label>
                            <input type="text" name="address" class="form-control" value="{{ $company->address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
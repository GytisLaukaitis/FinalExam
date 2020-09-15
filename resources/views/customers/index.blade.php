@extends('layouts.app')
@section('content')
<div class="card-body">
    <form action="{{ route('customers.index') }}" method="GET">
        <select name="company_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite įmonę klientų filtravimui:</option>
            @foreach ($companies as $company)
            <option value="{{ $company->id }}" 
                @if($company->id == app('request')->input('company_id')) 
                    selected="selected" 
                @endif>{{ $company->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif
    <table class="table">
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Telefonas</th>
            <th>Email</th>
            <th>Komentarai</th>
            <th>Įmonė</th>
            <th>Veiksmai</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->surname }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->email }}</td>
            <td>{!! $customer->comment !!}</td>
            <td>{{ $customer->company['name'] }}</td>
            <td>
                <form action={{ route('customers.destroy', $customer->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('customers.edit', $customer->id) }}>Redaguoti</a>
                    <a class="btn btn-primary" href={{ route('customers.travel', $customer->id) }}>Įmonės info</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('customers.create') }}" class="btn btn-success">Pridėti</a>
    </div>
</div>
@endsection
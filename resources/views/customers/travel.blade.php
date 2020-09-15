@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Kliento ir jo įmonės detalės</div>
    <div class="card-body">
        <h5>Klientas: {{ $customer->name }} {{$customer->surname}}</h5>
        <h5>Telefonas: {{ $customer->phone }}</h5>
        <h5>El. paštas: {{ $customer->email }}</h5>
        <h5>Komentarai: {!! $customer->comment !!}</h5>
        <hr>
        <h5>Įmonė:  {{ $customer->company['name'] }}</h5>
    </div>
</div>
@endsection
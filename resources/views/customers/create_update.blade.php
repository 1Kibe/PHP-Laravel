@extends('layout')
@section('content')

<div class="container mt-4">
    <h1>{{ isset($customer) ? 'Editar Cliente' : 'Adicionar Cliente' }}        
    </h1>     
    
    <form action="{{ isset($customer) ?
    route('customers.update', $customer->id) :
    route('customers.store')}}"
    method="POST">
   @csrf

   @if (isset($customer))
        @method('PUT')
   @endif

   <div class="mb-3">
        <label for="name" class="form-label"><b>Nome</b></label>
        <input type="text" class="form-control" id="name" name="name" 
        value="{{ $customer->name ?? '' }}" />
        @error('name')
            <div class="text-danger">{{ $message }}</span><span>
        @enderror
    </div>

<div class="mb-3">
        <label for="cpf" class="form-label"><b>CPF</b></label>
        <input type="text" id="cpf" name="cpf" class="form-control" 
        value="{{ $customer->cpf ?? '' }}" />
        @error('cpf')
            <div class="text-danger">{{ $message }}</span><span>
        @enderror
</div>

<div class="mb-3">
        <label class="form-label" for="email"><b>Email</b></label>
        <input type="email" id="email" name="email" class="form-control"
        value="{{ $customer->email ?? '' }}" />
        @error('email')
            <div class="text-danger">{{ $message }}</span><span>
        @enderror
</div>

<div class="mb-3">
        <label class="form-label" for="phone"><b>Telefone</b></label>
        <input type="text" id="phone" name="phone" class="form-control"
        value="{{ $customer->phone ?? '' }}" />
        @error('phone')
            <div class="text-danger">{{ $message }}</span><span>
        @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label"><b>Endereço</b></label>
    <input type="text" class="form-control" id="address" name="address"
           value="{{ $customer->address ?? '' }}">
           @error('address')
            <div class="text-danger">{{ $message }}</span><span>
        @enderror
</div>

<button type="submit" class="btn btn-success">Salvar</button>
<a class="btn btn-secondary" href="{{ route('customers.index') }}"> Voltar</a>

</form>
    </div>
@endsection

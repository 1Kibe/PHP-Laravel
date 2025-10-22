@extends('layout')'

@section('content')
<div class="container mt-4">
    <h1>Clientes</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Adicionar Cliente</a>
        
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>                
            </tr>        
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->cpf }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}"
                        class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}"
                        method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Nenhum cliente cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

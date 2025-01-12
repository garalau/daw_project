@extends('layouts.app-user')

@section('content')
    
    <!-- Header-->
    <x-header-welcome 
    title="Crear Proyecto" 
    subtitle=""
    :show-buttons="false"
    />

    <x-navproject />

    
    <div class="container p-4">
        <div class="">
            <h1>Captura de Factores Extrínsecos</h1>
    
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
    
            @if($errors->any())
                <ul style="color: red;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
    
            <form action="{{ route('factor_extrinsecos.store') }}" method="POST">
                @csrf
                <label for="social">Valor Social (%):</label><br>
                <input type="number" id="social" name="social" min="0" max="100" step="0.01" value="{{ old('social') }}"><br><br>
    
                <label for="ambiental">Valor Ambiental (%):</label><br>
                <input type="number" id="ambiental" name="ambiental" min="0" max="100" step="0.01" value="{{ old('ambiental') }}"><br><br>
    
                <label for="localizacion">Localización (%):</label><br>
                <input type="number" id="localizacion" name="localizacion" min="0" max="100" step="0.01" value="{{ old('localizacion') }}"><br><br>
    
                <button type="submit">Guardar</button>
            </form>
        </div>
    
    

@endsection


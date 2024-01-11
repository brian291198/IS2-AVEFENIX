@extends('layouts.plantilla')
@section('title', 'Rutas') {{-- Edita "Ejemplo" por el nombre que corresponda, esto aparece en la pestaña del
navegador --}}

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">RUTAS</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- INICIO DE CONTENIDO --}}

        <div>
            <div class="text-center fs-2">
                Crear Ruta
            </div>
            <form class="container" method="post" action="{{route('rutas.store')}}">
                @csrf
                @method('post')

                <div class="row">
                    <label for="">Origen</label>
                    <select class="form-control" id="idOrigen" onchange="validarAgencias()" name="idOrigen">
                        <option value="0" selected>- Seleccione Personal -</option>
                        @foreach($agencias as $agencia) 
                            <option value="{{ $agencia->AgenciaID }}">{{ $agencia->Ciudad}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-4">
                    <label for="" id="alate">Destino</label>
                    <select class="form-control" id="idDestino" onchange="validarAgencias()" name="idDestino">
                        <option value="0" selected>- Seleccione Personal -</option>
                        @foreach($agencias as $agencia) 
                            <option value="{{ $agencia->AgenciaID }}">{{ $agencia->Ciudad}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-4">
                    <label for="">Duracion aproximada (en horas)</label>
                    <input class="border p-3 rounded ml-6" type="number" name="Duracionaprox" placeholder="Duracion aproximada">
                </div>

                <div class="mt-4">
                    <input class="btn btn-success" type="submit" disabled id="submitButton" value="Guardar">
                    <a href="{{route('rutas.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>


        {{--
        -------------------------------------------------------------------------------------------------------------------------------------------
        - --}}
        {{-- FIN DE CONTENIDO --}}
    </div>
</div>

@endsection

@section('script')

    function validarAgencias() {
        var x = document.getElementById('idOrigen');
        var y = document.getElementById('idDestino');
        var z = document.getElementById('submitButton');
        if (x.value == y.value) {
            alert('El origen y destino no deben coincidir');
            z.disabled = true;
        } else if (x.value == 0 || y.value == 0) {
            z.disabled = true;
        } else {
            z.disabled = false;
        }
    }

@endsection
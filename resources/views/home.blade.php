@extends('layouts.init')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ECARTAC - Restaurantes Tacna</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido(a): {{Auth::user()->name}}
                    <br>
                    <ul>

                    

                    
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
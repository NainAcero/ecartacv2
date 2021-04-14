@extends('layouts.init')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}} ">Home</a></li>
                <li class="breadcrumb-item active">form</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

<section class="content">
    <div id="app"></div>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">Día</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Hora Inicio</th>
                        <th scope="col" class="text-center">Hora Fin</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (session('success'))
                        <div class="alert alert-info" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if(count($horarios) <= 0)
                        <form action="{{route('horarios.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="tienda_id" value="{{ $id }}">
                            <h3 class="card-title">Horarios</h3>
                            <button type="submit" class="btn btn-success float-right">Guardar</button>
                            @foreach ($dias as $dia)
                            <tr>
                                <td class="text-center">
                                    {{ $dia }} <input type="hidden" name="dias[]" value="{{ $dia }}">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" checked  class="form-control" name="estados[]" value="{{ $dia }}">
                                </td>
                                <td class="text-center">
                                    <input type="time"  class="form-control text-center" name="start_hours[]" value="08:00:00" step="2" required>
                                </td>
                                <td class="text-center">
                                    <input type="time"  class="form-control text-center" name="end_hours[]" value="20:00:00" step="2" required>
                                </td>
                            </tr>
                            @endforeach
                        </form>
                        @else
                            <form action="{{route('horarios.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="tienda_id" value="{{ $id }}">
                                <input type="hidden" name="delete" value="{{ $id }}">
                                <h3 class="card-title">Horarios</h3>
                                <button type="submit" class="btn btn-success float-right">Guardar</button>
                                <div class="card-body">
                                    <div class="alert alert-default" role="alert">
                                        awd
                                    </div>
                                </div>
                                @foreach ($horarios as $horario)
                                <tr>
                                    <td class="text-center">
                                        {{ $horario->day }} <input type="hidden" name="dias[]" value="{{ $horario->day}}">
                                    </td>
                                    <td class="text-center">
                                        @if($horario->estatus)
                                            <input type="checkbox" checked  class="form-control" name="estados[]" value="{{ $horario->day }}">
                                        @else
                                            <input type="checkbox" class="form-control" name="estados[]" value="{{ $horario->day }}">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <input type="time"  class="form-control text-center" name="start_hours[]" value="{{ $horario->start_time  }}" step="2" required>
                                    </td>
                                    <td class="text-center">
                                        <input type="time"  class="form-control text-center" name="end_hours[]" value="{{ $horario->end_time  }}" step="2" required>
                                    </td>
                                </tr>
                                @endforeach
                            </form>
                        @endif
                    </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
        <!-- /.row -->
</section>

@endsection

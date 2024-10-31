@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Tipo de Usuário</h4>
  </div>
</div>
@if (session('success'))
    <div class="alert alert-fill-success" role="alert">
      <i data-feather="alert-circle"></i>
      {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-fill-danger" role="alert">
        <i data-feather="alert-circle"></i>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-md-12">
                  <button type="button" class="btn btn-primary col-md-2 offset-md-10" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Adicionar
                  </button>
                </div>
            </div>
            <br>

            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Tipo de Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                  </div>
                  <form action="{{route('tipo_usuario.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input id="name" class="form-control" name="name" type="text">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    
                  </form>
                </div>
              </div>
            </div>
            <table id="dataTableExample" class="table">
                <thead>
                  <tr>
                    <th class="col-xs-10 col-sm-10 col-md-10 col-lg-10">Nome</th>
                    <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">-</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{$tipo->name}}</td>
                            <td>
                                    <a type="button" class="btn btn-primary btn-icon">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a type="button" class="btn btn-danger btn-icon">
                                        <i data-feather="trash"></i>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                  
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
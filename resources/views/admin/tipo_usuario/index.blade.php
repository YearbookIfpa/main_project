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

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
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
                                <a type="button" class="btn btn-warning btn-icon">
                                    <i data-feather="eye"></i>
                                </a>
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
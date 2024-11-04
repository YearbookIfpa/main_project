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
<div id="alertContainer" class="alert" role="alert" style="display: none;">
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

</div>




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

            <div class="modal fade" id="editUserTypeModal" tabindex="-1" role="dialog" aria-labelledby="editUserTypeModalLabel">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <form id="editUserTypeForm">
                          @csrf
                          @method('PUT')
                          <div class="modal-header">
                              <h5 class="modal-title" id="editUserTypeModalLabel">Editar Tipo de Usuário</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                          </div>
                          <div class="modal-body">
                              <input type="hidden" id="userTypeId" name="id">
                              <div class="form-group">
                                  <label for="userTypeName">Nome</label>
                                  <input type="text" class="form-control" id="userTypeName" name="name">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                              <button type="submit" class="btn btn-primary">Salvar Alterações</button>
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
                        <tr id="userTypeRow{{ $tipo->id }}">
                            <td>{{$tipo->name}}</td>
                            <td>
                                    <a type="button" onclick="editUserType({{ $tipo->id }})" class="btn btn-primary btn-icon">
                                        <i data-feather="edit-2"></i>
                                    </a>
                                    <a type="button" class="btn btn-danger btn-icon deleteUserTypeBtn"  data-id="{{ $tipo->id }}">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // Função para abrir o modal e preencher os dados do tipo de usuário
  function editUserType(userTypeId) {
        $.ajax({
            url: `/tipo_usuario/edit/${userTypeId}`,
            type: 'GET',
            success: function(userType) {
                $('#editUserTypeModal #userTypeName').val(userType.name);
                $('#editUserTypeModal #userTypeId').val(userType.id);
                $('#editUserTypeModal').modal('show'); // Mostra o modal
            }
        });
    }
    $('#editUserTypeForm').submit(function(e) {
        e.preventDefault();
        let userTypeId = $('#editUserTypeModal #userTypeId').val();
        let formData = $(this).serialize();

        console.log(userTypeId);
        $.ajax({
            url: `/tipo_usuario/update/${userTypeId}`,
            type: 'PUT',
            data: formData,
            success: function(response) {
                $('#editUserTypeModal').modal('hide'); // Fecha o modal
                alert(response.success);
                location.reload(); // Recarrega a página para atualizar a tabela
            }
        });
    });

    $(document).ready(function() {
    // Ação de clique para deletar o tipo de usuário
          $('.deleteUserTypeBtn').click(function() {
              let userTypeId = $(this).data('id');
              let url = `/tipo_usuario/destroy/${userTypeId}`;

              if (confirm('Tem certeza que deseja excluir este tipo de usuário?')) {
                  $.ajax({
                      url: url,
                      type: 'DELETE',
                      data: {
                          _token: '{{ csrf_token() }}'
                      },
                      success: function(response) {
                          $('#alertContainer')
                            .removeClass('alert-danger')
                            .addClass('alert alert-success')
                            .text(response.success)
                            .show();

                        // Remove a linha correspondente da tabela
                          // Remove a linha da tabela
                          $('#userTypeRow' + userTypeId).remove();
                              setTimeout(function() {
                              $('#alertContainer').fadeOut();
                          }, 3000);
                      },
                      error: function(xhr) {
                        let errorMessage = 'Erro ao tentar excluir o tipo de usuário.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        } else if (xhr.status) {
                            errorMessage += ' Status: ' + xhr.status;
                        }

                        $('#alertContainer')
                            .removeClass('alert-success')
                            .addClass('alert alert-danger')
                            .text(errorMessage)
                            .show();
                        $('#userTypeRow' + userTypeId).remove();
                              setTimeout(function() {
                              $('#alertContainer').fadeOut();
                        }, 3000);
                      }
                  });
              }
          });
    });

</script>
@endsection

@push('plugin-scripts')

  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
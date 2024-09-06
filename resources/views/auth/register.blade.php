@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

            </div>
          </div>
          <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
              <h5 class="text-muted fw-normal mb-4">Crie sua Conta!</h5>
              <form method="POST" class="forms-sample"action="{{ route('registerSave') }}" >
                @csrf
                <div class="mb-3">
                  <label for="exampleInputUsername1" class="form-label">Usuário</label>
                  <input type="text" class="form-control" name="name" autocomplete="name" placeholder="Username">
                  @error('name')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                  @error('email')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password" autocomplete="current-password" placeholder="Password">
                  @error('password')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Remember me
                  </label>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Criar Conta</button>
                  
                </div>
                <a href="{{ route('login')}}" class="d-block mt-3 text-muted">Já tem conta? Acesse por aqui!</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
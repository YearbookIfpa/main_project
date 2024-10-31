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
              <a href="#" class="noble-ui-logo d-block mb-2">YearBook<span>IFPA</span></a>
              <h5 class="text-muted fw-normal mb-4">Bem vindo de Volta! Entre na sua conta.</h5>
              <form class="forms-sample" action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label">E-mail</label>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                  @error('email')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Senha</label>
                  <input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Password">
                  @error('password')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Lembrar
                  </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Criar Conta</button>
                </div>
                <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Não é um usuário? Criar Conta</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@extends('layouts.main')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-8">
        <div class="card p-5">
          <div class="text-center p-3">
            <img src="assets/images/logo.png" alt="Notes logo">
          </div>

          <div class="row justify-content-center">
            <div class="col-md-10 col-12">
              <form action="/login-submit" method="post" novalidate>
                @csrf
                <div class="mt-3 mb-3">
                  <label for="text_username" class="form-label">Usuário</label>
                  <input type="text" class="form-control bg-dark text-info"
                    name="text_username" value="{{ old('text_username') }}"
                    required>

                  @error('text_username')
                    <div class="text-danger mt-1 mb-3">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-5">
                  <label for="text_password" class="form-label">Senha</label>
                  <input type="password" class="form-control bg-dark text-info"
                    name="text_password" value="{{ old('text_password') }}"
                    required>

                  @error('text_password')
                    <div class="text-danger mt-1 mb-3">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <button type="submit"
                    class="btn btn-secondary w-100">LOGIN</button>
                </div>
              </form>

              @if (session('loginError'))
                <div class="alert alert-danger text-center">
                  {{ session('loginError') }}
                </div>
              @endif
            </div>
          </div>

          <div class="text-center text-secondary mt-3">
            <small>&copy;<?= date('Y') ?> - Notes</small>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

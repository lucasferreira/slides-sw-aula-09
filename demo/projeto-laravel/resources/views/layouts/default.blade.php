<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BEM-VINDO</title>
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous"
        />
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
          crossorigin="anonymous"
        ></script>
        <style>
          .has-error {
            color: red;
          }
        </style>
    </head>
    <body>
      <div class="container-fluid">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <strong class="fs-4">UniSATC</strong>
          </a>

          <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ url("/") }}" class="nav-link active" aria-current="page">Home</a></li>
          </ul>
        </header>
      </div>
        <div class="container-fluid">
          {{-- Info Alert --}}
          @if(session('status'))
          <div class="top-alert alert alert-info alert-dismissible" role="alert">
              {{session('status')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          {{-- Success Alert --}}
          @if(session('success'))
          <div class="top-alert alert alert-success alert-dismissible" role="alert">
              {{session('success')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          {{-- Error Alert --}}
          @if(session('error'))
          <div class="top-alert alert alert-danger alert-dismissible" role="alert">
              {{session('error')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <main>
            @yield('content')
          </main>
        </div>
        <footer class="container-fluid" style="margin: 21px 0; border-top: 1px solid #ddd; padding-top: 16px; text-align: center;">
            SATC - Todos os direitos reservados
        </footer>
    </body>
</html>

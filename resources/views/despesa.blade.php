<html>
	<head>
    <meta charset="utf-8" />
		<title>Despesas</title>

		<!-- Bootstrap início -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap fim -->

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
   
	</head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
      <a href="{{ route('dashboard') }}">
        <button type="button" class="btn btn-dark">Voltar</button>
      </a>
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ml-5">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('despesas') }}">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('consulta-despesa') }}">Consulta</a>
            </li>
          </ul>
          
        </div>
      </div>
    </nav>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="{{ route('despesas') }}" method="POST" name="valida">
      @csrf
        <div class="container">
          <div class="row">
            <div class="col mb-5">
              <h1 class="display-4">Registro de nova despesa</h1>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-md-2">
              <select class="form-control" id="ano" name="ano">
                <option value="">Ano</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select>
            </div>

            <div class="col-md-2">
              <select class="form-control" id="mes" name="mes">
                <option value="">Mês</option>
                <option value="Janeiro">Janeiro</option>
                <option value="Fevereiro">Fevereiro</option>
                <option value="Março">Março</option>
                <option value="Abril">Abril</option>
                <option value="Maio">Maio</option>
                <option value="Junho">Junho</option>
                <option value="Julho">Julho</option>
                <option value="Agosto">Agosto</option>
                <option value="Setembro">Setembro</option>
                <option value="Outubro">Outubro</option>
                <option value="Novembro">Novembro</option>
                <option value="Dezembro">Dezembro</option>
              </select>
            </div>
            
            <div class="col-md-2">
              <input type="text" class="form-control" placeholder="Dia" id="dia" name="dia"/>
            </div>

            <div class="col-md-6">
              <select class="form-control" id="tipo" name="tipo">
                <option value="">Tipo</option>
                <option value="Aluguel">Aluguel</option>
                <option value="Energia">Energia</option>
                <option value="Água">Energia</option>
                <option value="Transporte">Transporte</option>
                <option value="Outros">Outros</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="Descrição" id="descricao" name="descricao"/>
            </div>

            <div class="col-md-2">
              <input type="text" class="form-control" placeholder="Valor" id="valor" name="valor"/>
            </div>

            <div class="col-md-2 d-flex justify-content-end">
              <button type="submit" class="btn btn-primary" onclick="cadastrar()">
                Cadastrar despesas
              </button>
            </div>
          </div>
        </div>
    </form>
  </body>	
</html>
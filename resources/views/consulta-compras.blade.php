<html>
	<head>
    <meta charset="utf-8" />
		<title>Compras</title>

		<!-- Bootstrap início -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap fim -->

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="{{ asset('js/compras.js') }}">
    
    </script>

	</head>

  <body>

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary mb-5">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="{{ route('dashboard') }}">
                <button type="button" class="btn btn-light">Voltar</button>
            </a>
            <ul class="navbar-nav mr-auto ml-5">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('compras') }}">Cadastro</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('consulta-compras') }}">Consulta</a>
                </li>
            </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row mb-5">
        <div class="col">
          <h1 class="display-4">Consulta de Compras</h1>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <table class="table" >
            <thead>
              <tr>
                <th>ano</th>
                  <th>mes</th>
                  <th>dia</th>
                  <th>tipo</th>
                  <th>descricao</th>
                  <th>valor</th>
                  <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($compras as $compra)
                <tr>
                  <td>{{$compra->ano}}</td>
                  <td>{{$compra->mes}}</td>
                  <td>{{$compra->dia}}</td>
                  <td>{{$compra->tipo}}</td>
                  <td>{{$compra->descricao}}</td>
                  <td class="valor">{{$compra->valor}}</td>
                  <td class="btn btn-danger"><a href="{{ route('excluir-compras',['id'=>$compra->id]) }}"><i class="fa fa-times"></i></a></td> 
                  <th></th>
                </tr>   
              @endforeach
              <thead>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>Total:</th><th id="resultado"></th> 
                  <th></th>
                </tr>
              </thead>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>	

</html>
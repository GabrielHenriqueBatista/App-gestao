<x-app-layout>
<!DOCTYPE html>
    <!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
    <html lang="en" dir="ltr">
    <head>
      <meta charset="UTF-8">
      <title> Responsive Sidebar Menu  | CodingLab </title>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Boxicons CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="sidebar">
    <div class="logo-details">
      <a href="{{ route('dashboard') }}">
        <div class="logo_name">Finans</div>
      </a>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="{{ route('despesas') }}">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Cadastro despesas</span>
        </a>
         <span class="tooltip">Despesas</span>
      </li>

     <li>
       <a href="{{ route('faturamento') }}">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Cadastro faturamento</span>
       </a>
       <span class="tooltip">Faturamento</span>
     </li>
     <li>
        <a href="{{ route('compras') }}">
          <i class='bx bx-cart-alt' ></i>
          <span class="links_name">Compras</span>
        </a>
        <span class="tooltip">Compras</span>
      </li>
     <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Agenda</span>
       </a>
       <span class="tooltip">Agenda</span>
     </li>
     
      <li>
        <a href="{{ route('profile.show') }}">
          <i class='bx bx-user' ></i>
          <span class="links_name">Perfil</span>
        </a>
        <span class="tooltip">Perfil</span>
      </li>
      <li class="profile">
        <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Sair') }}
            </x-jet-dropdown-link>
          </form>
      </li>
     
    </ul>
  </div>
  <section class="home-section">
    <div class="container">
      <div class='row'>
        <div class='col-md-4 mt-5'>
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
              <div class="card-header">Despesas</div>
              <div class="card-body">
                <h5 class="card-title">Valor total despesas:</h5>
                <p class="card-text"></p>
              </div>
            </div>
        </div>
    
        <div class='col-md-4 mt-5'>
          <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Faturamentos</div>
            <div class="card-body">
              <h5 class="card-title">Valor total Vendas:</h5>
              <p class="card-text"></p>
            </div>
          </div>
    
        </div>
    
        <div class='col-md-4 mt-5'>
          <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Compras</div>
            <div class="card-body">
              <h5 class="card-title">Valor total compras:</h5>
              <p class="card-text"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
</x-app-layout>



  <nav class="navbar navbar-expand-lg navbar-light shadow-sm static-top sticky-top" id="mainNav">
    <div class="container-fluid px-3">
        <a class="navbar-brand" href="/">
            <img src="{{URL::asset('/images/original-version/even-dot.svg')}}" alt="Logo" height="auto" width="180" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            


            <!-- Right Side Of Navbar -->
              
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link h4 p-2  mt-2" href="/">Naslovna</a>
                </li>
                <span class="divider p-2  mt-2"><i class="fas fa-grip-lines-vertical"></i></span>
                <li class="nav-item">
                    <a class="nav-link h4 p-2  mt-2" href="/cars">Oglasi</a>
                </li>
                <span class="divider p-2  mt-2"><i class="fas fa-grip-lines-vertical"></i></span>
                <li class="nav-item">
                    <a class="nav-link h4 p-2  mt-2" href="/contact">Kontakt</a>
                </li>
                <span class="divider p-2  mt-2"><i class="fas fa-grip-lines-vertical"></i></span>
                <li class="nav-item">
                    <a class="nav-link h4 p-2  mt-2 mr-3" data-toggle="modal" data-target="#calcModal" href="/contact">Izračun kredita</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item mt-3 mb-3">
                        <a class="btn btn-dark btn-lg d-inline" href="{{ route('login') }}">{{ __('Admin prijava') }}</a>
                    </li>
                   
                    
                @else
                    <li class="nav-item dropdown btn btn-dark ml-3 px-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Admin <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin">Admin sučelje</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Odjava') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- calcModal -->
<div class="modal fade" id="calcModal" tabindex="-1" role="dialog" aria-labelledby="calcModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="calcModalLabel">Kalkulator kredita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="creditInput">Iznos kredita (€):</label>                                        
                  <input type="number" class="form-control" id="creditInput" placeholder="#">
                </div>
                <div class="form-group">
                  <label for="annualInput">Broj anuiteta:</label>
                  <select class="form-control" id="annualInput">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="cardInput">Kartica:</label>
                  <select class="form-control" id="cardInput">
                    <option>Visa</option>
                    <option>MasterCard</option>
                    <option>Maestro</option>
                    <option>Diners</option>
                    <option>Amex</option>
                  </select>
                </div>
                <div class="form-group">
                  <div id="output">
                    <p>Ukupan iznos kredita (€) je:</p>
                    <p class="form-control" id="output-value"></p>
                  </div>
              </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Natrag</button>
          <button type="button" class="btn btn-outline-primary operator" id="calculate">Izračunaj</button>
        </div>
      </div>
    </div>
  </div>
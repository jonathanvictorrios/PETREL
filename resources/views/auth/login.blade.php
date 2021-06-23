

@section('login')

@if ($message = Session::get('success'))
<h1>Hola soy Marquitos</h1>
@endif

                    <form method="POST" action="{{ route('roles.index') }}">
                        @csrf

                        <div class="form-group row justify-content-between text-left">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>                         
                        <input type="email" id="email" class="form-control border-0 cell @error('email') is-invalid @enderror" placeholder="Ingrese su email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        
                        </div>

                        <div class="form-group row justify-content-between text-left">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>                         
                        <input type="password" id="password" class="form-control border-0 cell @error('password') is-invalid @enderror" placeholder="Ingrese su contraseña" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                        
                        </div>

                        <div class="form-group row">
                        <div class="col-md-6"> 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="col-md-6"> 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                        </div>
                        
                        
                                <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button></div>
                        
                        <div class="col-md-6">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvido su contraseña?') }}
                                    </a>
                                @endif
                                </div></div>
                        
                    </form>
@endsection

<!-- 
                                                

                                                    
                                                        <form method="GET" action="{{ route('login') }}">
                                                        @csrf
                                                            <div class="row justify-content-between text-left">
                                                                <div class="form-group col-12 flex-column d-flex py-3"> 
                                                                    <label class="form-control-label px-3 py-2">Email</label> 
                                                                    <input class="border-0 cell" type="text" id="email" name="email" placeholder="Ingrese su email"> 
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between text-left">
                                                                <div class="form-group col-12 flex-column d-flex py-3"> 
                                                                    <label class="form-control-label px-3 py-2">Contraseña</label> 
                                                                    <input class="border-0 cell" type="text" id="password" name="password" placeholder="Ingrese su contraseña"> 
                                                                </div>
                                                            </div>
                                                            <div class="row justify-content-between text-left py-3">
                                                                <p><a href="">¿Olvido su contraseña?</a></p>
                                                            </div>
                                                            <div class="row justify-content-center text-center py-4">
                                                                <div class="form-group col-sm-6">
                                                                    <button id="boton" name="boton" type="submit" class="btn-block w-100 p-1 rounded-2">Ingresar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> -->
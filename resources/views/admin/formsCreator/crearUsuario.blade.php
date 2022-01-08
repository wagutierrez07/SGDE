<button class="btn btn-success btn-claro-success fw-bold modal-button-left" data-bs-toggle="modal" data-bs-target="#UserRegister">
    <i class="fas fa-plus mx-2"></i>
    <label class="texto-button">Registrar</label></button>
<!-- Modal crear Usuario-->
<div class="modal fade" id="UserRegister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-rad">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="staticBackdropLabel">REGISTRO DE USUARIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addFrm" method="post">
                <div class="modal-body p-4 text-center" >
                    @csrf
                    <div class="container">
                        <div class="row row cols-2">
                            <div class="col-6 my-2">
                                @error('nombre')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="nombre" value="{{ __('nombre') }}">Nombre</label>
                                <input id="nombreModalUserCreate" placeholder="Nombre" class="form-control" type="text" name="nombre" :value="old('nombre')" required autocomplete="name">
                            </div>
                            <div class="col-6 my-2">
                                @error('apellido')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="apellido" value="{{ __('apellido') }}">Apellido</label>
                                <input id="apellidoModalUserCreate" placeholder="Apellido" class="form-control" type="text" name="apellido" :value="old('apellido')" required autocomplete="apellido">
                            </div>
                            <div class="col-6 mt-2">
                                @error('cedula')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="cedula" value="{{ __('cedula') }}">Cédula</label>
                                <input id="cedulaModalUserCreate" placeholder="No. Cédula" class="form-control" type="number" name="cedula" min="500000" max="32000000" :value="old('cedula')" required />
                            </div>
                            <div class="col-6 mt-2">
                                @error('email')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="email" value="{{ __('Email') }}">Email</label>
                                <input id="emailModalUserCreate" placeholder="Correo" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="col-6 mt-2">
                                @error('usuario')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="usuario" value="{{ __('usuario') }}">Nombre de Usuario</label>
                                <input id="usuarioModalUserCreate" placeholder="Nombre de Usuario" class="form-control" type="text" name="usuario" :value="old('usuario')" required />
                            </div>
                            <div class="col-6 mt-2">
                                @error('password')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="password" value="{{ __('Password') }}">Su Contraseña</label>
                                <input  id="passwordModalUserCreate" placeholder="Contraseña" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>
                            <div class="col-12 mt-2">
                                @error('password_confirmation')
                                <br>
                                <small>{{$message}}</small>
                                <br>
                                @enderror
                                <label class="fw-normal" for="password_confirmation" value="{{ __('Confirm Password') }}">Confirmación de Contraseña</label>
                                <input id="password_confirmationCreate" placeholder="Confirmar Contraseña" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <div class="col-12 mt-2">
                                    <label class="fw-normal" for="text" value="{{ __('estatus') }}">Estado</label>
                                    <fieldset>
                                        <input class="form-check-input" id="estatusModalUserCreate" type="checkbox" name="estatus" :value="old('estatus')"  autofocus />Activo
                                        <input class="form-check-input" id="estatusModalUserCreate2" type="checkbox" name="estatus" :value="old('estatus')"  autofocus />Inactivo
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-quit-bs mx-4 mb-4">
                    <div class="col-4">
                        <button type="button" class="btn btn-outline-success w-100 modal-button-rigth fw-bold" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                    </div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-success  w-100 modal-button-left ms-2 fw-bold"><span class="fas fa-save alt mx-2"></span>Registrar Usuario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
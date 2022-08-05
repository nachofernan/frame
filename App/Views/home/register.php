<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-muted font-weight-light mt-4" id="titulo">Registrarse</h1>
            <div class="row justify-content-md-center">
                <div class="col-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="" method="POST" id="formRegister">
                                <div class="form-group">
                                    <label for="email" class="text-muted">Correo Electrónico</label>
                                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Correo Electrónico">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="text-muted">Nombre de Usuario</label>
                                    <input type="username" id="inputUsername" class="form-control" name="username" placeholder="Nombre de Usuario">
                                </div>
                                <div class="form-group pb-2">
                                    <label for="password" class="text-muted">Contraseña</label>
                                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña">
                                </div>
                                <div class="d-none text-danger py-1 rounded small" role="alert" id="error">
                                    Error en guardar el usuario
                                </div>
                                <div class="d-none text-dark py-1 rounded small" role="alert" id="correcto">
                                    Creando usuario <div class="loader"></div>
                                </div>
                                <hr class="mt-2">
                                <div class="form-group mt-2 mb-1">
                                    <button type="submit" class="btn btn-block btn-light text-muted">Registrarse</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
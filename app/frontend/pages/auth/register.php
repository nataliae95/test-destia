<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            /* Permite centrar verticalmente */
        }
    </style>
</head>

<body>
    <section class="h-100">
        <div class="container h-100 pt-3">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h2 class="text-center card-title pb-3">Registro</h2>
                            <form method="POST" novalidate="" autocomplete="on">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Nombre</label>
                                    <input id="name" type="text" class="form-control" name="name" value="" required
                                        autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Correo Electronico</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Contraseña</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>

                                <div class="align-items-center d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        Registrar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                ¿Ya tienes una cuenta? <a href="/login" class="text-dark">Iniciar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-center">
        <div class="text-muted mt-3">
            © 2024 Prueba Tecnica. Todos los derechos reservados.
        </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        // Mostrar el mensaje de sesión si existe
        <?php if (isset($_SESSION['message'])): ?>
            toastr.error('<?php echo $_SESSION['message']; ?>');
            <?php unset($_SESSION['message']); // Elimina el mensaje ?>
        <?php endif; ?>
    </script>
</body>

</html>
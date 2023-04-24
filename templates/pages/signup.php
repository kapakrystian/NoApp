<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="public/style.css" />
    <title>Register Page</title>
</head>

<body>

    <section>
        <div class="container mt-5 pt-5 ms-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                    <h5 class="mt-5 md-3 text-uppercase">Rejestracja do systemu NoApp</h5>
                    <div class="mt-4 card">
                        <div class="card-body">
                            <form action="/register/create" method="POST" id="signup">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                                <label for="username" class="mt-2 form-label">Nazwa użytkownika</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                                <label for="password" class="mt-2 form-label">Hasło</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                                <div class="text-center mt-3">
                                    <button class="btn btn-dark" type="submit" name="signupBtn" value="Signup">Utwórz konto</button>
                                </div>
                                <div class="mt-3">
                                    <span>Posiadasz konto? <a class="text-decoration-none" href="login">Zaloguj się</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>
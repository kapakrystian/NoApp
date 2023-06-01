<section>
    <div class="container-fluid mt-5 w-75">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h5 class="mt-5 md-3 text-uppercase">Edytuj informacje o profilu</h5>
                <div class="mt-4 card user-inf">
                    <div class="card-body">
                        <form action="/myProfile/edit" method="POST" id="editProfile">
                            <label for="email" class="mt-2 form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $params[0]['email'] ?>">
                            <label for="phone" class="mt-3 form-label">Telefon:</label>
                            <input type="tel" name="phone" class="form-control" id="phone" value="<?php echo $params[0]['phone'] ?>" pattern="[0-9]{9}" title="Wpisz 9-cyfrowy numer telefonu">
                            <label for="password" class="mt-3 form-label">Podaj nowe hasło:</label>
                            <input type="text" name="password" class="form-control" id="password" minlength="8" pattern="^(?=.*\d).{8,}$" title="Hasło musi zawierać minimum 8 znaków, w tym jedną cyfrę.">
                            <div class="text-center mt-3">
                                <button class="btn btn-dark" type="submit" name="editProfileBtn" value="editProfileBtn">Zapisz zmiany</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
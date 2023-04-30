<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h4 class="my-4 text-uppercase"><span>UŻYTKOWNICY BEZ UPRAWNIEŃ ADMINISTRATORSKICH</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Imię i nazwisko</th>
                                <th>Nazwa użytkownika</th>
                                <th>Email</th>
                                <th>Numer telefonu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($params as $row) : ?>
                                <tr>
                                    <td><?php echo $row['name_surname'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>

                                    <td>
                                        <button class="btn btn-secondary btn-sm" type="button" id="changePermissionsBtn">
                                            <a class="text-decoration-none text-white" href="#">Nadaj uprawnienia</a>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</section>
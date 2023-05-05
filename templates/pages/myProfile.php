<div class="container-fluid mt-5 w-75">
    <div class="user-inf">
        <div class="row">
            <div class="col-md-4">
                <img alt="" style="width:500px;" title="" class="img-circle img-thumbnail" src="pic/default_user.png">
            </div>
            <div class="col-sm-12 col-md-10 col-lg-8">
                <h5 class="text-uppercase">Informacje o użytkowniku</h5><br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="me-1"><i class="bi bi-person"></i></span>
                                        <span class="text-primary"></span>
                                        Imię i nazwisko
                                    </strong>
                                </td>
                                <td class="text-secondary">
                                    <?php echo $params[0]['name_surname'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="me-1"><i class="bi bi-person-check"></i></span>
                                        <span class="text-primary"></span>
                                        Nazwa użytkownika
                                    </strong>
                                </td>
                                <td class="text-secondary">
                                    <?php echo $params[0]['username'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="me-1"><i class="bi bi-envelope-open"></i></span>
                                        <span class="text-primary"></span>
                                        Email
                                    </strong>
                                </td>
                                <td class="text-secondary">
                                    <?php echo $params[0]['email'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="me-1"><i class="bi bi-telephone"></i></span>
                                        <span class="text-primary"></span>
                                        Telefon
                                    </strong>
                                </td>
                                <td class="text-secondary">
                                    <?php echo $params[0]['phone'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="me-1"><i class="bi bi-person-x"></i></span>
                                        <span class="text-primary"></span>
                                        Rodzaj konta
                                    </strong>
                                </td>
                                <td class="text-secondary">
                                    <?php echo $params[0]['permissions'] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
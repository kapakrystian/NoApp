<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h4 class="my-4 text-uppercase"><span><?php echo $_SESSION['name_surname'] ?> - godziny pracy</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Dzień</th>
                                <th>Godzina rozpoczęcia</th>
                                <th>Godzina zakończenia</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($params as $row) : ?>
                                <tr>
                                    <td><?php echo $row['day']; ?></td>
                                    <td><?php echo $row['start_time']; ?></td>
                                    <td><?php echo $row['end_time']; ?></td>
                                    <td><?php echo $row['status_ho']; ?></td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" type="button" id="deleteHoursBtn">
                                            <a class="text-decoration-none text-white" href="#">Usuń</a>
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
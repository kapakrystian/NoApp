<section>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h4 class="my-4 text-uppercase"><span>WYDARZENIA DO POTWIERDZENIA</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Użytkownik</th>
                                <th>Tytuł</th>
                                <th>Dzień rozpoczęcia</th>
                                <th>Dzień zakończenia</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($params as $row) : ?>
                                <tr>
                                    <td><?php echo $row['name_surname'] ?></td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><?php echo $row['start_date']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" type="button" id="acceptLeavetime" onclick="acceptLeavetime(<?php echo $row['id'] ?>)">
                                            Akceptuj
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" type="button" id="acceptLeavetime" onclick="rejectLeavetime(<?php echo $row['id'] ?>)">
                                            Odrzuć
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

<!-- potwierdzenie dni urlopowych -->
<script>
    function acceptLeavetime(leavetimeId) {
        if (confirm('Czy potwierdasz dany urlop?')) {
            $.ajax({
                url: 'leavetimeAccept/acceptLeavetime',
                method: 'POST',
                data: {
                    id: leavetimeId
                },
                success: function(response) {
                    alert('Potwierdzono urlop.');
                    location.reload();
                }
            });
        }
    }
</script>

<!-- odrzucenie dni urlopowych -->
<script>
    function rejectLeavetime(leavetimeId) {
        if (confirm('Czy na pewno chcesz odrzucić dany urlop?')) {
            $.ajax({
                url: 'leavetimeAccept/rejectLeavetime',
                method: 'POST',
                data: {
                    id: leavetimeId
                },
                success: function(response) {
                    alert('Odrzucono urlop.');
                    location.reload();
                }
            });
        }
    }
</script>

<!-- sktypt biblioteki DataTable -->
<script>
    $("table").DataTable({
        dom: "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        columnDefs: [{
            orderable: false,
            searchable: false,
            targets: [5, 6]
        }],
        language: {
            "decimal": "",
            "emptyTable": "Brak danych",
            "info": "Wyświetlanie od _START_ do _END_ z _TOTAL_ rekordów",
            "infoEmpty": "Wyświetlanie od 0 do 0 z 0 rekordów",
            "infoFiltered": "(filtrowanie spośród _MAX_ wszystkich rekordów)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Wyświetl _MENU_ rekordów",
            "loadingRecords": "Ładowanie...",
            "processing": "Przetwarzanie...",
            "search": "Szukaj:",
            "zeroRecords": "Nie znaleziono pasujących rekordów",
            "paginate": {
                "first": "Pierwsza",
                "last": "Ostatnia",
                "next": "Następna",
                "previous": "Poprzednia"
            },
            "aria": {
                "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
            }
        }
    });
</script>
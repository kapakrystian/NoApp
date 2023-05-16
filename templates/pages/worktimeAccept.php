<section>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h4 class="my-4 text-uppercase"><span>GODZINY PRACY DO POTWIERDZENIA</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Użytkownik</th>
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
                                    <td><?php echo $row['name_surname'] ?></td>
                                    <td><?php echo $row['day']; ?></td>
                                    <td><?php echo $row['start_time']; ?></td>
                                    <td><?php echo $row['end_time']; ?></td>
                                    <td><?php echo $row['status_ho']; ?></td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" type="button" id="acceptHours" onclick="acceptHours(<?php echo $row['id'] ?>)">
                                            Akceptuj
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

<!-- potwierdzenie godzin pracy -->
<script>
    function acceptHours(hoursId) {
        if (confirm('Czy potwierdasz godzinę?')) {
            $.ajax({
                url: 'worktimeAccept/acceptHours',
                method: 'POST',
                data: {
                    id: hoursId
                },
                success: function(response) {
                    alert('Potwierdzono godzinę');
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
            targets: [5, 4]
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
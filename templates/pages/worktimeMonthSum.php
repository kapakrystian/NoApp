<?php

require_once("functions.php") ?>

<section>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h4 class="my-4 text-uppercase"><span><?php echo $_SESSION['name_surname'] ?> - suma godzin pracy w poszczególnych miesiącach</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Rok</th>
                                <th>Miesiąc</th>
                                <th>Ilość godzin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($params as $row) : ?>
                                <tr>
                                    <td><?php print_r(translateMonthName($row['year'])); ?></td>
                                    <td><?php print_r(translateMonthName($row['month'])); ?></td>
                                    <td><?php print_r(translateMonthName($row['total_hours'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</section>

<!-- sktypt biblioteki DataTable -->
<script>
    $("table").DataTable({
        dom: "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
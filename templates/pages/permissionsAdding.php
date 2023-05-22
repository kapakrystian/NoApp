<section>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h4 class="my-4 text-uppercase"><span>LISTA UŻYTKOWNIKÓW</span></h4>
                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead>
                            <tr>
                                <th>Imię i nazwisko</th>
                                <th>Nazwa użytkownika</th>
                                <th>Email</th>
                                <th>Numer telefonu</th>
                                <th>Rodzaj konta</th>
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
                                    <td><?php echo $row['permissions'] ?></td>

                                    <td>
                                        <!-- Default dropright button -->
                                        <div class="btn-group dropdown dropright">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Akcje
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" id="changePermissionsBtn" onclick="addPermissions(<?php echo $row['id'] ?>)">Nadaj uprawnienia</a>
                                                <a class="dropdown-item" href="#" id="deleteUserPermissionsBtn" onclick="deletePermissions(<?php echo $row['id'] ?>)">Usuń uprawnienia</a>
                                                <a class="dropdown-item" href="#" id="deleteUserBtn" onclick="deleteUsers(<?php echo $row['id'] ?>)">Usuń użytkownika</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
</section>

<!--skrypt nadający uprawnienia administratorskie-->
<script>
    function addPermissions(userId) {
        if (confirm('Czy na pewno chcesz nadać temu użytkownikowi uprawnienia administratorskie?')) {
            $.ajax({
                url: 'permissionsAdding/addPermissions',
                method: 'POST',
                data: {
                    id: userId
                },
                success: function(response) {
                    alert('Uprawnienia zostały dodane.');
                    location.reload();
                }
            });
        }
    }
</script>

<!-- skrypt usuwający uprawnienia administratorskie -->
<script>
    function deletePermissions(userId) {
        if (confirm('Czy na pewno chcesz usunać uprawnienia administratorskie temu użytkownikowi?')) {
            $.ajax({
                url: 'permissionsAdding/deletePermissions',
                method: 'POST',
                data: {
                    id: userId
                },
                success: function(response) {
                    alert('Uprawnienia zostały usunięte.');
                    location.reload();
                }
            });
        }
    }
</script>

<!--skrypt usuwający użytkownika-->
<script>
    function deleteUsers(userId) {
        if (confirm('Czy na pewno chcesz usunąć tego użytkownika?')) {
            $.ajax({
                url: 'permissionsAdding/deleteUsers',
                method: 'POST',
                data: {
                    id: userId
                },
                success: function(response) {
                    alert('Użytkownik został usunięty.');
                    location.reload();
                },
                failure: function(response) {
                    alert('Przed usunięciem użytkownika musisz usunąć wszystkie powiązane z nim zawartości!');
                }
            });
        }
    }
</script>

<!--skypt biblioteki DataTables-->
<script>
    $("table").DataTable({
        dom: "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        columnDefs: [{
            orderable: false,
            searchable: false,
            targets: [4]
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
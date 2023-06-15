<div class="container-fluid mt-2">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-3 d-flex flex-row">
        <?php

        use App\Constants\TasksStatus;

        foreach ($params as $row) : ?>
            <div class="col my-3">
                <div class="card user-inf h-100">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between">
                        <h3 class="card-title text-dark text-uppercase mt-2 w-100"><?php echo $row['title']; ?></h3>
                        <button type="button" class="btn-close" aria-label="Close" onclick="deleteTask(<?php echo $row['id'] ?>)"></button>
                    </div>
                    <div class="card-body bg-secondary text-white">
                        <p class="card-subtitle text-danger"><?php echo $row['importance']; ?></p>
                        <p class="card-text my-2"><?php echo $row['content']; ?></p>
                    </div>
                    <div class="card-footer bg-secondary d-flex align-items-end justify-content-between">
                        <form>
                            <input type="hidden" name="task_id" value="<?php echo $row['id'] ?>" />
                            <select class="form-select bg-secondary" style="border-color: white;" name="task_stauts">
                                <option value="<?php echo TasksStatus::PENDING ?>" <?php echo $row['status'] == TasksStatus::PENDING ? 'selected' : '' ?>>Oczekujące</option>
                                <option value="<?php echo TasksStatus::IN_PROGRESS ?>" <?php echo $row['status'] == TasksStatus::IN_PROGRESS ? 'selected' : '' ?>>Wykonywane</option>
                                <option value="<?php echo TasksStatus::ENDING ?>" <?php echo $row['status'] == TasksStatus::ENDING ? 'selected' : '' ?>>Zakończone</option>
                            </select>
                        </form>
                        <div>
                            <a class="d-grid text-decoration-none" href="/tasks/editContent?id=<?php echo $row['id'] ?>"><button class="btn btn-secondary text-dark me-5" style="border-color: white;" type="button" id="editTaskContent">Edytuj</button></a>
                        </div>
                        <div class="align-items-center mb-2">
                            <span class="text-dark">Autor: <?php echo $row['name_surname']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- zmiana statusu zadania -->
<script>
    $(function() {
        $('.form-select').on('change', function() {
            var taskId = $(this).siblings('[name="task_id"]').val();
            var status = $(this).val();

            $.ajax({
                url: 'tasks/edit',
                method: 'POST',
                data: {
                    id: taskId,
                    status: status
                },
                success: function(response) {
                    alert('Status zadania został zmieniony.');
                    window.location.reload();
                }
            });
        });
    });
</script>

<!-- usuwanie zadania -->
<script>
    function deleteTask(cardId) {
        if (confirm('Czy na pewno chcesz usunąć to zadanie?')) {
            $.ajax({
                url: 'tasks/delete',
                method: 'POST',
                data: {
                    id: cardId
                },
                success: function(response) {
                    alert('Zadanie zostało usunięte.');
                    location.reload();
                }
            });
        }
    }
</script>
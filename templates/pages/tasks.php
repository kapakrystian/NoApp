<div class="container-fluide mt-2">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-3">
        <?php

        use App\Constants\TasksStatus;

        foreach ($params as $row) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-body bg-secondary text-white">
                        <h3 class="card-title"><?php echo $row['title']; ?> </h3>
                        <h5 class="card-subtitle"><?php echo $row['importance']; ?></h5>
                        <p class="card-text my-2"><?php echo $row['content']; ?></p>
                        <p class="card-footer">Autor: <?php echo $row['username']; ?></p>

                        <form>
                            <input type="hidden" name="task_id" value="<?php echo $row['id'] ?>" />
                            <select class="form-select" name="task_stauts">
                                <option value="<?php echo TasksStatus::PENDING ?>" <?php echo $row['status'] == TasksStatus::PENDING ? 'selected' : '' ?>>Oczekujące</option>
                                <option value="<?php echo TasksStatus::IN_PROGRESS ?>" <?php echo $row['status'] == TasksStatus::IN_PROGRESS ? 'selected' : '' ?>>W trakcie realizacji</option>
                                <option value="<?php echo TasksStatus::ENDING ?>" <?php echo $row['status'] == TasksStatus::ENDING ? 'selected' : '' ?>>Zakończone</option>
                            </select>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(function() {
        $('.form-select').on('change', function() {
            var taskId = $(this).siblings('[name="task_id"]').val();
            var status = $(this).val();

            $.ajax({
                url: 'tasks/edit',
                method: 'POST',
                data: {
                    task_id: taskId,
                    status: status
                },
                success: function(response) {
                    alert('Status zadania został zmieniony.');
                },
                error: function() {
                    alert('Wystąpił błąd podczas zmiany statusu zadania');
                }
            });
        });
    });
</script>
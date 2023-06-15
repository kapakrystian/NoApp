<?php var_dump($params) ?>
<section>
    <div class="container-fluid mt-5 w-75">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h5 class="mt-5 md-3 text-uppercase">Edytuj zadanie</h5>
                <div class="mt-4 card user-inf">
                    <div class="card-body">
                        <form action="/tasks/editContent" method="POST" id="editContentTask">
                            <label for="title" class="mt-2 form-label">Tytuł:</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?php echo $params['title'] ?>">

                            <label for="content" class="mt-3 form-label">Treść:</label>
                            <textarea name="content" class="form-control" id="content"><?php echo $params['content'] ?></textarea>

                            <input type="text" name="id" id="id" value="<?php echo $params['id'] ?>" hidden>


                            <div class="text-center mt-3">
                                <button class="btn btn-dark" type="submit" name="editTaskContent" value="editTaskContent">Zapisz zmiany</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
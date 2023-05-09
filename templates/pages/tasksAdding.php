<section>
    <div class="container-fluid mt-5 w-75">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h5 class="mt-5 md-3 text-uppercase">Dodaj nowe zadanie</h5>
                <div class="mt-4 card user-inf">
                    <div class="card-body">
                        <form action="" method="POST" id="tasksAdding">
                            <label for="title" class="form-label">Tytuł</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                            <label for="content" class="mt-3 form-label">Treść</label>
                            <textarea type="text" name="content" class="form-control" id="content" required></textarea>
                            <label for="importance" class="mt-3 form-label">Jak ważne jest twoje zadanie?</label>
                            <select name="importance" id="importance" class="form-select" required>
                                <option value="Pilne">Pilne</option>
                                <option value="Ważne">Ważne</option>
                                <option value="Istotne">Istotne</option>
                                <option value="W wolnej chwili">W wolnej chwili</option>
                                <option value="Długoterminowe">Długoterminowe</option>
                            </select>
                            <div class="text-center mt-4">
                                <button class="btn btn-dark" type="submit" name="addTaskBtn" value="addTaskBtn">Dodaj zadanie</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
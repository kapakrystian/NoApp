<section>
    <div class="container-fluid mt-5 w-75">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h5 class="mt-5 md-3 text-uppercase">Wprowadź okres oraz tytuł wydarzenia</h5>
                <div class="mt-4 card user-inf">
                    <div class="card-body">
                        <form action="" method="POST" id="leavetimeAdding">
                            <label for="day" class="form-label">Tytuł</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                            <label for="start_time" class="mt-2 form-label">Dzień rozpoczęcia</label>
                            <input type="date" name="start_time" class="form-control" id="start_time" required>
                            <label for="end_time" class="mt-2 form-label">Dzień zakończenia</label>
                            <input type="date" name="end_time" class="form-control" id="end_time" required>
                            <div class="text-center mt-4">
                                <button class="btn btn-dark" type="submit" name="addEventBtn" value="addEventBtn">Dodaj wydarzenie</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
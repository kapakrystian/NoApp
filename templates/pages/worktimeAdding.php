<section>
    <div class="container-fluid mt-5 w-75">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 m-auto">
                <h5 class="mt-5 md-3 text-uppercase">Wprowadź datę oraz czas pracy</h5>
                <div class="mt-4 card user-inf">
                    <div class="card-body">
                        <form action="" method="POST" id="worktimeAdding">
                            <label for="day" class="form-label">Dzień</label>
                            <input type="date" name="day" class="form-control" id="day" required>
                            <label for="start_time" class="mt-2 form-label">Godzina rozpoczęcia pracy</label>
                            <input type="time" name="start_time" class="form-control" id="start_time" required>
                            <label for="end_time" class="mt-2 form-label">Godzina zakończenia pracy</label>
                            <input type="time" name="end_time" class="form-control" id="end_time" required>
                            <div class="text-center mt-4">
                                <button class="btn btn-dark" type="submit" name="addHoursBtn" value="addHoursBtn">Dodaj godziny</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
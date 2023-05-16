<div class="container-fluid mt-3 home">
    <img src="pic/razem.svg" width="900" height="300" alt="">
</div>
<div class="container-fluid text-center mt-5 fw-bolder">
    <h3 class="text-uppercase text-primary"><?php echo $_SESSION['name_surname']; ?>, witamy w aplikacji NoApp!</h3>
    <h5 class="text-secondary"> Przejdź do jednego z poniższych modułów:</h5>
</div>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="btn-group mt-5">
            <button class="btn btn-outline btn-primary text-uppercase"> <a href="tasks" class="text-decoration-none text-dark"> Moduł zadaniowy</a></button>
            <button class="btn btn-outline btn-secondary text-uppercase"> <a href="worktime" class="text-decoration-none text-dark">Moduł godzinowy</a></button>
            <button class="btn btn-outline btn-primary text-uppercase"><a href="leavetime" class="text-decoration-none text-dark">Moduł urlopowy</a></button>
        </div>
    </div>
</div>
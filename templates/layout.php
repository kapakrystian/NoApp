<?php

use App\Constants\Permissions; ?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="public/style.css" />
  <title>NoApp</title>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <div class="mt-3 ms-4 mb-2">
        <a class="navbar-brand p-2" href="dashboard">
          <img src="pic/razem.svg" alt="Logo" width="150" height="50" class="d-inline-block align-text-top" />
          <!-- <span class="mt-3 text-uppercase">NoApp</span> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="topNavBar">
        <form class="d-flex ms-auto my-3 my-lg-0">

          <?php if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false) { ?>
            <div class="btn-toolbar" role="toolbar">
              <div>
                <button class="btn btn-outline-secondary text-white me-1" type="button" role="button">
                  <a class="text-decoration-none text-white text-muted" href="login">Logowanie</a></button>
                <button class="btn btn-outline-secondary text-white me-4" type="button" role="button">
                  <a class="text-decoration-none text-white text-muted" href="register">Rejestracja</a></button>
              </div>
            </div>
          <?php } ?>

          <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
            <div class="text-white text-muted pt-2">
              <span><?php echo $_SESSION['name_surname'] ?></span>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="myProfile">Mój profil</a></li>
                  <li><a class="dropdown-item" href="/logout">Wyloguj</a></li>
                </ul>
              </li>
            </ul>
          <?php } ?>
        </form>
      </div>
    </div>
  </nav>
  <!-- /top navigation bar -->
  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
    <!-- sidebar -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark mt-1" tabindex="-1" id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <!-- <li><hr class="dropdown-divider bg-light p-2" /></li> -->
            <li>
              <a href="/?action=home" class="nav-link px-3 active mt-4">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Home</span>
              </a>
            </li>
            <li class="my-2">
              <hr class="dropdown-divider bg-light" />
            </li>
            <li>
              <div class="text-muted fw-bold text-uppercase px-3 mb-1">
                Moduł zadaniowy
              </div>
            </li>
            <li>
              <a href="tasks" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Wszystkie zadania</span>
              </a>
            </li>
            <li>
              <a href="tasksAdding" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Dodaj zadanie</span>
              </a>
            </li>
            <li>
              <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#tasks">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span class="ms-1">Zadania</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="tasks">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="tasksPending" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                      <span>Zadania oczekujące</span>
                    </a>
                  </li>
                  <li>
                    <a href="tasksInProgress" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                      <span>Zadania wykonywane</span>
                    </a>
                  </li>
                  <li>
                    <a href="tasksEnding" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                      <span>Zadania zakończone</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="my-2">
              <hr class="dropdown-divider bg-light" />
            </li>
            <li>
              <div class="text-muted fw-bold text-uppercase px-3 mb-1">
                Moduł godzinowy
              </div>
            </li>
            <?php
            switch ($_SESSION['permissions']) {
              case Permissions::USER:
            ?>
                <li>
                  <a href="worktimeAdding" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-alarm"></i></span>
                    <span>Dodaj godziny</span>
                  </a>
                </li>
                <li>
                  <a href="worktime" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-alarm"></i></span>
                    <span>Moje godziny</span>
                  </a>
                </li>
                <li>
                  <a href="worktimeMonthSum" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-alarm"></i></span>
                    <span>Suma godzin</span>
                  </a>
                </li>
              <?php
                break;
              case Permissions::ADMIN:
              case Permissions::SUPERADMIN:
              ?>
                <li>
                  <a href="worktimeAccept" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-alarm"></i></span>
                    <span>Potwierdź godziny</span>
                  </a>
                </li>
                <?php
                if ($_SESSION['permissions'] === Permissions::SUPERADMIN) {
                ?>
                  <li>
                    <a href="permissionsAdding" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-alarm"></i></span>
                      <span>Użytkownicy</span>
                    </a>
                  </li>
                  <li>
                    <a href="worktimeMonthSum" class="nav-link px-3">
                      <span class="me-2"><i class="bi bi-alarm"></i></span>
                      <span>Suma godzin</span>
                    </a>
                  </li>
            <?php
                }
                break;
            }
            ?>

            <li class="my-2">
              <hr class="dropdown-divider bg-light" />
            </li>
            <li>
              <div class="text-muted fw-bold text-uppercase px-3 mb-1">
                Moduł urlopowy
              </div>
            </li>
            <li>
              <a href="leavetimeAdding" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-calendar"></i></span>
                <span>Dodaj wydarzenie</span>
              </a>
            </li>
            <li>
              <a href="leavetime" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-calendar"></i></span>
                <span>Kalendarz</span>
              </a>
            </li>
            <li class="my-2">
              <hr class="dropdown-divider bg-light" />
            </li>
          </ul>
        </nav>
      </div>
      <hr class="dropdown-divider bg-light mb-2" />
      <footer class="align-text-center text-white text-muted text-uppercase ms-4 mb-1 ps-2">
        <h5>NOCAR.EU WebApp</h5>
      </footer>
    </div>
    <!--/sidebar-->

    <!-- content -->
    <main class="mt-5 pt-4 ps-1 bgr">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 mt-3">
            <div class="page">
              <?php require_once("templates/pages/{$page}.php"); ?>
              <!-- <p>You are currently not sign in <a href="/?action=login">Login</a> Not yet a member? <a href="/?action=signup">Sign up</a></p> -->
            </div>
          </div>
        </div>
      </div>
      </div>
    </main>
    <!--/content-->
  <?php } else { ?>
    <main class="vh-100 my-auto">
      <?php require_once("templates/pages/{$page}.php"); ?>
    </main>
  <?php } ?>


  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="../js/app.js"></script>
</body>

</html>
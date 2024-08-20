  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="mt-3">
          <a href="dashboard.php" class="app-brand-link text-center">
              <span class="app-brand-logo">
                  <img src="./images/mrp.png" style="width:10vh; height:10vh;margin-left:1vh;">
              </span>
              <span class="app-brand-text  menu-text text-uppercase fw-bolder">MRP MATRICULATION <br> SCHOOL</span>
          </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
              <a href="dashboard.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
              </a>
          </li>

          <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Manage Quiz</span>
          </li>
          <li class="menu-item">
              <a href="assign_quiz.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">Assign Quiz</div>
              </a>
              <a href="view_quiz.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Without navbar">View Quiz</div>
              </a>
          </li>

          <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Students Reports</span>
          </li>
          <li class="menu-item">
              <a href="results.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-collection"></i>
                  <div data-i18n="Basic">View Results</div>
              </a>
              <a href="view_over_all.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Without navbar">All Students Results</div>
              </a>
          </li>
      </ul>
  </aside>
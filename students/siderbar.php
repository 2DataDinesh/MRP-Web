  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="dashboard.php" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="123.png" width="80px" height="80px">
                
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class=" demo menu-text fw-bolder ms-2">MRP MATRICULATION<br>SCHOOL</span>
            </a>

          </div>

          <div class="menu-inner-shadow"></div>

          <ul id="menu" class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
        <a href="dashboard.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Examination</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="attendexam.php" class="menu-link">
                    <div data-i18n="Without menu">Exams</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="rank.php" class="menu-link">
                    <div data-i18n="Without menu">Reports</div>
                </a>
            </li>
        </ul>
    </li>
</ul>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var menu = document.getElementById('menu');
    var links = menu.getElementsByTagName('a');
    var currentUrl = window.location.pathname.split('/').pop();

    for (var i = 0; i < links.length; i++) {
        var link = links[i];
        if (link.getAttribute('href') === currentUrl) {
            var menuItem = link.parentElement;
            menuItem.classList.add('active');
            
            // Add 'active' class to all parent menu items and show the dropdown
            var parentMenuItem = menuItem.closest('.menu-item');
            while (parentMenuItem) {
                parentMenuItem.classList.add('active');
                // Check if the parent menu item has a submenu and expand it
                var submenu = parentMenuItem.querySelector('.menu-sub');
                if (submenu) {
                    submenu.style.display = 'block'; // or add a class like 'show' or 'open'
                }
                parentMenuItem = parentMenuItem.closest('.menu-sub')?.closest('.menu-item');
            }
        }
    }
});
</script>



        </aside>
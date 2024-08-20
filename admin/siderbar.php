<?php 
function isCurrentPage($page) {
    return strpos($_SERVER['PHP_SELF'], $page) !== false;
}
?>
 
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="mt-3">
        <a href="dashboard.php" class="app-brand-link text-center">
            <span class="app-brand-logo">
                <img src="../assets/img/123.png" style="width:10vh; height:10vh;margin-left:1vh;">
            </span>
            <span class="app-brand-text  menu-text text-uppercase fw-bolder">MRP MATRICULATION <br> SCHOOL</span>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?php if(isCurrentPage('dashboard.php')) echo 'active'; ?>">
            <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Students -->
        <li class="menu-item <?php if(isCurrentPage('student_form.php') || isCurrentPage('view_student.php') || isCurrentPage('view_student1.php')) echo 'active'; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Form Elements ">Students</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if(isCurrentPage('student_form.php')) echo 'active'; ?>">
                    <a href="student_form.php" class="menu-link">
                        <div data-i18n="Basic Inputs">Add Students</div>
                    </a>
                </li>
                <li class="menu-item <?php if(isCurrentPage('view_student.php')) echo 'active'; ?>">
                    <a href="view_student.php" class="menu-link">
                        <div data-i18n="Input groups">View Students</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Teachers -->
        <li class="menu-item <?php if(isCurrentPage('teacher_form.php') || isCurrentPage('view_teacher.php') || isCurrentPage('update_teacher.php')) echo 'active'; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div data-i18n="Form Elements">Teacher</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if(isCurrentPage('teacher_form.php')) echo 'active'; ?>">
                    <a href="teacher_form.php" class="menu-link">
                        <div data-i18n="Basic Inputs">Add Teachers</div>
                    </a>
                </li>
                <li class="menu-item <?php if(isCurrentPage('view_teacher.php')) echo 'active'; ?>">
                    <a href="view_teacher.php" class="menu-link">
                        <div data-i18n="Input groups">View Teachers</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Admin -->
        <li class="menu-item <?php if(isCurrentPage('admin_form.php') || isCurrentPage('view_admin_details.php') || isCurrentPage('update_admin_details.php')) echo 'active'; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Form Elements">Subjects</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if(isCurrentPage('admin_form.php')) echo 'active'; ?>">
                    <a href="admin_form.php" class="menu-link">
                        <div data-i18n="Basic Inputs">Add Subjects</div>
                    </a>
                </li>
                <li class="menu-item <?php if(isCurrentPage('view_admin_details.php')) echo 'active'; ?>">
                    <a href="view_admin_details.php" class="menu-link">
                        <div data-i18n="Input groups">View Subjects</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Enquiry -->
        <li class="menu-item <?php if(isCurrentPage('view_contact.php') || isCurrentPage('view_newsletter.php')) echo 'active'; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Form Elements">Enquiry</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if(isCurrentPage('view_contact.php')) echo 'active'; ?>">
                    <a href="view_contact.php" class="menu-link">
                        <div data-i18n="Basic Inputs">Contact</div>
                    </a>
                </li>
                <li class="menu-item <?php if(isCurrentPage('view_newsletter.php')) echo 'active'; ?>">
                    <a href="view_newsletter.php" class="menu-link">
                        <div data-i18n="Input groups">Newsletter</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item <?php if(isCurrentPage('view_banner.php') || isCurrentPage('view_newsletter.php')) echo 'active'; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                <div data-i18n="Form Elements">Banner</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if(isCurrentPage('view_banner.php')) echo 'active'; ?>">
                    <a href="view_banner.php" class="menu-link">
                        <div data-i18n="Basic Inputs">View Banner</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>


<nav class="navbar bg-light navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand"><?php echo $_SESSION['username']; ?></a>
        <div class="d-flex">
        <div class="collapse navbar-collapse me-4" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                LIST
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="/IAS/admin/dashboard.php">User</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/IAS/subject/subjectIndex.php">Subject</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/IAS/Course/courseIndex.php">Course</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/IAS/student/studentIndex.php">Student</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/IAS/teacher/teacherIndex.php">Teacher</a>
                </li>
            </ul>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                STUDENT PORTAL
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="/IAS/enrollment/enrollmentIndex.php">Enrollment</a>
                </li>
            </ul>
            </li>
        </ul>
    </div>
    </div>
        
        <a href="/IAS/auth/loginUI.php?logout">logout</a>
    </div>
</nav>
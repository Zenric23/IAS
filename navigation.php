
<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand"><?php echo $_SESSION['username']; ?></a>
        <div>
            <a style="text-decoration: none; margin-left: 20px; color: black; font-weight: 600;" href="/IAS/admin/dashboard.php">USER</a>
            <a style="text-decoration: none; margin-left: 20px; color: black; font-weight: 600;" href="/IAS/subject/subjectIndex.php">SUBJECT</a>
            <a style="text-decoration: none; margin-left: 20px; color: black; font-weight: 600;" href="/IAS/Course/courseIndex.php">COURSE</a>
            <a style="text-decoration: none; margin-left: 20px; color: black; font-weight: 600;" href="/IAS/student/studentIndex.php">STUDENT</a>
            <a style="text-decoration: none; margin-left: 20px; color: black; font-weight: 600;" href="/IAS/teacher/teacherIndex.php">TEACHER</a>
            <a style="text-decoration: none; margin-left: 20px; color: black; font-weight: 600;" href="/IAS/enrollment/enrollmentIndex.php">ENROLLMENT</a>
        </div>
        <a href="/IAS/auth/loginUI.php?logout">logout</a>
    </div>
    </nav>
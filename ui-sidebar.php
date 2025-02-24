<?php

echo '<div class="wrapper">';
echo '<div class="sidebar">';
echo '<h2>School DBMS</h2>';

echo '<small style="color:grey;">';
if ($isStudent == 1) {
    echo 'Student Portal';
} else {
    echo 'Teacher Portal';
}
echo '</small>';

echo '<ul class="nav flex-column">';
echo '<li class="nav-item">';
echo '<a class="nav-link active" href="ui-classroom-v2.php">Classroom</a>';
echo '</li>';
echo '</ul>';
echo '<hr>';
echo '<div class="dropdown">';
echo '<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
echo '<img src="img/avatar-placeholder.jpg" alt="" width="32" height="32" class="rounded-circle me-2">';
echo '<strong>' . $nickname . '</strong>';
echo '</a>';
echo '<ul class="dropdown-menu dropdown-menu-dark text-small shadow">';
echo '<li><a class="dropdown-item" href="ui-devmenu.php">Developer Menu</a></li>';
echo '<li><a class="dropdown-item" href="logout.php">Sign out</a></li>';
echo '</ul>';
echo '</div>';
echo '</div>';
?>
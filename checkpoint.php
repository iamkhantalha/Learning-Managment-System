<?php

session_start();

switch ($_SESSION['userRole']) {
    case '1':
        header('location:admin/admin.php');
        break;
    case '2':
        header('location:student/dashboard.php');
    break;
        case '3':
            header('location:faculty/faculty.php');
    default:
        # code...
        break;
}

?>
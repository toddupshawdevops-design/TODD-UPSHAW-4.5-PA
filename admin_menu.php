<?php
/**
 * Administrator Navigation Page: admin_menu.php
 * Title: "Todd Upshaw Wk 4 Performance Assessment"
 * Page Header: Administrator Options
 */
require_once 'Controllers/UserController.php';
use Controllers\UserController;

UserController::startSession();

// Authorization Check: UserLevel must be 1
if (!isset($_SESSION['userLevel']) || $_SESSION['userLevel'] !== 1) {
    header('Location: index.php');
    exit();
}

$action = filter_input(INPUT_GET, 'action');
if ($action === 'logout') {
    UserController::logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todd Upshaw Wk 4 Performance Assessment</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f7f6; color: #333; }
        .menu-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 400px; margin: auto; }
        h1 { color: #2c3e50; font-size: 24px; margin-bottom: 20px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 15px; }
        a.btn-link { display: block; padding: 10px; background-color: #007bff; color: white; text-align: center; text-decoration: none; border-radius: 4px; }
        a.btn-link:hover { background-color: #0056b3; }
        a.btn-danger { background-color: #dc3545; }
        a.btn-danger:hover { background-color: #c82333; }
    </style>
</head>
<body>

    <div class="menu-box">
        <h1>Administrator Options</h1>
        <ul>
            <li><a class="btn-link" href="view_accounts.php">View Accounts</a></li>
            <li><a class="btn-link btn-danger" href="admin_menu.php?action=logout">Logout</a></li>
        </ul>
    </div>

</body>
</html>
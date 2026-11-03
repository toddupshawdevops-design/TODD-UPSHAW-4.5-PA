<?php
/**
 * View User Accounts Page: view_accounts.php
 * Title: "Todd Upshaw Wk 4 Performance Assessment"
 * Page Header: View User Accounts
 */
require_once 'Models/Database.php';
require_once 'Controllers/User.php';
require_once 'Models/UserDB.php';
require_once 'Controllers/UserController.php';

use Models\UserDB;
use Controllers\UserController;

UserController::startSession();

if (!isset($_SESSION['userLevel']) || $_SESSION['userLevel'] !== 1) {
    header('Location: index.php');
    exit();
}

$action = filter_input(INPUT_GET, 'action');
if ($action === 'logout') {
    UserController::logout();
}

$users = UserDB::getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todd Upshaw Wk 4 Performance Assessment</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f7f6; color: #333; }
        h1 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .nav-links { margin-bottom: 20px; }
        .btn { padding: 8px 16px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; display: inline-block; margin-right: 10px; }
        .btn-danger { background-color: #dc3545; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>

    <h1>View User Accounts</h1>
    <div class="nav-links">
        <a class="btn" href="admin_menu.php">Home</a>
        <a class="btn btn-danger" href="view_accounts.php?action=logout">Logout</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Registration Date</th>
                <th>User Level</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td><?php echo htmlspecialchars($u->getUserId()); ?></td>
                <td><?php echo htmlspecialchars($u->getFullName()); ?></td>
                <td><?php echo htmlspecialchars($u->getEmail()); ?></td>
                <td><?php echo htmlspecialchars($u->getRegistrationDate()); ?></td>
                <td><?php echo htmlspecialchars($u->getUserLevel()); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
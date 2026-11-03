<?php
/**
 * View Products Page: view_products.php
 * Title: "Todd Upshaw Wk 4 Performance Assessment"
 * Page Header: Products
 */
require_once 'Controllers/UserController.php';
use Controllers\UserController;

UserController::startSession();

if (!isset($_SESSION['userLevel']) || $_SESSION['userLevel'] !== 2) {
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
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f7f6; color: #333; }
        h1 { color: #2c3e50; }
        .nav-links { margin-bottom: 20px; }
        .btn { padding: 8px 16px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; display: inline-block; margin-right: 10px; }
        .btn-danger { background-color: #dc3545; }
        .btn:hover { opacity: 0.9; }
        .content-box { background: #fff; padding: 20px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <h1>Products</h1>
    <div class="nav-links">
        <a class="btn" href="user_menu.php">Home</a>
        <a class="btn btn-danger" href="view_products.php?action=logout">Logout</a>
    </div>

    <div class="content-box">
        <p>Welcome to the Products catalog view. Standard users can browse available product listings here.</p>
    </div>

</body>
</html>
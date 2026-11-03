<?php
/**
 * Login Page: index.php
 * Title: "Todd Upshaw Wk 4 Performance Assessment"
 * Page Header: Todd Upshaw Application Login
 */
require_once 'Models/Database.php';
require_once 'Controllers/User.php';
require_once 'Models/UserDB.php';
require_once 'Controllers/UserController.php';

use Models\UserDB;
use Controllers\UserController;

UserController::requireHTTPS();
UserController::startSession();

$error = '';
$email = '';

$action = filter_input(INPUT_POST, 'action');
if ($action === 'login') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    $user = UserDB::authenticate($email, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        $_SESSION['userLevel'] = $user->getUserLevel();

        // Redirect based on UserLevel
        if ($user->getUserLevel() === 1) {
            header('Location: admin_menu.php');
            exit();
        } elseif ($user->getUserLevel() === 2) {
            header('Location: user_menu.php');
            exit();
        } elseif ($user->getUserLevel() === 3) {
            header('Location: tech_menu.php');
            exit();
        }
    } else {
        $error = 'Login credentials were incorrect. Please try again.';
    }
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
        .login-box { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 350px; margin: auto; }
        h1 { color: #2c3e50; font-size: 22px; text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-weight: bold; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; }
        .btn:hover { background-color: #0056b3; }
        .error { color: #d9534f; font-size: 14px; text-align: center; margin-bottom: 15px; font-weight: bold; }
    </style>
</head>
<body>

    <div class="login-box">
        <h1>Todd Upshaw Application Login</h1>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="login">
            
            <div class="form-group">
                <label>User ID (E-Mail):</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</body>
</html>
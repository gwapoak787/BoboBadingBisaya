<?php
// Login page
include 'includes/config.php';
include 'includes/auth.php';

$message = '';

// Handle login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $result = loginUser($username, $password, $conn);
    if ($result['success']) {
        header('Location: index.php');
        exit;
    } else {
        $message = $result['message'];
    }
}

// Check for registration message
if (isset($_GET['msg']) && $_GET['msg'] === 'registered') {
    $message = 'Registration successful! Please login.';
}

// If already logged in, redirect
if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Scholarship Finder</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --bg:#f5f7fa;
            --card:#ffffff;
            --accent:#3b82f6;
            --error:#dc2626;
            --muted:#6b7280;
            --shadow:rgba(2,6,23,0.08);
            --welcome-bg:#efe6ff;
            --content-width:560px; 
            --content-min-height:520px; 
        }
        *{box-sizing:border-box}
        html,body{height:100%}
        body{
            margin:0;
            font-family:'Poppins',system-ui,-apple-system,Segoe UI,Roboto,Arial;
            background:var(--bg);
            color:#0f172a;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:24px 10px;
            font-size:18px;
            position:relative;
        }


        .container{
            position:relative;
            z-index:1;
            display:flex;
            gap:10px;
            align-items:stretch;
            justify-content:center;
            width:100%;
            max-width:1200px;
            padding:6px;
        }

        .left,
        .auth-container{
            flex:0 0 var(--content-width);
            max-width:var(--content-width);
            min-height:var(--content-min-height);
            display:flex;
            flex-direction:column;
        }

        .left{
            justify-content:center;
            padding:32px;
            border-radius:12px;
            background:var(--welcome-bg);
            border:1px solid rgba(124,58,237,0.06);
            box-shadow:0 6px 18px rgba(139,101,204,0.04);
        }

        .left h2{margin:0 0 12px;font-size:3rem;color:#4c1d95;}
        .left p{margin:0;color:var(--muted);font-size:1.55rem;line-height:1.6;}

        .auth-container{width:100%;}
        .auth-box{
            background:var(--card);
            border-radius:12px;
            box-shadow:0 16px 48px var(--shadow);
            padding:36px;
            display:flex;
            flex-direction:column;
            gap:20px;
            border:1px solid rgba(15,23,42,0.04);
            height:100%;
            justify-content:center;
        }

        .brand{display:flex;align-items:center;gap:14px}
        .logo{
            width:60px;height:60px;border-radius:12px;
            display:flex;align-items:center;justify-content:center;
            font-weight:700;font-size:1.05rem;overflow:hidden;
            padding:0;
        }

        .logo img{
            width:100%;height:100%;object-fit:cover;border-radius:12px;
        }

        h1{margin:0;font-size:1.5rem;font-weight:700}
        .subtitle{font-size:1rem;color:var(--muted);margin-top:4px}

        .message{
            padding:12px 14px;border-radius:10px;font-size:1rem;
        }
        .message.success{
            background:rgba(59,130,246,0.06);
            color:var(--accent);
        }
        .message.error{
            background:rgba(220,38,38,0.06);
            color:var(--error);
        }

        .form-group{display:flex;flex-direction:column;gap:10px}
        label{font-size:1rem;color:var(--muted);font-weight:600}
        label.highlight{color:var(--accent);font-weight:700}

        input[type="text"],input[type="password"]{
            padding:14px 16px;border-radius:12px;
            border:1px solid rgba(15,23,42,0.08);
            font-size:1rem;outline:none;transition:.15s;
            height:52px;
        }

        input:focus{
            border-color:var(--accent);
            box-shadow:0 10px 24px rgba(59,130,246,0.08);
            transform:translateY(-1px)
        }

        .forgot-wrap{margin-top:8px}
        .forgot{font-size:0.9rem;color:var(--muted);text-decoration:none;font-weight:600}
        .forgot:hover{color:var(--accent);text-decoration:underline}

        .actions{display:flex;justify-content:center;gap:12px;margin-top:10px}
        .btn{
            display:inline-flex;align-items:center;justify-content:center;
            background:var(--accent);color:#fff;border:none;
            padding:14px 20px;border-radius:12px;font-weight:700;
            min-width:220px;cursor:pointer;
            box-shadow:0 12px 36px rgba(59,130,246,0.14);
        }
        .btn:hover{transform:translateY(-2px)}

        .auth-link{font-size:1rem;color:var(--muted);text-align:center;margin-top:8px}
        .auth-link a{color:var(--accent);font-weight:700;text-decoration:none}
        .auth-link a:hover{text-decoration:underline}

        @media (max-width:1024px){
            .container{max-width:920px}
            .left{max-width:480px;padding:28px}
            .auth-container{max-width:520px}
        }

        @media (max-width:760px){
            .container{flex-direction:column;gap:18px;padding:12px}
            .left{max-width:none;padding:20px;border-radius:10px}
            body{font-size:17px}
        }

        @media (max-width:480px){
            .auth-box{padding:20px}
            body{font-size:16px}
            .logo{width:52px;height:52px}
            .btn{min-width:200px}
            input[type="text"],input[type="password"]{height:48px}
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left" aria-hidden="true">
            <h2>Welcome To Scholarship Finder!</h2>
            <p>Sign in to access your account and track scholarship opportunities tailored to you.</p>
        </div>

        <div class="auth-container">
            <div class="auth-box" role="region" aria-label="Login form">
                <div class="brand">
                    <div class="logo">
                        <img src="logo2.png" alt="Scholarship Finder logo">
                    </div>
                    <div>
                        <h1>Scholarship Finder</h1>
                        <div class="subtitle">Sign in to your account</div>
                    </div>
                </div>

                <?php if (!empty($message)): ?>
                    <div class="message <?php echo strpos($message, 'successful') !== false ? 'success' : 'error'; ?>">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" novalidate>
                    <div class="form-group">
                        <label for="username" class="highlight">Username</label>
                        <input type="text" id="username" name="username" required autofocus autocomplete="username">
                    </div>

                    <div class="form-group">
                        <label for="password" class="highlight">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="current-password">
                    </div>

                    <div class="forgot-wrap">
                        <a class="forgot" href="forgotpassword.php">Forgot password?</a>
                    </div>

                    <div class="actions">
                        <button type="submit" class="btn">Login</button>
                    </div>
                </form>

                <p class="auth-link">Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
</body>
</html>
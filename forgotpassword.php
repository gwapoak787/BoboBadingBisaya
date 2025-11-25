
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Forgot Password</title>

<style>
    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background: #f5f7fa;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        transition: 0.3s;
    }

    .auth-box {
        width: 350px;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        text-align: center;
    }

    h1 { margin-bottom: 10px; color: #0f172a; }

    p { color: #666; font-size: 14px; margin-bottom: 20px; }

    input {
        width: 100%;
        padding: 10px;
        border-radius: 7px;
        border: 1px solid #d1d5db;
        margin-bottom: 15px;
        background: #fff;
        color: #111827;
        font-size: 14px;
    }

    .btn {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: none;
        background: #3b82f6;
        color: white;
        font-size: 16px;
        cursor: pointer;
        font-weight: 600;
    }

    .auth-link a { color: #3b82f6; text-decoration: none; }
    .auth-link { margin-top: 15px; color: #6b7280; }

    input:focus {
        border-color: #3b82f6;
        outline: none;
        box-shadow: 0 0 0 4px rgba(59,130,246,0.06);
    }
</style>

</head>
<body>

<div class="auth-box" role="region" aria-label="Forgot password">
    <h1>Forgot Password</h1>
    <p>Enter your email address and we'll send you a reset link.</p>

    <form method="POST" action="#">
        <input type="email" name="email" placeholder="Your Email" required>
        <button class="btn">Send Reset Link</button>
    </form>

    <p class="auth-link"><a href="login.php">Back to Login</a></p>
</div>

</body>
</html>
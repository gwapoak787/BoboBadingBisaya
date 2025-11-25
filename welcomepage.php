<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'includes/config.php';
include 'includes/auth.php';

// Redirect if not logged in
if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

// Mark welcome page as seen
$_SESSION['seen_welcome'] = true;
?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <meta http-equiv="refresh" content="10;url=index.php" />
    <title>Welcome - Scholarship Finder</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root{
            --bg: #ffffff;
            --muted: #6b7280;
            --accent: #7c3aed;
            --nav-bg: #faf9ff;
            --nav-border: rgba(124,58,237,0.08);
        }
        *{box-sizing:border-box}
        body{
            margin:0;
            font-family:"Poppins",system-ui,-apple-system,Segoe UI,Roboto,Arial;
            background:var(--bg);
            color:#0f172a;
            font-size:18px;
            position:relative;
        }

        .page-wrap { position: relative; z-index: 1; }

        .cta {
            padding:8px 12px;
            background:var(--accent);
            color:#fff;
            border-radius:8px;
            text-decoration:none;
            font-weight:700;
            font-size:0.95rem;
            box-shadow:0 8px 20px rgba(124,58,237,0.08);
        }
    </style>
</head>

<body>
<div class="page-wrap">

    <main style="max-width:1100px; margin:28px auto; padding:20px;">
        <section style="display:flex;gap:28px;align-items:center;flex-wrap:wrap;">
            <div style="flex:1;min-width:320px">
                <h1 style="margin:0 0 12px;color:#4c1d95;font-size:2rem;">Welcome to Scholarship Finder</h1>
                <p style="margin:0 0 18px;color:#374151;font-size:1.05rem;line-height:1.6;">
                    Scholarship Finder helps you discover, track, and apply to scholarships tailored to your profile.
                    Save searches, get personalized recommendations, and manage applications in one place.
                </p>
                <ul style="margin:0 0 20px;padding-left:20px;color:#374151;line-height:1.6">
                    <li>Personalized scholarship matches</li>
                    <li>Save and track opportunities</li>
                    <li>One-click application starter</li>
                </ul>
                <a href="index.php" class="cta">Get started</a>
            </div>

            <div style="flex:0 0 360px;min-width:240px;background:#faf9ff;padding:18px;border-radius:12px;border:1px solid rgba(124,58,237,0.06);">
                <h3 style="margin:0 0 8px;color:#7c3aed">How it works</h3>
                <ol style="margin:0;padding-left:18px;color:#374151;line-height:1.6">
                    <li>Create a profile and set preferences</li>
                    <li>Search for scholarships</li>
                    <li>Navigate the dashboard</li>
                    <li>View the scholarship requirements</li>
                </ol>
            </div>
        </section>
    </main>

</div>
</body>
</html>

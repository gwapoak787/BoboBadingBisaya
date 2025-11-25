<?php
// Main dashboard page
include 'includes/config.php';
include 'includes/auth.php';

// Redirect if not logged in
if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Finder</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <div class="brand-section">
                    <div class="logo-title">
                        <img src="logo2.png" alt="Scholarship Finder Logo" class="logo">
                        <h1>Scholarship Finder</h1>
                    </div>
                    <p class="tagline">Discover Your Path to Educational Excellence</p>
                </div>
                <div class="user-info">
                    <span>Welcome, <?php echo htmlspecialchars($username); ?></span>
                    <a href="logout.php" class="btn-logout">Logout</a>
                </div>
            </div>
        </header>

        <nav class="nav">
            <button class="nav-btn active" data-section="scholarships"><span class="nav-icon">📚</span> Scholarships</button>
            <button class="nav-btn" data-section="bookmarks"><span class="nav-icon">🔖</span> My Bookmarks</button>
            <button class="nav-btn" data-section="about"><span class="nav-icon">ℹ️</span> About</button>
        </nav>

        <section class="search-section">
            <h2>Find Scholarships</h2>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search by title or provider...">

                <select id="levelFilter">
                    <option value="">All Levels</option>
                </select>

                <select id="fieldFilter">
                    <option value="">All Fields</option>
                </select>

                <input type="date" id="deadlineFilter" placeholder="Deadline">

                <div class="sort-buttons">
                    <button id="sortDeadline" class="sort-btn">Sort by Deadline</button>
                    <button id="sortAmount" class="sort-btn">Sort by Amount</button>
                </div>

                <button id="resetBtn" class="btn-reset">Reset</button>
            </div>
        </section>

        <div class="section-separator"></div>

        <main class="main-content">
            <section id="scholarships" class="content-section active">
                <h2>Available Scholarships</h2>
                <div id="scholarshipsList" class="scholarships-grid">
                    <!-- Loaded dynamically -->
                </div>
            </section>

            <section id="bookmarks" class="content-section">
                <h2>My Bookmarked Scholarships</h2>
                <div id="bookmarksList" class="scholarships-grid">
                    <!-- Loaded dynamically -->
                </div>
            </section>

            <section id="about" class="content-section">
                <h2>About Scholarship Finder</h2>

                <div class="about-content">
                    <div class="about-section">
                        <h3 data-icon="🎯">Our Mission</h3>
                        <p>Sika man ag panunot maikabil</p>
                    </div>

                    <div class="about-section features-section">
                        <h3 data-icon="⚙️">What We Do</h3>
                        <div class="features-list">
                            <div class="feature-item">
                                <h4 data-icon="🔍">Scholarship Discovery</h4>
                                <p>Find relevant scholarships through our comprehensive database and personalized search tools.</p>
                            </div>
                            <div class="feature-item">
                                <h4 data-icon="📝">Easy Application</h4>
                                <p>Streamlined application process with bookmarking features to keep track of your favorites.</p>
                            </div>
                            <div class="feature-item">
                                <h4 data-icon="🔔">Real-time Updates</h4>
                                <p>Stay informed with the latest scholarship opportunities and deadline notifications.</p>
                            </div>
                        </div>
                    </div>

                    <div class="about-section">
                        <h3 data-icon="📞">Contact Information</h3>
                        <p><strong>Email:</strong> GordonKenlly@gmail.edu</p>
                        <p><strong>Phone:</strong> 0912-423-9231</p>
                        <p><strong>Address:</strong> Qatar, Max Multiverse</p>
                    </div>

                    <div class="about-section team-section">
                        <h3 data-icon="👥">Our Team</h3>
                        <div class="team-members">
                            <div class="team-member">
                                <h4>Alcaraz, Veinson</h4>
                                <p>Leader</p>
                            </div>
                            <div class="team-member">
                                <h4>Banasen, Rogelio</h4>
                                <p>Backend</p>
                            </div>
                            <div class="team-member">
                                <h4>Bandaw, Kenlly</h4>
                                <p>Frontend</p>
                            </div>
                            <div class="team-member">
                                <h4>Bantowag, Jim Frans</h4>
                                <p>Frontend</p>
                            </div>
                            <div class="team-member">
                                <h4>Gadit, Kenneth</h4>
                                <p>Frontend</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalBody">
                <!-- Loaded dynamically -->
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
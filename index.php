<?php
require_once 'config.php';

$page = getActivePage();
$manager = new InterventionManager();
$stats = $manager->getStatistics();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getPageTitle($page === 'accueil' ? '' : ucfirst($page)); ?></title>
    <meta name="description" content="<?php echo SITE_DESC; ?>">
    <meta property="og:title" content="<?php echo SITE_NAME; ?> - <?php echo SITE_DESC; ?>">
    <meta property="og:description" content="Organisation internationale de coordination des réponses aux crises humanitaires">
    <meta name="theme-color" content="#1e40af">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8fafc;
        }

        header {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.8rem;
            font-weight: 700;
            text-decoration: none;
            color: white;
        }

        .logo-icon {
            font-size: 2.5rem;
        }

        nav {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        nav a:hover,
        nav a.active {
            background: rgba(255, 255, 255, 0.2);
        }

        .status-indicator {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(16, 185, 129, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .hero-section {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
            background-image: url('https://i.imgur.com/iCkMP03.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 6rem 2rem;
            border-radius: 16px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(30, 58, 138, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 900;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            display: block;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            opacity: 0.9;
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            margin: 0.5rem;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: white;
            color: #1e40af;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #1e40af;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 2rem;
            text-align: center;
        }

        .interventions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .intervention-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .intervention-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -4px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            padding: 1.5rem;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .card-location {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 1rem;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-critique {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-majeure {
            background: #fef3c7;
            color: #92400e;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-description {
            color: #64748b;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .card-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .meta-item {
            font-size: 0.9rem;
            color: #475569;
        }

        .meta-label {
            font-weight: 600;
            color: #1e293b;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 1rem;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            transition: width 0.3s ease;
        }

        .search-box {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .search-box input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
        }

        .search-box input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            background: white;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #1e40af;
            color: white;
            border-color: #1e40af;
        }

        footer {
            background: #1e293b;
            color: white;
            padding: 2rem;
            margin-top: 4rem;
            text-align: center;
        }

        .about-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: start;
        }

        .about-text h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #1e293b;
        }

        .about-text p {
            margin-bottom: 1rem;
            color: #64748b;
            line-height: 1.8;
        }

        .mission-points {
            list-style: none;
            margin-top: 1.5rem;
        }

        .mission-points li {
            padding: 0.75rem 0;
            color: #475569;
            border-bottom: 1px solid #e2e8f0;
        }

        .mission-points li:before {
            content: '✓ ';
            color: #10b981;
            font-weight: bold;
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            nav {
                flex-direction: column;
                width: 100%;
                gap: 0.5rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .about-section {
                grid-template-columns: 1fr;
            }

            .interventions-grid {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <a href="?page=accueil" class="logo">
                <div class="logo-icon">🌍</div>
                <span><?php echo SITE_NAME; ?></span>
            </a>
            
            <nav>
                <a href="?page=accueil" class="<?php echo isActivePage('accueil'); ?>">Accueil</a>
                <a href="?page=interventions" class="<?php echo isActivePage('interventions'); ?>">Interventions</a>
                <a href="?page=about" class="<?php echo isActivePage('about'); ?>">À Propos</a>
                <a href="?page=contact" class="<?php echo isActivePage('contact'); ?>">Contact</a>
            </nav>

            <div class="status-indicator">
                <div class="status-dot"></div>
                Opérationnel
            </div>
        </div>
    </header>

    <main>
        <?php if ($page === 'accueil' || $page === ''): ?>
            <!-- HERO SECTION -->
            <section class="hero-section">
                <div class="hero-content">
                    <h1 class="hero-title">Coordination Internationale<br>des Crises Majeures</h1>
                    <p class="hero-subtitle">AURORA coordonne les réponses aux crises à l'échelle mondiale, 
                        facilitant la coopération internationale pour une intervention rapide et efficace.</p>
                    
                    <div>
                        <a href="?page=interventions" class="btn btn-primary">🚀 Nos Interventions</a>
                        <a href="?page=about" class="btn btn-secondary">📋 Découvrir l'Agence</a>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <span class="stat-number">156</span>
                            <span class="stat-label">Pays partenaires</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number"><?php echo $stats['total']; ?></span>
                            <span class="stat-label">Interventions actives</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Centre opérationnel</span>
                        </div>
                        <div class="stat-card">
                            <span class="stat-number"><?php echo $stats['totalTeams']; ?></span>
                            <span class="stat-label">Équipes déployées</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- MISSION SECTION -->
            <div class="container">
                <h2 class="section-title">Notre Mission</h2>
                <p style="text-align: center; color: #64748b; margin-bottom: 2rem;">
                    AURORA est une organisation internationale dédiée à la coordination des réponses aux crises humanitaires 
                    et aux catastrophes naturelles. Nous travaillons avec 156+ partenaires pour une intervention rapide et efficace.
                </p>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                    <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
                        <h3 style="color: #1e293b; margin-bottom: 0.75rem;">🚨 Coordination Rapide</h3>
                        <p style="color: #64748b;">Orchestration immédiate des réponses d'urgence avec nos partenaires internationaux.</p>
                    </div>
                    <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
                        <h3 style="color: #1e293b; margin-bottom: 0.75rem;">🌍 Réseau Global</h3>
                        <p style="color: #64748b;">Réseau mondial de 156+ organisations partenaires pour une couverture complète.</p>
                    </div>
                    <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
                        <h3 style="color: #1e293b; margin-bottom: 0.75rem;">⚡ Action Immédiate</h3>
                        <p style="color: #64748b;">Déploiement rapide de ressources spécialisées dans les zones de crise.</p>
                    </div>
                </div>
            </div>

        <?php elseif ($page === 'interventions'): ?>
            <div class="container">
                <h2 class="section-title">Interventions en cours</h2>
                
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Rechercher une intervention...">
                </div>

                <div class="filter-buttons">
                    <button class="filter-btn active" onclick="filterInterventions('all')">Toutes</button>
                    <button class="filter-btn" onclick="filterInterventions('critique')">Critiques</button>
                    <button class="filter-btn" onclick="filterInterventions('majeure')">Majeures</button>
                </div>

                <div class="interventions-grid" id="interventionsGrid">
                    <?php foreach ($manager->getAll() as $intervention): ?>
                    <div class="intervention-card" data-status="<?php echo $intervention['status']; ?>" data-title="<?php echo strtolower($intervention['title']); ?>">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo htmlspecialchars($intervention['title']); ?></h3>
                            <p class="card-location">📍 <?php echo htmlspecialchars($intervention['location']); ?></p>
                            <span class="status-badge status-<?php echo $intervention['status']; ?>">
                                <?php echo strtoupper($intervention['status']); ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="card-description"><?php echo htmlspecialchars($intervention['description']); ?></p>
                            
                            <div class="card-meta">
                                <div class="meta-item">
                                    <div class="meta-label">Décès estimés</div>
                                    <?php echo htmlspecialchars($intervention['casualties']); ?>
                                </div>
                                <div class="meta-item">
                                    <div class="meta-label">Équipes</div>
                                    <?php echo $intervention['teams']; ?> agents
                                </div>
                            </div>

                            <div class="meta-item">
                                <div class="meta-label">Coordinateur</div>
                                <?php echo htmlspecialchars($intervention['coordinator']); ?>
                            </div>

                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?php echo $intervention['progress']; ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        <?php elseif ($page === 'about'): ?>
            <div class="container">
                <h2 class="section-title">À Propos d'AURORA</h2>
                
                <div class="about-section">
                    <div class="about-text">
                        <h3>Qui sommes-nous ?</h3>
                        <p>
                            AURORA est une organisation internationale fondée en 2018 pour coordonner les réponses 
                            aux crises humanitaires et catastrophes naturelles à l'échelle mondiale.
                        </p>
                        <p>
                            Nous opérons un centre de coordination 24/7 qui gère l'allocation des ressources, 
                            la communication inter-agences et le déploiement d'équipes spécialisées.
                        </p>
                        <h3 style="margin-top: 2rem;">Nos Valeurs</h3>
                        <ul class="mission-points">
                            <li>Excellence opérationnelle dans la gestion de crise</li>
                            <li>Solidarité internationale et coopération</li>
                            <li>Transparence et responsabilité</li>
                            <li>Innovation dans les solutions d'urgence</li>
                            <li>Respect des droits humains</li>
                        </ul>
                    </div>

                    <div style="background: #f8fafc; padding: 2rem; border-radius: 12px;">
                        <h3>Statistiques Clés</h3>
                        <div style="margin-top: 1.5rem;">
                            <p style="margin-bottom: 1rem;"><strong>Année de fondation:</strong> 2018</p>
                            <p style="margin-bottom: 1rem;"><strong>Pays partenaires:</strong> 156</p>
                            <p style="margin-bottom: 1rem;"><strong>Organisations partenaires:</strong> 127+</p>
                            <p style="margin-bottom: 1rem;"><strong>Interventions complétées:</strong> 2,847</p>
                            <p style="margin-bottom: 1rem;"><strong>Personnel:</strong> 5,000+ agents</p>
                            <p style="margin-bottom: 1rem;"><strong>Budget annuel:</strong> $500M+</p>
                            <p><strong>Opérations:</strong> 24/7 en permanence</p>
                        </div>

                        <h3 style="margin-top: 2rem;">Siège Social</h3>
                        <p style="color: #64748b; margin-top: 1rem;">
                            15 Avenue Montaigne<br>
                            75008 Paris, France<br>
                            <br>
                            <strong>Téléphone:</strong> +33 1 42 75 77 77<br>
                            <strong>Email:</strong> ops@aurora-crisis.org
                        </p>
                    </div>
                </div>
            </div>

        <?php elseif ($page === 'contact'): ?>
            <div class="container">
                <h2 class="section-title">Nous Contacter</h2>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-top: 2rem;">
                    <div>
                        <h3 style="color: #1e293b; margin-bottom: 1rem;">Opérations d'Urgence</h3>
                        <p style="color: #64748b; margin-bottom: 1rem;">
                            Pour les situations d'urgence critiques, contactez notre centre opérationnel 24/7:
                        </p>
                        <p style="font-size: 1.3rem; font-weight: 700; color: #dc2626; margin-bottom: 2rem;">
                            +33 1 42 75 77 77
                        </p>

                        <h3 style="color: #1e293b; margin-bottom: 1rem; margin-top: 2rem;">Email de Coordination</h3>
                        <p style="color: #3b82f6; text-decoration: underline;">
                            ops@aurora-crisis.org
                        </p>
                    </div>

                    <div style="background: #f8fafc; padding: 2rem; border-radius: 12px;">
                        <h3 style="color: #1e293b; margin-bottom: 1rem;">Adresse du Siège</h3>
                        <p style="color: #64748b; line-height: 1.8;">
                            AURORA - Centre de Coordination<br>
                            15 Avenue Montaigne<br>
                            75008 Paris<br>
                            France<br>
                            <br>
                            <strong style="color: #1e293b;">Heures d'ouverture:</strong><br>
                            Lun-Ven: 08:00-18:00<br>
                            24/7 pour les urgences
                        </p>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2026 AURORA - Tous droits réservés</p>
        <p style="font-size: 0.9rem; margin-top: 0.5rem; opacity: 0.8;">
            Organisation internationale de coordination des crises humanitaires
        </p>
    </footer>

    <script>
        function filterInterventions(status) {
            const cards = document.querySelectorAll('.intervention-card');
            const buttons = document.querySelectorAll('.filter-btn');
            
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            cards.forEach(card => {
                if (status === 'all' || card.dataset.status === status) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        document.getElementById('searchInput')?.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.intervention-card');
            
            cards.forEach(card => {
                const title = card.dataset.title;
                if (title.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>

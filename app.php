<?php
require_once __DIR__ . '/functions.php';

$page = getActivePage();
$manager = new InterventionManager();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURORA - Coordination Internationale des Crises</title>
    <meta name="description" content="Plateforme officielle de coordination des interventions d'urgence">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='75' font-size='75'>🌍</text></svg>">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        /* Subtle animations */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .slide-up {
            opacity: 0;
            animation: slideUp 0.8s ease-out 0.2s forwards;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Subtle hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }
        
        /* Professional button style */
        .btn-professional {
            background: #2563eb;
            border: none;
            border-radius: 6px;
            color: white;
            padding: 12px 24px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            font-size: 0.95rem;
        }
        
        .btn-professional:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
            color: white;
        }
        
        .btn-secondary {
            background: transparent;
            border: 2px solid #64748b;
            color: #64748b;
        }
        
        .btn-secondary:hover {
            background: #64748b;
            color: white;
            transform: translateY(-1px);
        }
        
        /* Clean card design */
        .card-clean {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .card-clean:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        /* Header styles */
        .header-clean {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
        }
        
        .header-content-clean {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
        }
        
        .logo-clean {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: #2563eb;
            text-decoration: none;
        }
        
        .nav-clean {
            display: flex;
            gap: 2rem;
        }
        
        .nav-clean a {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        
        .nav-clean a:hover,
        .nav-clean a.active {
            color: #2563eb;
        }
        
        .status-indicator-clean {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #f0fdf4;
            color: #16a34a;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid #bbf7d0;
        }
        
        /* Container styles */
        .container-clean {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .section-clean {
            padding: 4rem 0;
        }
        
        .section-title-clean {
            font-size: 2.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .section-subtitle-clean {
            font-size: 1.125rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Status badges */
        .status-badge-clean {
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .status-critical { background: #fef2f2; color: #dc2626; }
        .status-urgent { background: #fefbeb; color: #f59e0b; }
        .status-moderate { background: #f0f9ff; color: #2563eb; }
        .status-stable { background: #f0fdf4; color: #16a34a; }
        
        /* Section separators */
        .section-separator {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #2563eb, #3b82f6, #2563eb);
            margin: 2rem auto;
            border-radius: 1.5px;
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0.7;
        }
        
        .section-separator-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 2rem 0;
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0.5;
        }
        
        .section-separator-dots::before,
        .section-separator-dots::after {
            content: '•';
            color: #cbd5e1;
            font-size: 8px;
        }
        
        .section-separator-line {
            width: 80px;
            height: 2px;
            background: #2563eb;
            margin: 2rem auto;
            border-radius: 1px;
        }
        
        .divider-ornament {
            text-align: center;
            margin: 60px 0;
            position: relative;
            background: white;
        }
        
        .divider-ornament span {
            display: inline-block;
            background: white;
            color: #2563eb;
            font-size: 20px;
            padding: 15px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 50%;
            position: relative;
            z-index: 2;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .divider-ornament::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, #cbd5e1, #e2e8f0, transparent);
            z-index: 1;
        }
        
        /* Add spacing to sections with separators */
        .section-clean {
            overflow: hidden;
            position: relative;
        }
        
        /* Ensure proper spacing between sections */
        .section-separator + .section-separator-dots {
            margin-top: -30px;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .header-content-clean {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-clean {
                gap: 1rem;
            }
            
            .section-title-clean {
                font-size: 1.875rem;
            }
            
            .status-indicator-clean {
                order: -1;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <?php
            switch ($page) {
                case 'interventions':
                    include 'pages/interventions.php';
                    break;
                case 'about':
                    include 'pages/about.php';
                    break;
                case 'contact':
                    include 'pages/contact.php';
                    break;
                case 'carte-interactive':
                    include 'pages/carte-interactive.php';
                    break;
                default:
                    include 'pages/accueil.php';
            }
        ?>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script>
        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in, .slide-up').forEach(el => {
            el.style.animationPlayState = 'paused';
            observer.observe(el);
        });
    </script>
</body>
</html>

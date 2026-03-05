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
            <a href="?page=demo" class="<?php echo isActivePage('demo'); ?>">Démos</a>
        </nav>

        <div class="status-indicator">
            <div class="status-dot"></div>
            Opérationnel
        </div>
    </div>
</header>

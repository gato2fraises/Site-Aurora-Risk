<header class="header-clean">
    <div class="header-content-clean">
        <a href="?page=accueil" class="logo-clean">
            <div>🌍</div>
            <span><?php echo SITE_NAME; ?></span>
        </a>
        
        <nav class="nav-clean">
            <a href="?page=accueil" class="<?php echo isActivePage('accueil'); ?>">Accueil</a>
            <a href="?page=interventions" class="<?php echo isActivePage('interventions'); ?>">Interventions</a>
            <a href="?page=about" class="<?php echo isActivePage('about'); ?>">À Propos</a>
            <a href="?page=contact" class="<?php echo isActivePage('contact'); ?>">Contact</a>
            <a href="?page=carte-interactive" class="<?php echo isActivePage('carte-interactive'); ?>">Carte</a>
        </nav>

        <div class="status-indicator-clean">
            <div style="width: 8px; height: 8px; background: #16a34a; border-radius: 50%;"></div>
            Opérationnel
        </div>
    </div>
</header>

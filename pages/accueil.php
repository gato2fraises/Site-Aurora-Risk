<?php
$stats = $manager->getStatistics();
?>

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

<div class="container">
    <h2 class="section-title">Notre Mission</h2>
    <p class="section-subtitle">
        AURORA est une organisation internationale dédiée à la coordination des réponses aux crises humanitaires 
        et aux catastrophes naturelles. Nous travaillons avec 156+ partenaires pour une intervention rapide et efficace.
    </p>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
        <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
            <h3 style="color: #1e293b; margin-bottom: 0.75rem;">🚨 Coordination Rapide</h3>
            <p style="color: #64748b;">Orchestration immédiate des réponses d'urgence avec nos partenaires internationaux pour une intervention efficace et coordonnée.</p>
        </div>
        <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
            <h3 style="color: #1e293b; margin-bottom: 0.75rem;">🌍 Réseau Global</h3>
            <p style="color: #64748b;">Réseau mondial de 156+ organisations partenaires pour une couverture complète des situations de crise internationale.</p>
        </div>
        <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
            <h3 style="color: #1e293b; margin-bottom: 0.75rem;">⚡ Action Immédiate</h3>
            <p style="color: #64748b;">Déploiement rapide de ressources et expertise spécialisée dans les zones de crise pour minimiser l'impact humanitaire.</p>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="section-title">Services Offerts</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
        <div style="padding: 2rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
            <h3 style="color: #1e293b; margin-bottom: 1rem;">🎯 Coordination d'Urgence</h3>
            <p style="color: #64748b; margin-bottom: 1rem;">Coordination immédiate des réponses aux crises humanitaires et catastrophes naturelles.</p>
            <ul style="list-style: none; color: #64748b;">
                <li style="margin-bottom: 0.5rem;">✓ Centre de commandement 24/7</li>
                <li style="margin-bottom: 0.5rem;">✓ Déploiement rapide d'équipes</li>
                <li style="margin-bottom: 0.5rem;">✓ Communication multi-agences</li>
            </ul>
        </div>
        <div style="padding: 2rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
            <h3 style="color: #1e293b; margin-bottom: 1rem;">🚚 Logistique Internationale</h3>
            <p style="color: #64748b; margin-bottom: 1rem;">Gestion logistique complète des opérations d'assistance humanitaire.</p>
            <ul style="list-style: none; color: #64748b;">
                <li style="margin-bottom: 0.5rem;">✓ Transport aérien et maritime</li>
                <li style="margin-bottom: 0.5rem;">✓ Distribution de matériel</li>
                <li style="margin-bottom: 0.5rem;">✓ Stockage sécurisé</li>
            </ul>
        </div>
        <div style="padding: 2rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
            <h3 style="color: #1e293b; margin-bottom: 1rem;">📚 Formation & Préparation</h3>
            <p style="color: #64748b; margin-bottom: 1rem;">Formation spécialisée pour les intervenants en situation de crise.</p>
            <ul style="list-style: none; color: #64748b;">
                <li style="margin-bottom: 0.5rem;">✓ Simulations de crise</li>
                <li style="margin-bottom: 0.5rem;">✓ Certification internationale</li>
                <li style="margin-bottom: 0.5rem;">✓ Protocoles standardisés</li>
            </ul>
        </div>
    </div>
</div>

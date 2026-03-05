<?php
$stats = $manager->getStatistics();
?>

<!-- Hero Section -->
<section style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); color: white; padding: 5rem 0; text-align: center; position: relative;">
    <div class="container-clean">
        <h1 class="fade-in" style="font-size: 3.5rem; font-weight: 700; margin-bottom: 1.5rem; line-height: 1.1;">
            Coordination Internationale<br>des Crises Majeures
        </h1>
        <p class="slide-up" style="font-size: 1.25rem; margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto; opacity: 0.9; line-height: 1.6;">
            AURORA coordonne les réponses aux crises à l'échelle mondiale, 
            facilitant la coopération internationale pour une intervention rapide et efficace.
        </p>
        
        <div style="display: flex; gap: 1rem; justify-content: center; margin-bottom: 4rem; flex-wrap: wrap;" class="fade-in">
            <a href="?page=interventions" class="btn-professional">🚀 Nos Interventions</a>
            <a href="?page=about" class="btn-professional btn-secondary">📋 Découvrir l'Agence</a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 3rem;" class="fade-in">
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: #3b82f6;">156</div>
                <div style="opacity: 0.8;">Pays partenaires</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: #3b82f6;"><?php echo $stats['total']; ?></div>
                <div style="opacity: 0.8;">Interventions actives</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: #3b82f6;">24/7</div>
                <div style="opacity: 0.8;">Centre opérationnel</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 700; color: #3b82f6;"><?php echo $stats['totalTeams']; ?></div>
                <div style="opacity: 0.8;">Équipes déployées</div>
            </div>
        </div>
    </div>
</section>

<!-- Section Separator -->
<div class="divider-ornament">
    <span>◇</span>
</div>

<!-- Mission Section -->
<div class="section-clean" style="background: #f8fafc; position: relative;">
    <div class="section-separator"></div>
    <div class="section-separator-dots"></div>
    <div class="container-clean">
        <h2 class="section-title-clean fade-in">Notre Mission</h2>
        <p class="section-subtitle-clean fade-in">
            AURORA est une organisation internationale dédiée à la coordination des réponses aux crises humanitaires 
            et aux catastrophes naturelles. Nous travaillons avec 156+ partenaires pour une intervention rapide et efficace.
        </p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="card-clean card-hover fade-in">
                <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem;">
                    Coordination Rapide
                </h3>
                <p style="color: #64748b; line-height: 1.6;">
                    Orchestration immédiate des réponses d'urgence avec nos partenaires 
                    internationaux pour une intervention efficace et coordonnée.
                </p>
            </div>
            
            <div class="card-clean card-hover fade-in" style="animation-delay: 0.1s;">
                <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem;">
                    Réseau Global
                </h3>
                <p style="color: #64748b; line-height: 1.6;">
                    Réseau mondial de 156+ organisations partenaires pour une couverture 
                    complète des situations de crise internationale.
                </p>
            </div>
            
            <div class="card-clean card-hover fade-in" style="animation-delay: 0.2s;">
                <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem;">
                    Action Immédiate
                </h3>
                <p style="color: #64748b; line-height: 1.6;">
                    Déploiement rapide de ressources et expertise spécialisée dans les zones 
                    de crise pour minimiser l'impact humanitaire.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Section divider -->
    <div class="section-separator-line"></div>
</div>

<!-- Section Separator -->
<div class="divider-ornament">
    <span>⋆</span>
</div>

<!-- Services Section -->
<div class="section-clean">
    <div class="container-clean">
        <h2 class="section-title-clean fade-in">Services Offerts</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div class="card-clean card-hover fade-in">
                <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem;">🎯 Coordination d'Urgence</h3>
                <p style="color: #64748b; margin-bottom: 1.5rem; line-height: 1.6;">
                    Coordination immédiate des réponses aux crises humanitaires et catastrophes naturelles.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.9rem;">
                    <span style="color: #16a34a;">✓ Centre de commandement 24/7</span>
                    <span style="color: #16a34a;">✓ Déploiement rapide d'équipes</span>
                    <span style="color: #16a34a;">✓ Communication multi-agences</span>
                </div>
            </div>
            
            <div class="card-clean card-hover fade-in" style="animation-delay: 0.1s;">
                <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem;">🚚 Logistique Internationale</h3>
                <p style="color: #64748b; margin-bottom: 1.5rem; line-height: 1.6;">
                    Gestion logistique complète des opérations d'assistance humanitaire.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.9rem;">
                    <span style="color: #16a34a;">✓ Transport aérien et maritime</span>
                    <span style="color: #16a34a;">✓ Distribution de matériel</span>
                    <span style="color: #16a34a;">✓ Stockage sécurisé</span>
                </div>
            </div>
            
            <div class="card-clean card-hover fade-in" style="animation-delay: 0.2s;">
                <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem;">📚 Formation & Préparation</h3>
                <p style="color: #64748b; margin-bottom: 1.5rem; line-height: 1.6;">
                    Formation spécialisée pour les intervenants en situation de crise.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.9rem;">
                    <span style="color: #16a34a;">✓ Simulations de crise</span>
                    <span style="color: #16a34a;">✓ Certification internationale</span>
                    <span style="color: #16a34a;">✓ Protocoles standardisés</span>
                </div>
            </div>
        </div>
    </div>
</div>

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

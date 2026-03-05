<!-- Interventions Section -->
<div class="section-clean" id="interventions">
    <div class="container-clean">
        <h2 class="section-title-clean fade-in">Interventions en Cours</h2>
        
        <div style="display: flex; gap: 1rem; justify-content: center; margin: 2rem 0; flex-wrap: wrap;">
            <input type="text" id="searchInput" placeholder="Rechercher une intervention..." 
                   style="padding: 0.75rem; border: 2px solid #e2e8f0; border-radius: 8px; font-size: 1rem; flex: 1; max-width: 400px;">
            
            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                <button class="filter-btn active" onclick="filterInterventions('all')" 
                        style="padding: 0.75rem 1rem; border: 2px solid #2563eb; background: #2563eb; color: white; border-radius: 6px; cursor: pointer; transition: all 0.2s;">Toutes</button>
                <button class="filter-btn" onclick="filterInterventions('critique')"
                        style="padding: 0.75rem 1rem; border: 2px solid #e2e8f0; background: white; color: #64748b; border-radius: 6px; cursor: pointer; transition: all 0.2s;">Critiques</button>
                <button class="filter-btn" onclick="filterInterventions('majeure')"
                        style="padding: 0.75rem 1rem; border: 2px solid #e2e8f0; background: white; color: #64748b; border-radius: 6px; cursor: pointer; transition: all 0.2s;">Majeures</button>
            </div>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2rem; margin-top: 2rem;" id="interventionsGrid">
            <?php foreach ($manager->getAll() as $intervention): ?>
            <div class="card-clean card-hover fade-in intervention-card" data-status="<?php echo $intervention['status']; ?>" data-title="<?php echo strtolower($intervention['title']); ?>">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <h3 style="color: #1e293b; margin: 0; font-size: 1.25rem;"><?php echo htmlspecialchars($intervention['title']); ?></h3>
                    <span class="status-badge-clean status-<?php echo $intervention['status']; ?>">
                        <?php echo strtoupper($intervention['status']); ?>
                    </span>
                </div>
                
                <p style="color: #64748b; margin-bottom: 1rem; font-weight: 500;">
                    📍 <?php echo htmlspecialchars($intervention['location']); ?>
                </p>
                
                <p style="color: #64748b; margin-bottom: 1.5rem; line-height: 1.6;">
                    <?php echo htmlspecialchars($intervention['description']); ?>
                </p>
                
                <div style="background: #f8fafc; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem; font-size: 0.9rem;">
                        <span style="color: #64748b;">👥 <?php echo $intervention['teams']; ?> équipes</span>
                        <span style="color: #64748b;">🏥 <?php echo htmlspecialchars($intervention['casualties']); ?></span>
                        <span style="color: #64748b;">👨‍💼 <?php echo htmlspecialchars($intervention['coordinator']); ?></span>
                        <span style="color: #64748b;">📈 <?php echo $intervention['progress']; ?>% progression</span>
                    </div>
                </div>
                
                <div style="background: #e2e8f0; height: 6px; border-radius: 3px; overflow: hidden;">
                    <div style="height: 100%; background: #2563eb; width: <?php echo $intervention['progress']; ?>%; transition: width 0.3s ease;"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.filter-btn.active {
    background: #2563eb !important;
    color: white !important;
    border-color: #2563eb !important;
}

.filter-btn:hover {
    background: #f8fafc !important;
    border-color: #cbd5e1 !important;
}

.filter-btn.active:hover {
    background: #1d4ed8 !important;
}
</style>

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

// Animation observer
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.fade-in').forEach(el => {
    el.style.animationPlayState = 'paused';
    observer.observe(el);
});
</script>

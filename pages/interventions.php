<div class="container">
    <h2 class="section-title">Interventions en Cours</h2>
    
    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Rechercher une intervention..." />
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

                <div class="meta-item" style="margin-bottom: 1rem;">
                    <div class="meta-label">Coordinateur</div>
                    <?php echo htmlspecialchars($intervention['coordinator']); ?>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?php echo $intervention['progress']; ?>%"></div>
                </div>
                <p style="font-size: 0.85rem; color: #64748b; margin-top: 0.5rem;">Progression: <?php echo $intervention['progress']; ?>%</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

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

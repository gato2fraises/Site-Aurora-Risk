<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />

<!-- Interactive Map Section -->
<div class="section-clean" id="carte-interactive">
    <div class="container-clean">
        <h2 class="section-title-clean fade-in">Carte Interactive des Interventions</h2>
        <p class="section-subtitle-clean fade-in">
            Visualisez nos interventions actives en temps réel à travers le monde. Cliquez sur les marqueurs pour obtenir plus de détails.
        </p>
        
        <div class="card-clean fade-in" style="margin-bottom: 2rem;">
            <h3 style="color: #1e293b; margin-bottom: 1rem; font-size: 1.25rem; text-align: center;">Légende des Statuts</h3>
            <div style="display: flex; justify-content: center; gap: 3rem; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 18px; height: 18px; background: #dc2626; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2);"></div>
                    <span style="color: #64748b; font-weight: 500;">Critique</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 18px; height: 18px; background: #f59e0b; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2);"></div>
                    <span style="color: #64748b; font-weight: 500;">Majeure</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 18px; height: 18px; background: #10b981; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2);"></div>
                    <span style="color: #64748b; font-weight: 500;">Active</span>
                </div>
            </div>
        </div>

        <div class="card-clean fade-in" style="padding: 0; overflow: hidden;">
            <div id="map" style="width: 100%; height: 600px;"></div>
        </div>

        <h3 class="section-title-clean fade-in" style="margin-top: 3rem; font-size: 1.75rem;">Emplacements des Interventions</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 2rem;">
            <?php 
            $locations = [
                ['name' => 'Gaziantep, Turquie', 'lat' => 37.0662, 'lng' => 37.3833, 'status' => 'critique', 'teams' => '45 équipes', 'desc' => 'Séisme magnitude 7.8 - Opérations de sauvetage'],
                ['name' => 'Méditerranée Centrale', 'lat' => 36.0, 'lng' => 13.0, 'status' => 'majeure', 'teams' => '12 navires', 'desc' => 'Sauvetage en mer - Assistance migrants'],
                ['name' => 'Région du Sahel', 'lat' => 17.0, 'lng' => 2.0, 'status' => 'majeure', 'teams' => '23 équipes', 'desc' => 'Épidémie de choléra - Vaccination'],
                ['name' => 'Bangladesh/Pakistan', 'lat' => 28.0, 'lng' => 87.0, 'status' => 'majeure', 'teams' => '31 équipes', 'desc' => 'Inondations catastrophiques'],
                ['name' => 'Gaza, Palestine', 'lat' => 31.95, 'lng' => 35.23, 'status' => 'critique', 'teams' => '67 équipes', 'desc' => 'Aide humanitaire d\'urgence']
            ];
            
            foreach ($locations as $index => $loc):
            ?>
            <div class="card-clean card-hover fade-in" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                    <h4 style="color: #1e293b; margin: 0; font-size: 1.1rem;">📍 <?php echo $loc['name']; ?></h4>
                    <span class="status-badge-clean status-<?php echo $loc['status']; ?>">
                        <?php echo strtoupper($loc['status']); ?>
                    </span>
                </div>
                
                <p style="color: #64748b; margin-bottom: 1rem; line-height: 1.5;">
                    <?php echo $loc['desc']; ?>
                </p>
                
                <div style="background: #f8fafc; padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="color: #64748b; font-size: 0.9rem;">
                            🌐 <?php echo number_format($loc['lat'], 2); ?>°, <?php echo number_format($loc['lng'], 2); ?>°
                        </span>
                        <span style="color: #2563eb; font-weight: 600; font-size: 0.9rem;">
                            👥 <?php echo $loc['teams']; ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
.leaflet-popup-content {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
}

.leaflet-popup-content-wrapper {
    border-radius: 8px !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15) !important;
}

.leaflet-popup-tip {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) !important;
}

.leaflet-container {
    border-radius: 8px;
}
</style>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
// Initialiser la carte avec un style professionnel
const map = L.map('map', {
    center: [20, 0],
    zoom: 2,
    zoomControl: true,
    scrollWheelZoom: true,
    doubleClickZoom: true,
    boxZoom: true,
    keyboard: true,
    dragging: true,
    touchZoom: true
});

// Ajouter la couche de tuiles avec style neutre
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    maxZoom: 18,
    minZoom: 2
}).addTo(map);

// Définir les couleurs pour chaque statut
const statusColors = {
    'critique': '#dc2626',
    'majeure': '#f59e0b',
    'active': '#10b981'
};

const statusLabels = {
    'critique': 'CRITIQUE',
    'majeure': 'MAJEURE',
    'active': 'ACTIVE'
};

// Données des interventions avec descriptions détaillées
const interventions = [
    {
        coords: [37.0662, 37.3833],
        name: 'Séisme en Turquie',
        status: 'critique',
        description: 'Tremblement de terre magnitude 7.8 à Gaziantep',
        teams: '45 équipes internationales',
        victims: '50,000+ personnes affectées',
        coordinator: 'Dr. Elena Vasquez'
    },
    {
        coords: [36.0, 13.0],
        name: 'Crise Migratoire Méditerranée',
        status: 'majeure',
        description: 'Opérations de sauvetage en mer',
        teams: '12 navires de secours',
        victims: '15,000+ migrants secourus',
        coordinator: 'Capt. Marco Rossi'
    },
    {
        coords: [17.0, 2.0],
        name: 'Épidémie Sahel',
        status: 'majeure',
        description: 'Épidémie de choléra - Campagne vaccination',
        teams: '23 équipes médicales',
        victims: '120,000+ patients traités',
        coordinator: 'Dr. Aminata Traoré'
    },
    {
        coords: [28.0, 87.0],
        name: 'Inondations Asie du Sud',
        status: 'majeure',
        description: 'Inondations catastrophiques Pakistan/Bangladesh',
        teams: '31 équipes de secours',
        victims: '2M+ personnes déplacées',
        coordinator: 'Gen. Rajesh Kumar'
    },
    {
        coords: [31.95, 35.23],
        name: 'Conflit Gaza',
        status: 'critique',
        description: 'Assistance humanitaire d\'urgence',
        teams: '67 équipes sur le terrain',
        victims: '1.5M+ civils affectés',
        coordinator: 'Dr. Sarah Mitchell'
    }
];

// Ajouter chaque intervention comme marqueur avec popup amélioré
interventions.forEach((intervention, index) => {
    const marker = L.circleMarker(intervention.coords, {
        radius: 14,
        fillColor: statusColors[intervention.status],
        color: '#ffffff',
        weight: 3,
        opacity: 1,
        fillOpacity: 0.85,
        className: 'intervention-marker'
    }).addTo(map);

    // Popup avec design cohérent
    const popupContent = `
        <div style="font-family: 'Inter', sans-serif; min-width: 280px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
                <h4 style="color: #1e293b; margin: 0; font-size: 1.125rem; font-weight: 600;">${intervention.name}</h4>
                <span style="background: ${statusColors[intervention.status]}; color: white; padding: 0.25rem 0.5rem; border-radius: 12px; font-size: 0.75rem; font-weight: 600;">
                    ${statusLabels[intervention.status]}
                </span>
            </div>
            
            <p style="color: #64748b; margin-bottom: 1rem; line-height: 1.5; font-size: 0.9rem;">
                ${intervention.description}
            </p>
            
            <div style="background: #f8fafc; padding: 0.75rem; border-radius: 6px; margin-bottom: 0.75rem;">
                <div style="display: grid; gap: 0.5rem; font-size: 0.85rem;">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #64748b;">👥 Équipes:</span>
                        <span style="color: #2563eb; font-weight: 500;">${intervention.teams}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #64748b;">🏥 Affectés:</span>
                        <span style="color: #2563eb; font-weight: 500;">${intervention.victims}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #64748b;">👨‍💼 Coordinateur:</span>
                        <span style="color: #2563eb; font-weight: 500;">${intervention.coordinator}</span>
                    </div>
                </div>
            </div>
        </div>
    `;

    marker.bindPopup(popupContent, {
        maxWidth: 320,
        className: 'intervention-popup'
    });

    // Animation d'apparition
    setTimeout(() => {
        marker.setStyle({
            radius: 12,
            fillOpacity: 0.9
        });
    }, index * 200);
});

// Améliorer l'interaction avec la carte
map.on('popupopen', function(e) {
    const popup = e.popup;
    const marker = e.popup._source;
    marker.setStyle({
        radius: 16,
        weight: 4
    });
});

map.on('popupclose', function(e) {
    const marker = e.popup._source;
    marker.setStyle({
        radius: 14,
        weight: 3
    });
});

// Animation observer pour la carte
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

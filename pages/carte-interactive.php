<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<style>
    #map {
        width: 100%;
        height: 600px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .leaflet-popup-content {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .map-legend {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    
    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
    }
    
    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid white;
    }
</style>

<div class="container">
    <h2 class="section-title">Carte Interactive des Interventions</h2>
    <p class="section-subtitle">Cliquez sur les marqueurs pour plus de détails sur les interventions en cours.</p>
    
    <div class="map-legend">
        <h3 style="color: #1e293b; margin-bottom: 1rem;">Légende</h3>
        <div class="legend-item">
            <div class="legend-color" style="background: #dc2626;"></div>
            <span style="color: #64748b;">Critique</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #f59e0b;"></div>
            <span style="color: #64748b;">Majeure</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #10b981;"></div>
            <span style="color: #64748b;">Active</span>
        </div>
    </div>

    <div id="map"></div>

    <h2 class="section-title" style="margin-top: 3rem;">Détails des Emplacements</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem;">
        <?php 
        $locations = [
            ['name' => 'Gaziantep, Turquie', 'lat' => 37.0662, 'lng' => 37.3833, 'status' => 'critique'],
            ['name' => 'Méditerranée', 'lat' => 36.0, 'lng' => 13.0, 'status' => 'majeure'],
            ['name' => 'Région du Sahel', 'lat' => 17.0, 'lng' => 2.0, 'status' => 'majeure'],
            ['name' => 'Pakistan, Bangladesh', 'lat' => 28.0, 'lng' => 87.0, 'status' => 'majeure'],
            ['name' => 'Gaza, Palestine', 'lat' => 31.95, 'lng' => 35.23, 'status' => 'critique']
        ];
        
        foreach ($locations as $loc):
        ?>
        <div style="padding: 1.5rem; background: #f8fafc; border-radius: 12px; border-left: 4px solid #3b82f6;">
            <h3 style="color: #1e293b; margin-bottom: 0.75rem;">📍 <?php echo $loc['name']; ?></h3>
            <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 0.75rem;">
                Coordonnées: <?php echo number_format($loc['lat'], 2); ?>°, <?php echo number_format($loc['lng'], 2); ?>°
            </p>
            <span class="status-badge status-<?php echo $loc['status']; ?>">
                <?php echo strtoupper($loc['status']); ?>
            </span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script>
// Initialiser la carte
const map = L.map('map').setView([20, 0], 2);

// Ajouter la couche de tuiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors',
    maxZoom: 19
}).addTo(map);

// Définir les couleurs pour chaque statut
const statusColors = {
    'critique': '#dc2626',
    'majeure': '#f59e0b',
    'active': '#10b981'
};

// Ajouter les marqueurs
const interventions = [
    {
        coords: [37.0662, 37.3833],
        name: 'Tremblement de Terre en Turquie',
        status: 'critique',
        description: 'Coordination d\'une opération de sauvetage internationale à Gaziantep'
    },
    {
        coords: [36.0, 13.0],
        name: 'Crise Migratoire en Méditerranée',
        status: 'majeure',
        description: 'Opération de sauvetage et d\'assistance humanitaire'
    },
    {
        coords: [17.0, 2.0],
        name: 'Épidémie de Choléra',
        status: 'majeure',
        description: 'Campagne de vaccination en Afrique de l\'Ouest'
    },
    {
        coords: [28.0, 87.0],
        name: 'Inondations en Asie du Sud',
        status: 'majeure',
        description: 'Assistance aux victimes des inondations catastrophiques'
    },
    {
        coords: [31.95, 35.23],
        name: 'Conflit en Proche-Orient',
        status: 'critique',
        description: 'Opération humanitaire en zone de conflit'
    }
];

// Ajouter chaque intervention comme marqueur
interventions.forEach(intervention => {
    const marker = L.circleMarker(intervention.coords, {
        radius: 12,
        fillColor: statusColors[intervention.status],
        color: '#fff',
        weight: 2,
        opacity: 1,
        fillOpacity: 0.8
    }).addTo(map);

    marker.bindPopup(`
        <div style="font-family: 'Segoe UI', sans-serif;">
            <strong style="color: #1e293b; font-size: 1.1rem;">${intervention.name}</strong><br>
            <span style="font-size: 0.9rem; color: #64748b;">${intervention.description}</span><br>
            <span style="display: inline-block; margin-top: 0.5rem; padding: 0.25rem 0.75rem; background: ${statusColors[intervention.status]}; color: white; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">
                ${intervention.status.toUpperCase()}
            </span>
        </div>
    `);
});

// Ajouter une vue globale au clic sur le siège social
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);
</script>

import React, { useState, useEffect, useRef } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import L from 'leaflet';
import './InteractiveMap.scss';

// Fix for default markers in React Leaflet
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

const InteractiveMap = () => {
  // Sample interventions data with real world coordinates
  const [interventions] = useState({
    'INT-001': {
      id: 'INT-001',
      title: 'Séisme Pacifique M7.2',
      location: 'Tokyo, Japon',
      status: 'emergency',
      coordinates: [35.6762, 139.6503], // Tokyo
      teams: 12,
      personnel: 156,
      progress: 75,
      duration: '4d',
      statusText: 'URGENCE',
      deployed: 'Actif depuis 4j',
      lastUpdate: '2026-03-05T14:30',
      priority: 'critical',
      type: 'earthquake',
      description: 'Tremblement de terre de magnitude 7.2 au large de Tokyo. Équipes de secours déployées.',
      population: '37M',
      magnitude: '7.2'
    },
    'INT-002': {
      id: 'INT-002',
      title: 'Incendies Méditerranéens',
      location: 'Marseille, France',
      status: 'emergency',
      coordinates: [43.2965, 5.3698], // Marseille
      teams: 8,
      personnel: 94,
      progress: 45,
      duration: '6d',
      statusText: 'URGENCE',
      deployed: 'Actif depuis 6j',
      lastUpdate: '2026-03-05T12:15',
      priority: 'high',
      type: 'fire',
      description: 'Feux de forêt majeurs dans la région marseillaise. Évacuations en cours.',
      population: '1.8M',
      area: '2500 hectares'
    },
    'INT-003': {
      id: 'INT-003',
      title: 'Hurricane Zeta',
      location: 'Miami, États-Unis',
      status: 'support',
      coordinates: [25.7617, -80.1918], // Miami
      teams: 6,
      personnel: 78,
      progress: 91,
      duration: '2d',
      statusText: 'SURVEILLANCE',
      deployed: 'Actif depuis 2j',
      lastUpdate: '2026-03-02T09:45',
      priority: 'high',
      type: 'hurricane',
      description: 'Ouragan de catégorie 2 approchant des côtes de Floride.',
      population: '6.2M',
      winds: '165 km/h'
    },
    'INT-004': {
      id: 'INT-004',
      title: 'Inondations Bangladesh',
      location: 'Dhaka, Bangladesh',
      status: 'emergency',
      coordinates: [23.8103, 90.4125], // Dhaka
      teams: 15,
      personnel: 203,
      progress: 28,
      duration: '8d',
      statusText: 'URGENCE',
      deployed: 'Actif depuis 8j',
      lastUpdate: '2026-03-05T16:00',
      priority: 'critical',
      type: 'flood',
      description: 'Inondations massives dans la région de Dhaka. Millions de personnes affectées.',
      population: '22M',
      displacement: '2.1M personnes'
    },
    'INT-005': {
      id: 'INT-005',
      title: 'Incident Sécuritaire',
      location: 'Berlin, Allemagne',
      status: 'exercise',
      coordinates: [52.5200, 13.4050], // Berlin
      teams: 4,
      personnel: 45,
      progress: 100,
      duration: '1d',
      statusText: 'RÉSOLU',
      deployed: 'Terminé',
      lastUpdate: '2026-03-04T18:30',
      priority: 'resolved',
      type: 'security',
      description: 'Exercice de sécurité terminé avec succès.',
      population: '3.7M',
      status_resolution: 'Exercice terminé'
    }
  });

  const [state, setState] = useState({
    selectedIntervention: 'INT-001',
    activeFilter: 'all',
    isFullscreen: false,
    lastRefresh: new Date().toISOString()
  });

  const [tooltip, setTooltip] = useState({
    visible: false,
    x: 0,
    y: 0,
    content: null
  });

  const mapRef = useRef(null);

  // Initialize with first intervention selected
  useEffect(() => {
    const firstIntervention = Object.values(interventions)[0];
    if (firstIntervention) {
      setState(prev => ({ ...prev, selectedIntervention: firstIntervention.id }));
    }
  }, [interventions]);

  const handleFilterChange = (filter) => {
    setState(prev => ({ ...prev, activeFilter: filter }));
  };

  const handleMarkerClick = (interventionId) => {
    setState(prev => ({ ...prev, selectedIntervention: interventionId }));
  };

  const handleRefresh = () => {
    setState(prev => ({ ...prev, lastRefresh: new Date().toISOString() }));
  };

  const toggleFullscreen = () => {
    setState(prev => ({ ...prev, isFullscreen: !prev.isFullscreen }));
  };

  const getFilteredInterventions = () => {
    if (state.activeFilter === 'all') return interventions;
    
    return Object.fromEntries(
      Object.entries(interventions).filter(([_, int]) => int.status === state.activeFilter)
    );
  };

  const getMarkerIcon = (intervention) => {
    let emoji = '📍';
    switch (intervention.type) {
      case 'earthquake': emoji = '🏔️'; break;
      case 'fire': emoji = '🔥'; break;
      case 'hurricane': emoji = '🌪️'; break;
      case 'flood': emoji = '🌊'; break;
      case 'security': emoji = '⚠️'; break;
      default: emoji = '📍'; break;
    }

    const iconHtml = `
      <div class="custom-marker ${intervention.status}" data-type="${intervention.type}">
        <div class="marker-pulse"></div>
        <div class="marker-content">
          <span class="marker-emoji">${emoji}</span>
        </div>
      </div>
    `;

    return L.divIcon({
      className: 'custom-div-icon',
      html: iconHtml,
      iconSize: [40, 40],
      iconAnchor: [20, 20]
    });
  };

  const selectedIntervention = interventions[state.selectedIntervention];
  const filteredInterventions = getFilteredInterventions();

  return (
    <section id="interventions-map" className={`interactive-map-section ${state.isFullscreen ? 'fullscreen' : ''}`}>
      <div className="container">
        <header className="section-header">
          <h2 className="section-title">
            <span className="status-indicator active" aria-hidden="true"></span>
            Carte Interactive Mondiale
          </h2>
          <p className="section-subtitle">
            Suivi des opérations AURORA en temps réel à travers le monde
          </p>
          <div className="map-last-update">
            Dernière mise à jour: <span className="update-time">
              {new Date(state.lastRefresh).toLocaleTimeString('fr-FR')}
            </span>
          </div>
        </header>

        <div className="map-dashboard">
          {/* Map Controls */}
          <div className="map-controls">
            <div className="filter-tabs" role="tablist" aria-label="Filtrer les interventions">
              {[
                { key: 'all', label: 'Toutes', count: Object.keys(interventions).length },
                { key: 'emergency', label: 'Urgences', count: Object.values(interventions).filter(i => i.status === 'emergency').length },
                { key: 'support', label: 'Assistance', count: Object.values(interventions).filter(i => i.status === 'support').length },
                { key: 'exercise', label: 'Exercices', count: Object.values(interventions).filter(i => i.status === 'exercise').length }
              ].map(filter => (
                <button
                  key={filter.key}
                  className={`filter-tab ${state.activeFilter === filter.key ? 'active' : ''}`}
                  onClick={() => handleFilterChange(filter.key)}
                  role="tab"
                  aria-selected={state.activeFilter === filter.key}
                >
                  <span className="filter-label">{filter.label}</span>
                  <span className="filter-count">{filter.count}</span>
                </button>
              ))}
            </div>

            <div className="map-actions">
              <button 
                className="action-btn refresh"
                onClick={handleRefresh}
                aria-label="Actualiser les données"
                title="Actualiser"
              >
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z"/>
                </svg>
              </button>
              <button 
                className="action-btn fullscreen"
                onClick={toggleFullscreen}
                aria-label="Plein écran"
                title="Plein écran"
              >
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M5,5H10V7H7V10H5V5M14,5H19V10H17V7H14V5M17,14H19V19H14V17H17V14M10,17V19H5V14H7V17H10Z"/>
                </svg>
              </button>
            </div>
          </div>

          {/* Leaflet Map Container */}
          <div className="map-container" ref={mapRef}>
            <MapContainer
              center={[20, 0]}
              zoom={2}
              style={{ height: '500px', width: '100%' }}
              className="leaflet-map"
            >
              <TileLayer
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
              />
              
              {Object.values(filteredInterventions).map(intervention => (
                <Marker
                  key={intervention.id}
                  position={intervention.coordinates}
                  icon={getMarkerIcon(intervention)}
                  eventHandlers={{
                    click: () => handleMarkerClick(intervention.id)
                  }}
                >
                  <Popup>
                    <div className="popup-content">
                      <div className="popup-header">
                        <span className={`popup-status ${intervention.status}`}>
                          {intervention.statusText}
                        </span>
                        <span className="popup-id">{intervention.id}</span>
                      </div>
                      <h4 className="popup-title">{intervention.title}</h4>
                      <p className="popup-location">{intervention.location}</p>
                      <div className="popup-stats">
                        <div className="popup-stat">
                          <strong>Équipes:</strong> {intervention.teams}
                        </div>
                        <div className="popup-stat">
                          <strong>Personnel:</strong> {intervention.personnel}
                        </div>
                        <div className="popup-stat">
                          <strong>Progression:</strong> {intervention.progress}%
                        </div>
                      </div>
                      <p className="popup-description">{intervention.description}</p>
                    </div>
                  </Popup>
                </Marker>
              ))}
            </MapContainer>
          </div>

          {/* Intervention Details Panel */}
          {selectedIntervention && (
            <div className="intervention-panel">
              <div className="panel-header">
                <div className="panel-status">
                  <span className={`status-badge ${selectedIntervention.status}`}>
                    {selectedIntervention.statusText}
                  </span>
                  <span className="intervention-id">{selectedIntervention.id}</span>
                </div>
              </div>

              <div className="panel-content" id="intervention-details">
                <h3 className="intervention-title">{selectedIntervention.title}</h3>
                <p className="intervention-location">{selectedIntervention.location}</p>
                
                <div className="intervention-stats">
                  <div className="stat-row">
                    <div className="stat-item">
                      <span className="stat-label">Équipes</span>
                      <span className="stat-value">{selectedIntervention.teams}</span>
                    </div>
                    <div className="stat-item">
                      <span className="stat-label">Personnel</span>
                      <span className="stat-value">{Math.floor(selectedIntervention.personnel)}</span>
                    </div>
                    <div className="stat-item">
                      <span className="stat-label">Durée</span>
                      <span className="stat-value">{selectedIntervention.duration}</span>
                    </div>
                  </div>

                  <div className="progress-section">
                    <div className="progress-header">
                      <span className="progress-label">Progression</span>
                      <span className="progress-percentage">{Math.floor(selectedIntervention.progress)}%</span>
                    </div>
                    <div className="progress-bar">
                      <div 
                        className="progress-fill"
                        style={{ width: `${selectedIntervention.progress}%` }}
                      ></div>
                    </div>
                  </div>

                  <div className="deployment-info">
                    <span className="deployment-text">{selectedIntervention.deployed}</span>
                  </div>

                  <div className="intervention-details">
                    <div className="detail-row">
                      <span className="detail-label">Description:</span>
                      <span className="detail-value">{selectedIntervention.description}</span>
                    </div>
                    <div className="detail-row">
                      <span className="detail-label">Population affectée:</span>
                      <span className="detail-value">{selectedIntervention.population}</span>
                    </div>
                    {selectedIntervention.magnitude && (
                      <div className="detail-row">
                        <span className="detail-label">Magnitude:</span>
                        <span className="detail-value">{selectedIntervention.magnitude}</span>
                      </div>
                    )}
                  </div>
                </div>
              </div>
            </div>
          )}
        </div>
      </div>
    </section>
  );
};

export default InteractiveMap;
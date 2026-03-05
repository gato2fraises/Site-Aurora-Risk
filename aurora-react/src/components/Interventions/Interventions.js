import React, { useState, useEffect } from 'react';
import InterventionCard from './InterventionCard';
import './Interventions.scss';

const Interventions = () => {
  // Données des interventions (synchronisées avec InteractiveMap)
  const [interventions] = useState({
    'INT-001': {
      id: 'INT-001',
      title: 'Séisme Pacifique M7.2',
      location: 'Tokyo, Japon',
      country: 'Japon',
      region: 'Asie-Pacifique',
      status: 'emergency',
      coordinates: [35.6762, 139.6503],
      teams: 12,
      personnel: 156,
      progress: 75,
      duration: '4d',
      statusText: 'URGENCE',
      deployed: 'Actif depuis 4j',
      startDate: '2026-03-01T14:30',
      lastUpdate: '2026-03-05T14:30',
      priority: 'critical',
      type: 'earthquake',
      description: 'Tremblement de terre de magnitude 7.2 au large de Tokyo. Équipes de secours déployées pour évacuation et aide humanitaire.',
      population: '37M',
      magnitude: '7.2',
      casualties: {
        injured: 234,
        displaced: 15000,
        missing: 12
      },
      resources: {
        helicopters: 8,
        vehicles: 45,
        medicalUnits: 12
      },
      coordinator: 'Dr. Yamamoto Hiroshi',
      contact: '+81-3-5555-0123'
    },
    'INT-002': {
      id: 'INT-002',
      title: 'Incendies Méditerranéens',
      location: 'Marseille, France',
      country: 'France',
      region: 'Europe',
      status: 'emergency',
      coordinates: [43.2965, 5.3698],
      teams: 8,
      personnel: 94,
      progress: 45,
      duration: '6d',
      statusText: 'URGENCE',
      deployed: 'Actif depuis 6j',
      startDate: '2026-02-28T08:15',
      lastUpdate: '2026-03-05T12:15',
      priority: 'high',
      type: 'fire',
      description: 'Feux de forêt majeurs dans la région marseillaise. Évacuations massives en cours et lutte aérienne déployée.',
      population: '1.8M',
      area: '2500 hectares',
      casualties: {
        injured: 45,
        displaced: 8500,
        missing: 3
      },
      resources: {
        aircraft: 12,
        vehicles: 67,
        fireStations: 18
      },
      coordinator: 'Capitaine Marie Dubois',
      contact: '+33-4-9155-2200'
    },
    'INT-003': {
      id: 'INT-003',
      title: 'Hurricane Zeta',
      location: 'Miami, États-Unis',
      country: 'États-Unis',
      region: 'Amérique du Nord',
      status: 'support',
      coordinates: [25.7617, -80.1918],
      teams: 6,
      personnel: 78,
      progress: 91,
      duration: '2d',
      statusText: 'SURVEILLANCE',
      deployed: 'Actif depuis 2j',
      startDate: '2026-03-03T09:45',
      lastUpdate: '2026-03-05T09:45',
      priority: 'high',
      type: 'hurricane',
      description: 'Ouragan de catégorie 2 approchant des côtes de Floride. Préparation des évacuations préventives.',
      population: '6.2M',
      winds: '165 km/h',
      casualties: {
        injured: 0,
        displaced: 25000,
        missing: 0
      },
      resources: {
        shelters: 45,
        vehicles: 89,
        boats: 23
      },
      coordinator: 'Major James Rodriguez',
      contact: '+1-305-555-0187'
    },
    'INT-004': {
      id: 'INT-004',
      title: 'Inondations Bangladesh',
      location: 'Dhaka, Bangladesh',
      country: 'Bangladesh',
      region: 'Asie du Sud',
      status: 'emergency',
      coordinates: [23.8103, 90.4125],
      teams: 15,
      personnel: 203,
      progress: 28,
      duration: '8d',
      statusText: 'URGENCE',
      deployed: 'Actif depuis 8j',
      startDate: '2026-02-26T16:00',
      lastUpdate: '2026-03-05T16:00',
      priority: 'critical',
      type: 'flood',
      description: 'Inondations massives dans la région de Dhaka. Millions de personnes affectées, aide humanitaire d\'urgence.',
      population: '22M',
      displacement: '2.1M personnes',
      casualties: {
        injured: 567,
        displaced: 2100000,
        missing: 89
      },
      resources: {
        boats: 156,
        vehicles: 78,
        medicalUnits: 34
      },
      coordinator: 'Dr. Rashida Ahmed',
      contact: '+880-2-5555-0234'
    },
    'INT-005': {
      id: 'INT-005',
      title: 'Incident Sécuritaire',
      location: 'Berlin, Allemagne',
      country: 'Allemagne',
      region: 'Europe',
      status: 'exercise',
      coordinates: [52.5200, 13.4050],
      teams: 4,
      personnel: 45,
      progress: 100,
      duration: '1d',
      statusText: 'RÉSOLU',
      deployed: 'Terminé',
      startDate: '2026-03-04T09:00',
      lastUpdate: '2026-03-04T18:30',
      priority: 'resolved',
      type: 'security',
      description: 'Exercice de coordination sécuritaire internationale terminé avec succès. Formation des équipes d\'intervention.',
      population: '3.7M',
      status_resolution: 'Exercice complété - Objectifs atteints',
      casualties: {
        injured: 0,
        displaced: 0,
        missing: 0
      },
      resources: {
        teams: 4,
        vehicles: 12,
        equipment: 'Standard'
      },
      coordinator: 'Oberst Klaus Weber',
      contact: '+49-30-5555-0145'
    }
  });

  const [filters, setFilters] = useState({
    status: 'all',
    type: 'all',
    priority: 'all',
    region: 'all'
  });

  const [search, setSearch] = useState('');
  const [sortBy, setSortBy] = useState('lastUpdate');
  const [sortOrder, setSortOrder] = useState('desc');

  // Filtrer et trier les interventions
  const getFilteredInterventions = () => {
    let filtered = Object.values(interventions);

    // Filtres par statut
    if (filters.status !== 'all') {
      filtered = filtered.filter(intervention => intervention.status === filters.status);
    }

    // Filtres par type
    if (filters.type !== 'all') {
      filtered = filtered.filter(intervention => intervention.type === filters.type);
    }

    // Filtres par priorité
    if (filters.priority !== 'all') {
      filtered = filtered.filter(intervention => intervention.priority === filters.priority);
    }

    // Filtres par région
    if (filters.region !== 'all') {
      filtered = filtered.filter(intervention => intervention.region === filters.region);
    }

    // Recherche textuelle
    if (search) {
      const searchLower = search.toLowerCase();
      filtered = filtered.filter(intervention => 
        intervention.title.toLowerCase().includes(searchLower) ||
        intervention.location.toLowerCase().includes(searchLower) ||
        intervention.description.toLowerCase().includes(searchLower) ||
        intervention.country.toLowerCase().includes(searchLower)
      );
    }

    // Tri
    filtered.sort((a, b) => {
      let valueA = a[sortBy];
      let valueB = b[sortBy];

      if (sortBy === 'lastUpdate' || sortBy === 'startDate') {
        valueA = new Date(valueA);
        valueB = new Date(valueB);
      }

      if (sortOrder === 'asc') {
        return valueA > valueB ? 1 : -1;
      } else {
        return valueA < valueB ? 1 : -1;
      }
    });

    return filtered;
  };

  const handleFilterChange = (filterType, value) => {
    setFilters(prev => ({ ...prev, [filterType]: value }));
  };

  const handleSort = (field) => {
    if (sortBy === field) {
      setSortOrder(sortOrder === 'asc' ? 'desc' : 'asc');
    } else {
      setSortBy(field);
      setSortOrder('desc');
    }
  };

  const getStatusCounts = () => {
    const all = Object.values(interventions);
    return {
      all: all.length,
      emergency: all.filter(i => i.status === 'emergency').length,
      support: all.filter(i => i.status === 'support').length,
      exercise: all.filter(i => i.status === 'exercise').length
    };
  };

  const getPriorityCounts = () => {
    const all = Object.values(interventions);
    return {
      all: all.length,
      critical: all.filter(i => i.priority === 'critical').length,
      high: all.filter(i => i.priority === 'high').length,
      resolved: all.filter(i => i.priority === 'resolved').length
    };
  };

  const filteredInterventions = getFilteredInterventions();
  const statusCounts = getStatusCounts();
  const priorityCounts = getPriorityCounts();

  return (
    <section id="interventions" className="interventions-section">
      <div className="container">
        {/* Header */}
        <header className="interventions-header">
          <div className="header-content">
            <h2 className="section-title">
              <span className="status-indicator active" aria-hidden="true"></span>
              Centre des Interventions
            </h2>
            <p className="section-subtitle">
              Gestion et suivi des opérations d'urgence AURORA à travers le monde
            </p>
            <div className="interventions-stats">
              <div className="stat-item">
                <span className="stat-number">{statusCounts.emergency}</span>
                <span className="stat-label">Urgences actives</span>
              </div>
              <div className="stat-item">
                <span className="stat-number">{statusCounts.support}</span>
                <span className="stat-label">Assistances</span>
              </div>
              <div className="stat-item">
                <span className="stat-number">{Object.values(interventions).reduce((sum, i) => sum + i.personnel, 0)}</span>
                <span className="stat-label">Personnel déployé</span>
              </div>
              <div className="stat-item">
                <span className="stat-number">{Object.values(interventions).reduce((sum, i) => sum + i.teams, 0)}</span>
                <span className="stat-label">Équipes actives</span>
              </div>
            </div>
          </div>
        </header>

        {/* Contrôles et Filtres */}
        <div className="interventions-controls">
          {/* Recherche */}
          <div className="search-container">
            <div className="search-input-wrapper">
              <svg className="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
              </svg>
              <input
                type="text"
                placeholder="Rechercher une intervention..."
                value={search}
                onChange={(e) => setSearch(e.target.value)}
                className="search-input"
              />
              {search && (
                <button 
                  className="search-clear"
                  onClick={() => setSearch('')}
                  aria-label="Effacer la recherche"
                >
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                  </svg>
                </button>
              )}
            </div>
          </div>

          {/* Filtres */}
          <div className="filters-container">
            {/* Statut */}
            <div className="filter-group">
              <label className="filter-label">Statut</label>
              <div className="filter-tabs">
                {[
                  { key: 'all', label: 'Tous', count: statusCounts.all },
                  { key: 'emergency', label: 'Urgences', count: statusCounts.emergency },
                  { key: 'support', label: 'Assistance', count: statusCounts.support },
                  { key: 'exercise', label: 'Exercices', count: statusCounts.exercise }
                ].map(filter => (
                  <button
                    key={filter.key}
                    className={`filter-tab ${filters.status === filter.key ? 'active' : ''}`}
                    onClick={() => handleFilterChange('status', filter.key)}
                  >
                    <span className="filter-label">{filter.label}</span>
                    <span className="filter-count">{filter.count}</span>
                  </button>
                ))}
              </div>
            </div>

            {/* Type */}
            <div className="filter-group">
              <label className="filter-label">Type</label>
              <select 
                value={filters.type} 
                onChange={(e) => handleFilterChange('type', e.target.value)}
                className="filter-select"
              >
                <option value="all">Tous types</option>
                <option value="earthquake">Séismes</option>
                <option value="fire">Incendies</option>
                <option value="hurricane">Ouragans</option>
                <option value="flood">Inondations</option>
                <option value="security">Sécurité</option>
              </select>
            </div>

            {/* Priorité */}
            <div className="filter-group">
              <label className="filter-label">Priorité</label>
              <select 
                value={filters.priority} 
                onChange={(e) => handleFilterChange('priority', e.target.value)}
                className="filter-select"
              >
                <option value="all">Toutes priorités</option>
                <option value="critical">Critique</option>
                <option value="high">Haute</option>
                <option value="resolved">Résolue</option>
              </select>
            </div>

            {/* Région */}
            <div className="filter-group">
              <label className="filter-label">Région</label>
              <select 
                value={filters.region} 
                onChange={(e) => handleFilterChange('region', e.target.value)}
                className="filter-select"
              >
                <option value="all">Toutes régions</option>
                <option value="Europe">Europe</option>
                <option value="Asie-Pacifique">Asie-Pacifique</option>
                <option value="Asie du Sud">Asie du Sud</option>
                <option value="Amérique du Nord">Amérique du Nord</option>
              </select>
            </div>
          </div>

          {/* Tri */}
          <div className="sort-controls">
            <label className="filter-label">Trier par</label>
            <div className="sort-buttons">
              <button
                className={`sort-btn ${sortBy === 'lastUpdate' ? 'active' : ''}`}
                onClick={() => handleSort('lastUpdate')}
              >
                Dernière mise à jour
                {sortBy === 'lastUpdate' && (
                  <span className={`sort-arrow ${sortOrder}`}>
                    {sortOrder === 'asc' ? '↑' : '↓'}
                  </span>
                )}
              </button>
              <button
                className={`sort-btn ${sortBy === 'priority' ? 'active' : ''}`}
                onClick={() => handleSort('priority')}
              >
                Priorité
                {sortBy === 'priority' && (
                  <span className={`sort-arrow ${sortOrder}`}>
                    {sortOrder === 'asc' ? '↑' : '↓'}
                  </span>
                )}
              </button>
              <button
                className={`sort-btn ${sortBy === 'progress' ? 'active' : ''}`}
                onClick={() => handleSort('progress')}
              >
                Progression
                {sortBy === 'progress' && (
                  <span className={`sort-arrow ${sortOrder}`}>
                    {sortOrder === 'asc' ? '↑' : '↓'}
                  </span>
                )}
              </button>
            </div>
          </div>
        </div>

        {/* Résultats */}
        <div className="interventions-results">
          <div className="results-header">
            <h3 className="results-title">
              {filteredInterventions.length} intervention{filteredInterventions.length !== 1 ? 's' : ''} 
              {search && ` pour "${search}"`}
            </h3>
            <div className="results-actions">
              <button className="action-btn export">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                </svg>
                Exporter
              </button>
              <button className="action-btn refresh">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z"/>
                </svg>
                Actualiser
              </button>
            </div>
          </div>

          {/* Liste des interventions */}
          <div className="interventions-grid">
            {filteredInterventions.length > 0 ? (
              filteredInterventions.map(intervention => (
                <InterventionCard 
                  key={intervention.id} 
                  intervention={intervention} 
                />
              ))
            ) : (
              <div className="no-results">
                <div className="no-results-icon">🔍</div>
                <h4>Aucune intervention trouvée</h4>
                <p>Essayez de modifier vos critères de recherche ou filtres.</p>
                <button 
                  className="btn-secondary"
                  onClick={() => {
                    setSearch('');
                    setFilters({ status: 'all', type: 'all', priority: 'all', region: 'all' });
                  }}
                >
                  Réinitialiser les filtres
                </button>
              </div>
            )}
          </div>
        </div>
      </div>
    </section>
  );
};

export default Interventions;
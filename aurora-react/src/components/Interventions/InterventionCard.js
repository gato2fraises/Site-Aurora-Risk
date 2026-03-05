import React from 'react';
import './InterventionCard.scss';

const InterventionCard = ({ intervention }) => {
  const getTypeIcon = (type) => {
    switch (type) {
      case 'earthquake': return '🏔️';
      case 'fire': return '🔥';
      case 'hurricane': return '🌪️';
      case 'flood': return '🌊';
      case 'security': return '⚠️';
      default: return '📍';
    }
  };

  const getTypeLabel = (type) => {
    switch (type) {
      case 'earthquake': return 'Séisme';
      case 'fire': return 'Incendie';
      case 'hurricane': return 'Ouragan';
      case 'flood': return 'Inondation';
      case 'security': return 'Sécurité';
      default: return 'Intervention';
    }
  };

  const getPriorityClass = (priority) => {
    switch (priority) {
      case 'critical': return 'priority-critical';
      case 'high': return 'priority-high';
      case 'resolved': return 'priority-resolved';
      default: return 'priority-medium';
    }
  };

  const getStatusClass = (status) => {
    switch (status) {
      case 'emergency': return 'status-emergency';
      case 'support': return 'status-support';
      case 'exercise': return 'status-exercise';
      default: return 'status-active';
    }
  };

  const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit'
    });
  };

  const getElapsedTime = (startDate) => {
    const start = new Date(startDate);
    const now = new Date();
    const diffTime = Math.abs(now - start);
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    const diffHours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    
    if (diffDays > 0) {
      return `${diffDays}j ${diffHours}h`;
    } else {
      return `${diffHours}h`;
    }
  };

  const getTotalCasualties = () => {
    if (!intervention.casualties) return 0;
    return (intervention.casualties.injured || 0) + 
           (intervention.casualties.missing || 0);
  };

  return (
    <div className={`intervention-card ${getStatusClass(intervention.status)} ${getPriorityClass(intervention.priority)}`}>
      {/* Header */}
      <header className="card-header">
        <div className="header-left">
          <div className="type-indicator">
            <span className="type-icon">{getTypeIcon(intervention.type)}</span>
            <span className="type-label">{getTypeLabel(intervention.type)}</span>
          </div>
          <div className="intervention-id">{intervention.id}</div>
        </div>
        <div className="header-right">
          <span className={`status-badge ${intervention.status}`}>
            {intervention.statusText}
          </span>
          <div className="priority-indicator">
            <span className={`priority-dot ${intervention.priority}`} aria-hidden="true"></span>
            <span className="priority-text">{
              intervention.priority === 'critical' ? 'Critique' :
              intervention.priority === 'high' ? 'Haute' :
              intervention.priority === 'resolved' ? 'Résolue' : 'Normale'
            }</span>
          </div>
        </div>
      </header>

      {/* Content */}
      <div className="card-content">
        <h3 className="intervention-title">{intervention.title}</h3>
        <div className="location-info">
          <svg className="location-icon" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
          </svg>
          <span className="location-text">{intervention.location}</span>
          <span className="region-text">• {intervention.region}</span>
        </div>
        
        <p className="intervention-description">{intervention.description}</p>

        {/* Progress */}
        <div className="progress-section">
          <div className="progress-header">
            <span className="progress-label">Progression</span>
            <span className="progress-percentage">{intervention.progress}%</span>
          </div>
          <div className="progress-bar">
            <div 
              className="progress-fill"
              style={{ width: `${intervention.progress}%` }}
            ></div>
          </div>
        </div>

        {/* Key Stats */}
        <div className="key-stats">
          <div className="stat-group">
            <div className="stat-item">
              <span className="stat-icon">👥</span>
              <div className="stat-info">
                <span className="stat-value">{intervention.teams}</span>
                <span className="stat-label">Équipes</span>
              </div>
            </div>
            <div className="stat-item">
              <span className="stat-icon">👨‍💼</span>
              <div className="stat-info">
                <span className="stat-value">{intervention.personnel}</span>
                <span className="stat-label">Personnel</span>
              </div>
            </div>
            <div className="stat-item">
              <span className="stat-icon">⏱️</span>
              <div className="stat-info">
                <span className="stat-value">{getElapsedTime(intervention.startDate)}</span>
                <span className="stat-label">Durée</span>
              </div>
            </div>
            {getTotalCasualties() > 0 && (
              <div className="stat-item casualties">
                <span className="stat-icon">🚨</span>
                <div className="stat-info">
                  <span className="stat-value">{getTotalCasualties()}</span>
                  <span className="stat-label">Victimes</span>
                </div>
              </div>
            )}
          </div>
        </div>

        {/* Additional Info */}
        <div className="additional-info">
          {intervention.population && (
            <div className="info-item">
              <span className="info-label">Population:</span>
              <span className="info-value">{intervention.population}</span>
            </div>
          )}
          {intervention.magnitude && (
            <div className="info-item">
              <span className="info-label">Magnitude:</span>
              <span className="info-value">{intervention.magnitude}</span>
            </div>
          )}
          {intervention.area && (
            <div className="info-item">
              <span className="info-label">Zone:</span>
              <span className="info-value">{intervention.area}</span>
            </div>
          )}
          {intervention.winds && (
            <div className="info-item">
              <span className="info-label">Vents:</span>
              <span className="info-value">{intervention.winds}</span>
            </div>
          )}
          {intervention.displacement && (
            <div className="info-item">
              <span className="info-label">Déplacés:</span>
              <span className="info-value">{intervention.displacement}</span>
            </div>
          )}
        </div>
      </div>

      {/* Footer */}
      <footer className="card-footer">
        <div className="footer-left">
          <div className="coordinator-info">
            <span className="coordinator-icon">👤</span>
            <span className="coordinator-name">{intervention.coordinator}</span>
          </div>
          <div className="last-update">
            <span className="update-icon">🕐</span>
            <span className="update-time">
              Mis à jour: {formatDate(intervention.lastUpdate)}
            </span>
          </div>
        </div>
        <div className="footer-right">
          <div className="action-buttons">
            <button className="btn-action primary">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z"/>
              </svg>
              Détails
            </button>
            <button className="btn-action secondary">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M9.64,8.64L11,10.05L12.36,8.64L13.78,10.05L12.42,11.41L13.78,12.78L12.36,14.19L11,12.83L9.64,14.19L8.22,12.78L9.58,11.41L8.22,10.05L9.64,8.64Z"/>
              </svg>
              Localiser
            </button>
            <button className="btn-action contact">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z"/>
              </svg>
              Contact
            </button>
          </div>
        </div>
      </footer>

      {/* Emergency Pulse Animation */}
      {intervention.status === 'emergency' && intervention.priority === 'critical' && (
        <div className="emergency-pulse" aria-hidden="true"></div>
      )}
    </div>
  );
};

export default InterventionCard;
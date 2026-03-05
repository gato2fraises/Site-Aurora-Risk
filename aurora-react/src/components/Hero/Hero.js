import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import './Hero.scss';

const Hero = () => {
  const [stats, setStats] = useState({
    countries: 0,
    interventions: 0,
    hours: 0
  });

  // Counter animation for statistics
  useEffect(() => {
    const targetStats = {
      countries: 156,
      interventions: 2847,
      hours: 24
    };

    const animateCounter = (target, setter, key) => {
      let current = 0;
      const increment = target / 100; // 100 steps
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        setter(prev => ({ ...prev, [key]: Math.floor(current) }));
      }, 20);
    };

    // Start animations with delays
    setTimeout(() => animateCounter(targetStats.countries, setStats, 'countries'), 500);
    setTimeout(() => animateCounter(targetStats.interventions, setStats, 'interventions'), 700);
    setTimeout(() => animateCounter(targetStats.hours, setStats, 'hours'), 900);
  }, []);

  return (
    <section className="hero-section" aria-labelledby="hero-title">
      <div className="hero-background">
        <div className="hero-overlay"></div>
      </div>
      
      <div className="container">
        <div className="hero-content">
          <h2 id="hero-title" className="hero-title">
            <span className="coordination-text">
              Coordination Internationale
            </span>
            <br />
            <span className="text-highlight">des Crises Majeures</span>
          </h2>
          <p className="hero-description">
            AURORA coordonne les réponses aux crises à l'échelle mondiale, 
            facilitant la coopération internationale pour une intervention rapide et efficace.
          </p>
          <div className="hero-actions">
            <Link to="/interventions" className="btn btn-primary">
              Nos Interventions
            </Link>
            <Link to="/about" className="btn btn-secondary">
              Découvrir l'Agence
            </Link>
          </div>
          
          {/* Live Statistics */}
          <div className="live-stats" aria-label="Statistiques en temps réel">
            <div className="stat-item">
              <span className="stat-number" data-counter={stats.countries}>
                {stats.countries}
              </span>
              <span className="stat-label">Pays partenaires</span>
            </div>
            <div className="stat-item">
              <span className="stat-number" data-counter={stats.interventions}>
                {stats.interventions.toLocaleString()}
              </span>
              <span className="stat-label">Interventions réalisées</span>
            </div>
            <div className="stat-item">
              <span className="stat-number" data-counter={stats.hours}>
                {stats.hours}
              </span>
              <span className="stat-label">h/24 - 7j/7</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Hero;
import React from 'react';
import './About.scss';

const About = () => {
  return (
    <div className="about-page">
      {/* Hero Section */}
      <section className="about-hero">
        <div className="container">
          <div className="about-hero-content">
            <h1 className="about-title">
              Qui Sommes-Nous ?
            </h1>
            <p className="about-subtitle">
              AURORA (Agence Unifiée de Réponse et d'Organisation des Risques Anormaux) 
              est une organisation internationale dédiée à la coordination des interventions d'urgence.
            </p>
          </div>
        </div>
      </section>

      {/* Mission Section */}
      <section className="mission-section">
        <div className="container">
          <div className="section-content">
            <div className="content-grid">
              <div className="text-content">
                <h2 className="section-title">Notre Mission</h2>
                <p className="mission-text">
                  Depuis notre création en 1998, AURORA coordonne les réponses aux crises humanitaires 
                  à l'échelle mondiale. Nous facilitons la coopération entre organisations internationales, 
                  gouvernements et ONG pour une intervention rapide et efficace lors de catastrophes naturelles, 
                  conflits ou crises sanitaires.
                </p>
                <div className="mission-points">
                  <div className="mission-point">
                    <div className="point-icon">🚨</div>
                    <div className="point-content">
                      <h3>Réponse Rapide</h3>
                      <p>Coordination immédiate des secours dans les premières heures critiques</p>
                    </div>
                  </div>
                  <div className="mission-point">
                    <div className="point-icon">🌍</div>
                    <div className="point-content">
                      <h3>Portée Mondiale</h3>
                      <p>Réseau de partenaires dans plus de 156 pays à travers le globe</p>
                    </div>
                  </div>
                  <div className="mission-point">
                    <div className="point-icon">🤝</div>
                    <div className="point-content">
                      <h3>Coordination</h3>
                      <p>Optimisation des ressources par la collaboration inter-agences</p>
                    </div>
                  </div>
                </div>
              </div>
              <div className="stats-content">
                <div className="stats-grid">
                  <div className="stat-card">
                    <div className="stat-number">127+</div>
                    <div className="stat-label">Organisations Partenaires</div>
                  </div>
                  <div className="stat-card">
                    <div className="stat-number">156</div>
                    <div className="stat-label">Pays Couverts</div>
                  </div>
                  <div className="stat-card">
                    <div className="stat-number">24/7</div>
                    <div className="stat-label">Surveillance Continue</div>
                  </div>
                  <div className="stat-card">
                    <div className="stat-number">2.3M+</div>
                    <div className="stat-label">Vies Sauvées</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* History Section */}
      <section className="history-section">
        <div className="container">
          <h2 className="section-title">Notre Histoire</h2>
          <div className="timeline">
            <div className="timeline-item">
              <div className="timeline-year">1998</div>
              <div className="timeline-content">
                <h3>Création d'AURORA</h3>
                <p>Fondation à Genève suite aux leçons apprises des crises humanitaires des années 90</p>
              </div>
            </div>
            <div className="timeline-item">
              <div className="timeline-year">2004</div>
              <div className="timeline-content">
                <h3>Tsunami de l'Océan Indien</h3>
                <p>Première grande coordination internationale, sauvant plus de 50,000 vies</p>
              </div>
            </div>
            <div className="timeline-item">
              <div className="timeline-year">2010</div>
              <div className="timeline-content">
                <h3>Séisme d'Haïti</h3>
              <p>Innovation dans la logistique d'urgence et les communications en zone de crise</p>
              </div>
            </div>
            <div className="timeline-item">
              <div className="timeline-year">2020</div>
              <div className="timeline-content">
                <h3>Pandémie COVID-19</h3>
                <p>Coordination mondiale de la réponse sanitaire et distribution de fournitures médicales</p>
              </div>
            </div>
            <div className="timeline-item">
              <div className="timeline-year">2026</div>
              <div className="timeline-content">
                <h3>Aujourd'hui</h3>
                <p>Plus de 127 organisations partenaires et présence dans 156 pays</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Leadership Section */}
      <section className="leadership-section">
        <div className="container">
          <h2 className="section-title">Leadership</h2>
          <div className="leadership-grid">
            <div className="leader-card">
              <div className="leader-photo">👨‍💼</div>
              <div className="leader-info">
                <h3>Dr. James Mitchell</h3>
                <p className="leader-title">Directeur Général</p>
                <p className="leader-bio">
                  25 ans d'expérience en gestion de crise internationale. 
                  Ancien coordinateur d'urgence aux Nations Unies.
                </p>
              </div>
            </div>
            <div className="leader-card">
              <div className="leader-photo">👩‍💼</div>
              <div className="leader-info">
                <h3>Dr. Maria Santos</h3>
                <p className="leader-title">Directrice des Opérations</p>
                <p className="leader-bio">
                  Experte en logistique humanitaire avec un doctorat en gestion de catastrophes. 
                  20 ans sur le terrain.
                </p>
              </div>
            </div>
            <div className="leader-card">
              <div className="leader-photo">👨‍🔬</div>
              <div className="leader-info">
                <h3>Prof. Ahmed Hassan</h3>
                <p className="leader-title">Directeur Scientifique</p>
                <p className="leader-bio">
                  Spécialiste en prévision et analyse des risques. 
                  Développement d'outils d'alerte précoce innovants.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Values Section */}
      <section className="values-section">
        <div className="container">
          <h2 className="section-title">Nos Valeurs</h2>
          <div className="values-grid">
            <div className="value-card">
              <div className="value-icon">🎯</div>
              <h3>Excellence</h3>
              <p>Nous visons l'excellence dans chaque intervention, avec des standards de qualité internationaux</p>
            </div>
            <div className="value-card">
              <div className="value-icon">🤝</div>
              <h3>Collaboration</h3>
              <p>La force réside dans l'union. Nous croyons en la puissance de la coopération internationale</p>
            </div>
            <div className="value-card">
              <div className="value-icon">⚡</div>
              <h3>Rapidité</h3>
              <p>Chaque minute compte en situation de crise. Nous agissons avec une rapidité exemplaire</p>
            </div>
            <div className="value-card">
              <div className="value-icon">💡</div>
              <h3>Innovation</h3>
              <p>Technologies de pointe et méthodes innovantes pour améliorer constamment nos capacités</p>
            </div>
            <div className="value-card">
              <div className="value-icon">🌍</div>
              <h3>Humanité</h3>
              <p>Au cœur de tout : sauver des vies et réduire les souffrances humaines</p>
            </div>
            <div className="value-card">
              <div className="value-icon">🔒</div>
              <h3>Intégrité</h3>
              <p>Transparence, responsabilité et respect des plus hauts standards éthiques</p>
            </div>
          </div>
        </div>
      </section>

      {/* Partners Section */}
      <section className="partners-section">
        <div className="container">
          <h2 className="section-title">Nos Partenaires</h2>
          <div className="partners-content">
            <div className="partners-text">
              <p>
                AURORA travaille en étroite collaboration avec un réseau mondial de partenaires 
                pour maximiser l'efficacité de nos interventions d'urgence.
              </p>
            </div>
            <div className="partners-categories">
              <div className="partner-category">
                <h3>🏛️ Organisations Internationales</h3>
                <ul>
                  <li>Nations Unies (OCHA, PAM, HCR)</li>
                  <li>Union Européenne - DG ECHO</li>
                  <li>Croix-Rouge Internationale</li>
                  <li>Organisation Mondiale de la Santé</li>
                </ul>
              </div>
              <div className="partner-category">
                <h3>🏛️ Gouvernements</h3>
                <ul>
                  <li>Agences nationales de protection civile</li>
                  <li>Ministères des Affaires étrangères</li>
                  <li>Forces armées humanitaires</li>
                  <li>Services de secours nationaux</li>
                </ul>
              </div>
              <div className="partner-category">
                <h3>🤝 ONG Partenaires</h3>
                <ul>
                  <li>Médecins Sans Frontières</li>
                  <li>Oxfam International</li>
                  <li>CARE International</li>
                  <li>Action contre la Faim</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section className="contact-section">
        <div className="container">
          <h2 className="section-title">Nous Rejoindre</h2>
          <div className="contact-content">
            <div className="contact-info">
              <h3>Siège Social</h3>
              <div className="contact-details">
                <p>📍 15 Avenue Montaigne<br />75008 Paris, France</p>
                <p>📞 +33 1 42 75 77 77</p>
                <p>📧 contact@aurora-crisis.org</p>
                <p>🌐 www.aurora-crisis.org</p>
              </div>
              
              <h3>Centre Opérationnel 24/7</h3>
              <div className="contact-details">
                <p>🚨 Urgence: +33 1 42 75 77 77</p>
                <p>📧 ops@aurora-crisis.org</p>
              </div>
            </div>
            
            <div className="join-info">
              <h3>Opportunités</h3>
              <div className="opportunities">
                <div className="opportunity">
                  <h4>💼 Carrières</h4>
                  <p>Rejoignez nos équipes d'experts internationaux</p>
                </div>
                <div className="opportunity">
                  <h4>🎓 Stages</h4>
                  <p>Programmes pour étudiants et jeunes professionnels</p>
                </div>
                <div className="opportunity">
                  <h4>🤝 Partenariat</h4>
                  <p>Devenez organisation partenaire d'AURORA</p>
                </div>
                <div className="opportunity">
                  <h4>💰 Financement</h4>
                  <p>Soutenez nos missions humanitaires</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default About;
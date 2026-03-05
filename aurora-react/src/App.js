import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { Helmet } from 'react-helmet';

// Components
import Header from './components/Header/Header';
import Hero from './components/Hero/Hero';
import InteractiveMap from './components/InteractiveMap/InteractiveMap';
import Interventions from './components/Interventions/Interventions';
import About from './components/About/About';

// Styles
import './styles/main.scss';
import './styles/responsive.scss';
import './styles/ui-improvements.scss';

function App() {
  return (
    <Router>
      <div className="App">
        <Helmet>
          <title>AURORA - Coordination Internationale des Crises</title>
          <meta name="description" content="Plateforme officielle de coordination des interventions d'urgence et gestion des crises internationales" />
          <meta property="og:title" content="AURORA - Coordination Internationale des Crises" />
          <meta property="og:description" content="Organisation internationale dédiée à la coordination des réponses aux crises humanitaires et aux catastrophes" />
        </Helmet>
        
        <Header />
        
        <main>
          <Routes>
            <Route path="/" element={
              <>
                <Hero />
                <InteractiveMap />
                <Interventions />
                
                {/* Section Mission */}
                <section id="mission" className="section-mission">
                  <div className="container">
                    <div className="mission-content">
                      <h2 className="section-title">Notre Mission</h2>
                      <div className="mission-grid">
                        <div className="mission-card">
                          <div className="mission-icon">🚨</div>
                          <h3>Coordination Rapide</h3>
                          <p>Orchestration immédiate des réponses d'urgence avec nos partenaires internationaux pour une intervention efficace et coordonnée.</p>
                        </div>
                        <div className="mission-card">
                          <div className="mission-icon">🌍</div>
                          <h3>Réseau Global</h3>
                          <p>Réseau mondial de 127+ organisations partenaires pour une couverture complète des situations de crise internationale.</p>
                        </div>
                        <div className="mission-card">
                          <div className="mission-icon">⚡</div>
                          <h3>Action Immédiate</h3>
                          <p>Déploiement rapide de ressources et expertise spécialisée dans les zones de crise pour minimiser l'impact humanitaire.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                {/* Section Services */}
                <section id="services" className="section-services">
                  <div className="container">
                    <h2 className="section-title">Nos Services</h2>
                    <div className="services-grid">
                      <div className="service-card">
                        <h3>Coordination d'Urgence</h3>
                        <p>Coordination immédiate des réponses aux crises humanitaires et catastrophes naturelles.</p>
                        <ul>
                          <li>Centre de commandement 24/7</li>
                          <li>Déploiement rapide d'équipes</li>
                          <li>Communication multi-agences</li>
                        </ul>
                      </div>
                      <div className="service-card">
                        <h3>Logistique Internationale</h3>
                        <p>Gestion logistique complète des opérations d'assistance humanitaire.</p>
                        <ul>
                          <li>Transport aérien et maritime</li>
                          <li>Distribution de matériel</li>
                          <li>Stockage sécurisé</li>
                        </ul>
                      </div>
                      <div className="service-card">
                        <h3>Formation & Préparation</h3>
                        <p>Formation spécialisée pour les intervenants en situation de crise.</p>
                        <ul>
                          <li>Simulations de crise</li>
                          <li>Certification internationale</li>
                          <li>Protocoles standardisés</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </section>

                {/* Section Contact */}
                <section id="contact" className="section-contact">
                  <div className="container">
                    <h2 className="section-title">Centre de Coordination</h2>
                    <div className="contact-content">
                      <div className="contact-info">
                        <h3>Opérations 24/7</h3>
                        <p><strong>Urgence:</strong> +33 1 42 75 77 77</p>
                        <p><strong>Coordination:</strong> ops@aurora-crisis.org</p>
                        <p><strong>Siège:</strong> 15 Avenue Montaigne, 75008 Paris</p>
                      </div>
                      <div className="contact-stats">
                        <div className="stat-item">
                          <span className="stat-number">127+</span>
                          <span className="stat-label">Organisations Partenaires</span>
                        </div>
                        <div className="stat-item">
                          <span className="stat-number">24/7</span>
                          <span className="stat-label">Centre Opérationnel</span>
                        </div>
                        <div className="stat-item">
                          <span className="stat-number">156</span>
                          <span className="stat-label">Pays Couverts</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </>
            } />
            <Route path="/interventions" element={<Interventions />} />
            <Route path="/about" element={<About />} />
          </Routes>
        </main>

        <footer className="main-footer">
          <div className="container">
            <div className="footer-content">
              <div className="footer-section">
                <h4>AURORA</h4>
                <p>Organisation internationale de coordination des crises humanitaires.</p>
              </div>
              <div className="footer-section">
                <h4>Liens Rapides</h4>
                <ul>
                  <li><a href="#mission">Mission</a></li>
                  <li><a href="#services">Services</a></li>
                  <li><a href="#contact">Contact</a></li>
                </ul>
              </div>
              <div className="footer-section">
                <h4>Contact d'Urgence</h4>
                <p>+33 1 42 75 77 77</p>
                <p>ops@aurora-crisis.org</p>
              </div>
            </div>
            <div className="footer-bottom">
              <p>&copy; 2026 AURORA. Tous droits réservés.</p>
            </div>
          </div>
        </footer>
      </div>
    </Router>
  );
}

export default App;
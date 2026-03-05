import React from 'react';
import { Link } from 'react-router-dom';
import './Header.scss';

const Header = () => {
  return (
    <>
      {/* Main Header */}
      <header className="header">
        <div className="header-content">
          <Link className="logo" to="/">
            <div className="logo-icon">🌍</div>
            <span>AURORA</span>
          </Link>
          
          <nav className="nav-menu" role="navigation">
            <a href="#mission" className="nav-link">Mission</a>
            <Link to="/interventions" className="nav-link">Interventions</Link>
            <Link to="/about" className="nav-link">À Propos</Link>
            <a href="#contact" className="nav-link">Contact</a>
          </nav>
          
          <div className="status-indicator">
            <div className="status-dot"></div>
            <span>Opérationnel</span>
          </div>
        </div>
      </header>
    </>
  );
};

export default Header;
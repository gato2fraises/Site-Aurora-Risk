# AURORA - Coordination Internationale des Crises

**Agence Unifiée de Réponse et d'Organisation des Risques Anormaux**

AURORA est une plateforme moderne de coordination des interventions de crise internationale, développée avec React pour offrir une interface utilisateur moderne et réactive.

## 🌐 Versions disponibles

### React (Recommended - En ligne)
✅ **Accédez à l'application complète sur GitHub Pages:**
👉 **https://gato2fraises.github.io/Site-Aurora-Risk/**

- Application moderne et interactive
- Fonctionne directement en ligne (GitHub Pages)
- Carte interactive avec Leaflet
- Design responsive et animations

### PHP (Local)
✅ **Version PHP avec serveur backend:**
📄 **Consultez [PHP-SETUP.md](PHP-SETUP.md) pour les instructions**

- Application serveur-side en PHP
- Fonctionnalités identiques à React
- À exécuter localement avec `php -S localhost:8000`
- Parfait pour le développement backend

## 🌍 Vue d'ensemble

Cette application web permet la gestion et coordination en temps réel des interventions d'urgence à travers le monde, avec une carte interactive mondiale utilisant Leaflet pour visualiser les crises actives.

## 🚀 Technologies disponibles

### React (Version actuelle en ligne)
- **Frontend**: React 18+ avec Hooks
- **Carte Interactive**: React Leaflet pour une vraie carte du monde
- **Styles**: SCSS avec design system cohérent
- **Build**: Create React App avec optimisations de production

### PHP (Version locale)
- **Backend**: PHP pur avec POO
- **Styles**: CSS intégré avec design system
- **Features**: Gestion dynamique des interventions
- **Server**: Apache / PHP natif

## 📦 Installation & Démarrage

### Version React (En ligne)
```bash
# Cloner le projet
git clone https://github.com/gato2fraises/Site-Aurora-Risk.git
cd Site-Aurora-Risk

# Installer les dépendances
cd aurora-react
npm install

# Démarrer l'application
npm start
```

L'application sera accessible sur [http://localhost:3000](http://localhost:3000).

### Version PHP (Local)
```bash
# Cloner le projet
git clone https://github.com/gato2fraises/Site-Aurora-Risk.git
cd Site-Aurora-Risk

# Démarrer le serveur PHP natif
php -S localhost:8000
```

L'application sera accessible sur [http://localhost:8000](http://localhost:8000).

**Pour plus de détails, consultez [PHP-SETUP.md](PHP-SETUP.md)**

## 🛠 Scripts disponibles

### Application React
```bash
cd aurora-react

# Développement
npm start              # Serveur de développement
npm run build         # Build de production
npm test             # Tests unitaires
npm run eject        # Éjecter la configuration (attention: irréversible)
```

## 🌐 Fonctionnalités principales

### Carte Interactive Mondiale
- **Vraie carte du monde** avec Leaflet et OpenStreetMap
- **Marqueurs géolocalisés** avec différents types d'interventions :
  - 🏔️ Séismes
  - 🔥 Incendies 
  - 🌊 Inondations
  - 🌪️ Ouragans
  - ⚠️ Sécurité/Terrorism
- **Filtres par type** d'intervention
- **Mode plein écran** pour une meilleure visualisation
- **Popups d'information** détaillées
- **Sidebar de détails** avec informations complètes

### Interface Moderne
- **Header responsive** avec logo AURORA
- **Navigation intuitive** (Mission, Interventions, Contact)
- **Indicateur de statut** opérationnel en temps réel
- **Design adaptatif** mobile-first

### Gestion des Crises
- **Visualisation en temps réel** des interventions actives
- **Données détaillées** : pays, magnitude, population affectée, équipes déployées
- **Statuts multiples** : En cours, Résolue, Surveillance
- **Niveaux de priorité** : Faible, Moyenne, Haute, Critique

## 🎨 Design System

### Couleurs principales
- **Bleu primaire**: #1e3a8a (Navigation et éléments principaux)
- **Bleu secondaire**: #3b82f6 (Boutons et liens)
- **Rouge urgence**: #e74c3c (Alertes critiques)
- **Orange alerte**: #e67e22 (Incendies)
- **Bleu info**: #3498db (Inondations)

### Composants
- **Header**: Navigation principale avec statut opérationnel
- **Hero**: Section d'accueil avec présentation
- **InteractiveMap**: Carte mondiale interactive avec Leaflet
- **Responsive Design**: Adaptatif mobile et tablette

## 📁 Structure des fichiers

```
aurora-react/
├── public/
│   ├── index.html
│   └── manifest.json
├── src/
│   ├── components/
│   │   ├── Header/
│   │   │   ├── Header.js
│   │   │   └── Header.scss
│   │   ├── Hero/
│   │   │   ├── Hero.js
│   │   │   └── Hero.scss
│   │   └── InteractiveMap/
│   │       ├── InteractiveMap.js
│   │       └── InteractiveMap.scss
│   ├── styles/
│   │   ├── _variables.scss
│   │   ├── index.scss
│   │   ├── main.scss
│   │   ├── responsive.scss
│   │   └── ui-improvements.scss
│   ├── App.js
│   └── index.js
├── package.json
└── README.md
```

## 🗺 Données d'exemple d'interventions

L'application inclut des données d'exemple représentatives :

1. **Séisme Pacifique M7.2** - Tokyo, Japon (Critique)
2. **Incendies Méditerranéens** - Marseille, France (Haute)
3. **Hurricane Zeta** - Miami, États-Unis (Haute - Surveillance)
4. **Inondations Bangladesh** - Dhaka, Bangladesh (Critique)
5. **Incident Sécuritaire** - Berlin, Allemagne (Résolu)

## 🚀 Technologies utilisées

- **React** 18.2.0 - Framework frontend moderne
- **React Leaflet** 4.x - Composants de carte interactive
- **Leaflet** 1.9.x - Bibliothèque de cartographie
- **React Router** - Routage côté client
- **SCSS** - Préprocesseur CSS avancé
- **Create React App** - Toolchain de développement

## 📱 Responsive Design

L'application est entièrement responsive et optimisée pour :
- **Desktop** (1200px+)
- **Tablette** (768px-1199px)  
- **Mobile** (320px-767px)

## 🌟 Fonctionnalités avancées

- **Markers personnalisés** avec icônes emoji selon le type d'intervention
- **Animations CSS** pour les éléments critiques (pulse des marqueurs actifs)
- **Gestion d'état React** avec hooks useState et useEffect
- **Performance optimisée** avec React.memo et lazy loading
- **Accessibilité WAI-ARIA** complète

## 🔧 Configuration

### Variables d'environnement
Créez un fichier `.env` pour configurer :
```bash
REACT_APP_MAP_CENTER_LAT=20
REACT_APP_MAP_CENTER_LNG=0
REACT_APP_MAP_ZOOM=2
REACT_APP_TILE_LAYER=https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
```

## 🚦 Déploiement

### Build de production
```bash
cd aurora-react
npm run build
```

Le dossier `build/` contient les fichiers optimisés prêts pour le déploiement.

### Serveurs supportés
- **Vercel** (recommandé pour React)
- **Netlify**
- **GitHub Pages**
- **AWS S3 + CloudFront**

## 📄 Licence

© 2026 AURORA - Tous droits réservés.

---

**AURORA** - Coordination mondiale pour un monde plus sûr 🌍# Site-Aurora-Risk

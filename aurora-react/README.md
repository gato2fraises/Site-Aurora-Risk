# AURORA React - Plateforme de Coordination des Crises

Version React de la plateforme officielle AURORA (Agence Unifiée de Réponse et d'Organisation des Risques Anormaux).

## 🚀 Aperçu

Cette application React moderne reproduit fidèlement toutes les fonctionnalités du site AURORA original avec :

- **Header avancé** avec indicateurs de statut en temps réel
- **Carte interactive** des interventions en cours
- **Design responsive** et accessible (WCAG 2.1 AA)
- **Animations fluides** et micro-interactions
- **Architecture modulaire** avec composants réutilisables

## 📋 Fonctionnalités

### Header Intelligent
- Statut opérationnel en temps réel
- Compteurs d'interventions actives
- Barre de progression globale
- Navigation responsive avec dropdowns

### Carte Interactive
- Visualisation des interventions mondiales
- Filtrage par type (Urgence, Assistance, Exercice)
- Tooltips informatifs
- Panel de détails avec statistiques

### Interface Utilisateur
- Design system cohérent
- Animations CSS avancées
- Support multi-plateforme
- Mode plein écran pour la carte

## 🛠 Installation et Configuration

### Prérequis

- Node.js 18.x ou supérieur
- npm 8.x ou supérieur
- Git

### Installation

```bash
# Cloner et naviguer vers le dossier React
cd aurora-react

# Installer les dépendances
npm install

# Démarrer l'application en mode développement
npm start
```

L'application sera accessible sur `http://localhost:3000`

### Scripts Disponibles

```bash
# Développement
npm start                 # Démarre le serveur de développement

# Production
npm run build            # Crée un build optimisé
npm run build:analyze    # Analyse la taille du bundle

# Tests
npm test                 # Lance les tests en mode watch
npm run test:coverage    # Génère un rapport de couverture

# Qualité du code
npm run lint             # Vérifie le code avec ESLint
npm run lint:fix         # Corrige automatiquement les erreurs ESLint
npm run format           # Formate le code avec Prettier

# Type checking (si TypeScript est ajouté)
npm run type-check       # Vérifie les types TypeScript
```

## 🏗 Architecture

```
src/
├── components/              # Composants React
│   ├── Header/             # Header avec statut
│   │   ├── Header.js
│   │   └── Header.scss
│   ├── Hero/               # Section héro
│   │   ├── Hero.js
│   │   └── Hero.scss
│   └── InteractiveMap/     # Carte interactive
│       ├── InteractiveMap.js
│       └── InteractiveMap.scss
├── styles/                 # Styles globaux
│   ├── _variables.scss     # Variables CSS/SCSS
│   ├── main.scss          # Styles principaux
│   ├── responsive.scss     # Styles responsifs
│   ├── ui-improvements.scss # Améliorations UI
│   └── index.scss         # Point d'entrée
├── hooks/                  # Hooks personnalisés
├── services/              # Services API
├── App.js                 # Composant principal
└── index.js              # Point d'entrée React
```

## 🎨 Système de Design

### Couleurs Principales
```scss
--primary-blue: #003366      // Bleu institutionnel
--warning-yellow: #F59E0B    // Jaune d'alerte
--alert-red: #E63946         // Rouge urgence
--success-green: #10B981     // Vert succès
```

### Typographie
- **Titres**: Montserrat Bold (700-900)
- **Corps**: Roboto Regular (400-500)
- **Échelle**: 12px - 36px (responsive)

### Espacements
```scss
--spacing-xs: 0.25rem    // 4px
--spacing-sm: 0.5rem     // 8px
--spacing-md: 1rem       // 16px
--spacing-lg: 1.5rem     // 24px
--spacing-xl: 2rem       // 32px
--spacing-xxl: 3rem      // 48px
```

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: 1024px - 1280px
- **Large**: > 1280px

### Fonctionnalités Adaptatives
- Navigation mobile avec menu hamburger
- Grilles flexibles pour les cartes
- Images optimisées par taille d'écran
- Touch-friendly sur mobile

## ♿ Accessibilité

### Standards WCAG 2.1 AA
- Support complet du clavier
- Lecteurs d'écran compatibles
- Contraste suffisant (4.5:1+)
- Focus visible sur tous les éléments
- Labels et descriptions appropriés

### Fonctionnalités d'Accessibilité
```jsx
// Skip links
<a href="#main-content" className="skip-link">
  Aller au contenu principal
</a>

// ARIA labels
<button aria-label="Actualiser les données" title="Actualiser">
  <RefreshIcon />
</button>

// Screen reader only content
<span className="sr-only">
  Statut: Opérationnel
</span>
```

## 🔧 Personnalisation

### Variables CSS
Modifiez `src/styles/_variables.scss` pour personnaliser :
- Couleurs de marque
- Espacements
- Typographie
- Ombres et bordures

### Ajout de Composants
```jsx
// Nouveau composant
import React from 'react';
import './MonComposant.scss';

const MonComposant = ({ prop1, prop2 }) => {
  return (
    <div className="mon-composant">
      {/* Contenu du composant */}
    </div>
  );
};

export default MonComposant;
```

## 🚀 Déploiement

### Build de Production
```bash
npm run build
```

Le dossier `build/` contient l'application optimisée prête pour le déploiement.

### Variables d'Environnement
Créez un fichier `.env` :
```env
REACT_APP_API_URL=https://api.aurora-crisis.org
REACT_APP_MAP_API_KEY=your_map_api_key
REACT_APP_VERSION=1.0.0
```

### Serveurs Recommandés
- **Netlify**: Déploiement automatique via Git
- **Vercel**: Optimisé pour React
- **Apache/Nginx**: Configuration incluse dans le build

## 🧪 Tests

### Tests Unitaires
```bash
npm test                    # Run all tests
npm test -- --watch       # Watch mode
npm test -- --coverage    # With coverage
```

### Tests d'Intégration
```bash
npm run test:integration   # E2E tests with Cypress
```

## 🔄 Comparaison avec l'Original

| Fonctionnalité | Original | React | Status |
|----------------|----------|--------|---------|
| Header dynamique | ✅ | ✅ | Identique |
| Carte interactive | ✅ | ✅ | Améliorée |
| Responsive design | ✅ | ✅ | Optimisé |
| Accessibilité | ✅ | ✅ | Renforcée |
| Performance | ✅ | ✅ | Supérieure |
| SEO | ✅ | ✅ | Maintenu |

## 🤝 Contribution

1. Fork le projet
2. Créez votre branche (`git checkout -b feature/amazing-feature`)
3. Committez vos changements (`git commit -m 'Add amazing feature'`)
4. Push vers la branche (`git push origin feature/amazing-feature`)
5. Ouvrez une Pull Request

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 🆘 Support

- **Documentation**: [Wiki du projet](https://github.com/aurora/react/wiki)
- **Issues**: [GitHub Issues](https://github.com/aurora/react/issues)
- **Email**: dev@aurora-crisis.org

---

Développé avec ❤️ pour la plateforme AURORA de coordination des crises internationales.
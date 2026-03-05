# 🌟 AURORA - Applications Frontend

**Agence Unifiée de Réponse et d'Organisation des Risques Anormaux**  
*Organisation Internationale de Coordination des Crises*

Plateforme web développée avec React et Angular selon les exigences de sécurité et d'accessibilité les plus strictes.

---

## 📋 Table des Matières

- [Aperçu du Projet](#aperçu-du-projet)
- [Architecture Technique](#architecture-technique)
- [Applications](#applications)
- [Structure des Fichiers](#structure-des-fichiers)
- [Installation et Développement](#installation-et-développement)
- [Fonctionnalités](#fonctionnalités)
- [Sécurité](#sécurité)
- [Accessibilité](#accessibilité)
- [Déploiement](#déploiement)
- [Maintenance](#maintenance)

---

## 🎯 Aperçu du Projet

### Mission
AURORA est une organisation internationale spécialisée dans la coordination des crises majeures. Cette plateforme constitue le canal officiel de communication institutionnelle et opérationnelle.

### Objectifs
- ✅ Interface utilisateur moderne et responsive
- ✅ Diffusion d'informations officielles
- ✅ Valorisation de la mission et des actions  
- ✅ Publication des rapports annuels
- ✅ Gestion du recrutement
- ✅ Communication en situation d'urgence

### Publics Cibles
- Gouvernements et institutions publiques
- ONG humanitaires
- Centres de recherche scientifique
- Médias et journalistes
- Candidats au recrutement
- Grand public

---

## 🏗️ Architecture Technique

### Technologies Utilisées
- **React**: Bibliothèque JavaScript pour l'interface utilisateur
- **Angular**: Framework TypeScript pour applications entreprise
- **TypeScript**: Langage typé pour un code plus robuste
- **SCSS/CSS**: Styles modernes avec variables et composants
- **Responsive Design**: Mobile-first approach

### Standards & Normes
- ✅ **Components** modulaires et réutilisables
- ✅ **TypeScript** pour un code typé et maintenable
- ✅ **SCSS** avec architecture moderne
- ✅ **Responsive Design** mobile-first
- ✅ **WCAG 2.1 AA** conforme
- ✅ **RGPD** compliant
- ✅ **ISO 27001** orienté

---

## 📱 Applications

### 🔵 Aurora React
Application React moderne avec hooks et contexte pour une interface utilisateur dynamique.

**Caractéristiques:**
- Interface utilisateur moderne et intuitive
- Components réutilisables
- Gestion d'état avec hooks
- Routing côté client
- Performance optimisée

**Technologies:**
- React 18+
- JavaScript ES6+
- SCSS pour les styles
- Webpack pour le build

### 🅰️ Aurora Angular  
Application Angular robuste avec TypeScript pour les besoins enterprise.

**Caractéristiques:**
- Architecture modulaire
- Services injectables
- Pipes personnalisés
- Routing avancé
- Typage strict avec TypeScript

**Technologies:**
- Angular 15+
- TypeScript
- SCSS pour les styles
- Angular CLI pour le build

---

## 📁 Structure des Fichiers

```
aurora-risk/
├── README.md                           # Documentation du projet
├── robots.txt                         # Instructions pour les moteurs de recherche
├── sitemap.xml                        # Plan du site XML
├── documents/                          # Documents téléchargeables
│   ├── rapport-annuel-2025.pdf
│   ├── statuts-aurora.pdf
│   └── ...
├── 
├── aurora-react/                       # Application React
│   ├── package.json                   # Dépendances React
│   ├── README.md                       # Documentation React
│   ├── public/                         # Assets statiques
│   │   ├── index.html                 # Template HTML
│   │   └── manifest.json              # Manifest PWA
│   └── src/                           # Code source React
│       ├── App.js                     # Composant principal
│       ├── index.js                   # Point d'entrée
│       ├── components/                # Composants React
│       │   ├── Header/
│       │   │   └── Header.js
│       │   ├── Hero/
│       │   │   ├── Hero.js
│       │   │   └── Hero.scss
│       │   └── InteractiveMap/
│       │       ├── InteractiveMap.js
│       │       └── InteractiveMap.scss
│       ├── hooks/                     # Hooks personnalisés
│       ├── services/                  # Services API
│       └── styles/                    # Styles SCSS
│           ├── _variables.scss
│           ├── index.scss
│           ├── main.scss
│           ├── responsive.scss
│           └── ui-improvements.scss
├── 
└── aurora-angular/                     # Application Angular
    ├── angular.json                    # Configuration Angular CLI
    ├── package.json                    # Dépendances Angular
    ├── README.md                       # Documentation Angular
    ├── tsconfig.json                   # Configuration TypeScript
    ├── tsconfig.app.json              # Config TS pour l'application
    └── src/                           # Code source Angular
        ├── index.html                 # Template HTML
        ├── main.ts                    # Bootstrap Angular
        ├── polyfills.ts               # Polyfills navigateur
        ├── app/                       # Module principal
        │   ├── app.component.html     # Template principal
        │   ├── app.component.ts       # Composant principal
        │   ├── app.module.ts          # Module racine
        │   ├── components/            # Composants Angular
        │   │   ├── header/
        │   │   │   ├── header.component.html
        │   │   │   ├── header.component.scss
        │   │   │   └── header.component.ts
        │   │   ├── hero/
        │   │   │   ├── hero.component.html
        │   │   │   ├── hero.component.scss
        │   │   │   └── hero.component.ts
        │   │   └── interactive-map/
        │   │       ├── interactive-map.component.html
        │   │       ├── interactive-map.component.scss
        │   │       └── interactive-map.component.ts
        │   ├── pipes/                 # Pipes personnalisés
        │   │   └── filter.pipe.ts
        │   └── services/              # Services Angular
        │       ├── intervention.service.ts
        │       └── notification.service.ts
        ├── assets/                    # Assets statiques
        └── styles/                    # Styles globaux
```

---

## 💻 Installation et Développement

### Prérequis
```bash
Node.js 16+ 
npm ou yarn
Git
```

### Installation React
```bash
cd aurora-react
npm install
npm start                 # Démarrage en mode dev sur http://localhost:3000
```

### Installation Angular
```bash
cd aurora-angular
npm install
ng serve                  # Démarrage en mode dev sur http://localhost:4200
```

### Scripts Disponibles

#### React
```bash
npm start                 # Développement
npm run build            # Build de production
npm run test             # Tests unitaires
npm run lint             # Linting du code
```

#### Angular  
```bash
ng serve                 # Développement
ng build                 # Build de production
ng test                  # Tests unitaires
ng lint                  # Linting du code
ng generate component    # Générer un composant
```

---

## ⚡ Fonctionnalités

### ✅ React Application
- [x] **Interface utilisateur moderne** avec components fonctionnels
- [x] **Hooks React** pour la gestion d'état (useState, useEffect)
- [x] **Routing dynamique** avec React Router
- [x] **Composants réutilisables** (Header, Hero, InteractiveMap)
- [x] **Styles modulaires** avec SCSS
- [x] **Responsive design** mobile-first
- [x] **Performance optimisée** avec lazy loading

### ✅ Angular Application  
- [x] **Architecture modulaire** avec services injectables
- [x] **TypeScript** pour un code typé et robuste
- [x] **Composants Angular** avec lifecycle hooks
- [x] **Services** pour la logique métier (intervention, notification)
- [x] **Pipes personnalisés** pour la transformation de données
- [x] **Routing avancé** avec guards et resolvers
- [x] **Testing** intégré avec Jasmine/Karma

### 🚧 À Développer (Commun aux deux applications)
- [ ] **API Backend** pour les données temps réel
- [ ] **Authentification** avec JWT tokens
- [ ] **Internationalisation** (i18n) FR/EN
- [ ] **PWA** capabilities avec service workers
- [ ] **Tests E2E** avec Cypress/Playwright
- [ ] **Monitoring** avec analytics
- [ ] **CI/CD Pipeline** automatisé

---

## 🔒 Sécurité

### Protections Modernes
- ✅ **Component Security** - Sanitisation automatique des inputs
- ✅ **HTTPS Enforcement** - Communication sécurisée
- ✅ **Environment Variables** - Configuration sécurisée
- ✅ **Dependency Scanning** - Audit automatique des vulnérabilités
- ✅ **CSP Headers** - Content Security Policy
- ✅ **XSS Protection** - Cross-site scripting prevention

### React Sécurité
- ✅ **JSX Auto-escape** - Protection automatique contre XSS
- ✅ **Props validation** avec PropTypes
- ✅ **Sanitization** des données dangereuses
- ✅ **Secure routing** avec authentification

### Angular Sécurité
- ✅ **Built-in XSS protection** avec sanitizer
- ✅ **CSRF Protection** avec intercepteurs HTTP
- ✅ **Route Guards** pour la protection des pages
- ✅ **HttpClient** sécurisé avec intercepteurs

### Conformité
- ✅ **RGPD** - Gestion des données personnelles
- ✅ **OWASP** - Bonnes pratiques de sécurité web
- ✅ **Audit de sécurité** - npm audit / ng update

---

## ♿ Accessibilité

### Standards WCAG 2.1 AA (Commun aux deux applications)
- ✅ **Navigation clavier** complète
- ✅ **Screen readers** compatibles (ARIA labels)
- ✅ **Contrastes** conformes (ratios validés)
- ✅ **Focus management** visible et logique
- ✅ **Semantic HTML** structure appropriée
- ✅ **Alternative text** pour tous les médias

### React Accessibilité
- ✅ **React a11y** - Linting automatique
- ✅ **Focus management** avec useRef
- ✅ **ARIA attributes** appropriées
- ✅ **Semantic components** accessibles

### Angular Accessibilité  
- ✅ **Angular CDK a11y** - Outils d'accessibilité
- ✅ **Focus trap** intégré
- ✅ **Live announcer** pour les changements
- ✅ **High contrast** support

### Tests d'Accessibilité
```bash
# Outils recommandés
- axe-core (intégration automatique)
- react-axe / angular-axe
- Pa11y pour tests automatisés
- Tests manuels avec NVDA/JAWS
```

---

## 📦 Déploiement

### Déploiement React
```bash
# Build de production
npm run build

# Options de déploiement
- Vercel (recommandé)
- Netlify  
- AWS S3 + CloudFront
- Azure Static Web Apps
```

### Déploiement Angular
```bash
# Build de production
ng build --prod

# Options de déploiement
- Azure Static Web Apps (recommandé)
- AWS S3 + CloudFront
- Google Firebase Hosting
- Vercel
```

### Configuration CI/CD
```yaml
# Exemple GitHub Actions
name: Deploy Applications

on:
  push:
    branches: [main]

jobs:
  deploy-react:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Install and Build React
        run: |
          cd aurora-react
          npm install
          npm run build
          
  deploy-angular:
    runs-on: ubuntu-latest  
    steps:
      - uses: actions/checkout@v3
      - name: Install and Build Angular
        run: |
          cd aurora-angular
          npm install
          ng build --prod
```

### Variables d'Environnement

#### React (.env)
```bash
REACT_APP_API_URL=https://api.aurora-risk.org
REACT_APP_ENV=production
REACT_APP_VERSION=1.0.0
```

#### Angular (environment.ts)
```typescript
export const environment = {
  production: true,
  apiUrl: 'https://api.aurora-risk.org',
  version: '1.0.0'
};
```

---

## 🔧 Maintenance

### Tâches Régulières

#### Hebdomadaire
```bash
# React
npm audit                    # Vérification sécurité
npm outdated                 # Dépendances obsolètes
npm run test                 # Tests unitaires
npm run lint                 # Qualité du code

# Angular  
ng update                    # Mise à jour Angular
npm audit                    # Vérification sécurité
ng test                      # Tests unitaires
ng lint                      # Qualité du code
```

#### Mensuelle
```bash
# Mise à jour des dépendances
npm update                   # React
ng update                    # Angular

# Performance monitoring
npm run build --analyze      # Bundle analysis
lighthouse-cli               # Performance audit

# Accessibility testing
axe-cli                      # Tests automatisés
```

#### Trimestrielle
- **Major framework updates** (React/Angular)
- **Security audit** complet
- **Performance optimization** review
- **Accessibility testing** manuel complet
- **Code review** et refactoring

### Outils de Développement

#### React
```bash
# Outils recommandés
- React Developer Tools
- Redux DevTools
- Webpack Bundle Analyzer
- ESLint + Prettier
- Husky (Git hooks)
```

#### Angular
```bash
# Outils recommandés  
- Angular DevTools
- Augury (déprécié, utiliser DevTools)
- Angular CLI
- TSLint/ESLint
- Protractor/Cypress
```

### Monitoring Production
```bash
# Métriques à surveiller
- Bundle size performance
- Core Web Vitals
- Error tracking (Sentry)
- User analytics
- API response times
```

---

## 📚 Documentation Technique

### Guides de Développement
- [React Best Practices](aurora-react/docs/best-practices.md) *(à créer)*
- [Angular Style Guide](aurora-angular/docs/style-guide.md) *(à créer)*
- [Component Library](docs/component-library.md) *(à créer)*
- [API Integration Guide](docs/api-integration.md) *(à créer)*

### Tests et Qualité
- [Testing Strategy](docs/testing-strategy.md) *(à créer)*
- [Code Quality Guidelines](docs/code-quality.md) *(à créer)*
- [Accessibility Testing](docs/a11y-testing.md) *(à créer)*

### Formation Équipe
- **React Fundamentals**: 8h (niveau débutant)
- **Angular Enterprise**: 12h (niveau intermédiaire)
- **TypeScript Advanced**: 6h (niveau avancé)
- **Accessibility Implementation**: 4h (niveau développeur)

---

## 📞 Support & Contacts

### Support Technique
- **Development Team**: dev@aurora-risk.org
- **Issue Tracker**: GitHub Issues
- **Documentation**: Wiki interne
- **Code Review**: Pull Request process

### Stack Overflow Tags
- `react` `aurora-risk` pour les questions React
- `angular` `typescript` `aurora-risk` pour les questions Angular

### Ressources Externes
- **React Documentation**: https://react.dev/
- **Angular Documentation**: https://angular.io/
- **TypeScript Handbook**: https://www.typescriptlang.org/
- **WCAG Guidelines**: https://www.w3.org/WAI/WCAG21/

---

## 📄 Licence & Droits

**© 2026 AURORA - Tous droits réservés**

Ces applications sont développées exclusivement pour l'Agence Unifiée de Réponse et d'Organisation des Risques Anormaux (AURORA). Toute reproduction, distribution ou utilisation non autorisée est strictement interdite.

### Dépendances Open Source
Ce projet utilise des bibliothèques open source. Consultez les fichiers `package.json` de chaque application pour la liste complète des dépendances et leurs licences respectives.

---

## 🚀 Prochaines Étapes

### Roadmap Q2 2026
- [ ] **API Backend** - Développement de l'API REST
- [ ] **Authentication** - Système de login sécurisé
- [ ] **Internationalization** - Support FR/EN
- [ ] **Testing Suite** - Tests E2E complets

### Roadmap Q3 2026  
- [ ] **Mobile Apps** - Applications natives iOS/Android
- [ ] **PWA** - Progressive Web App features
- [ ] **Performance** - Optimisations avancées
- [ ] **Analytics** - Tableau de bord analytique

---

*Dernière mise à jour: 5 mars 2026*  
*Version: 2.0.0*  
*Status: ✅ Modern Frontend Ready*
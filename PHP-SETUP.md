# 📖 Guide d'Utilisation - Version PHP

## ⚠️ Important - GitHub Pages et PHP

GitHub Pages ne supporte **que les fichiers statiques** (HTML, CSS, JavaScript). PHP nécessite un serveur PHP pour fonctionner. 

### Version disponible:
- **Version React (Statique)** ✅ Fonctionne sur GitHub Pages
  - Accès: https://gato2fraises.github.io/Site-Aurora-Risk/
  
- **Version PHP (Dynamique)** ✅ Fonctionne localement uniquement
  - Nécessite un serveur PHP local

## 🚀 Exécution Locale avec PHP

### Option 1: PHP Built-in Server (Recommandé)

```bash
cd "c:\Users\Gato2\Documents\Site Web\aurora risk"
php -S localhost:8000
```

Puis ouvrez: http://localhost:8000

### Option 2: XAMPP/WAMP/MAMP

1. **Téléchargez XAMPP** (Apache + PHP)
   - https://www.apachefriends.org/

2. **Installez et lancez XAMPP**

3. **Placez les fichiers dans htdocs:**
   ```
   C:\xampp\htdocs\aurora-risk\
   ```

4. **Accédez à:** http://localhost/aurora-risk/

### Option 3: Visual Studio Code avec PHP Server Extension

1. Installez l'extension "PHP Server" dans VS Code
2. Clic droit sur `index.php` → "Open with PHP Server"
3. Votre navigateur s'ouvre automatiquement

## 📁 Structure des fichiers PHP

```php
config.php          # Configuration et classe InterventionManager
index.php          # Application PHP complète
.htaccess          # Configuration Apache (URL routing)
```

## ✨ Fonctionnalités de la version PHP

- ✅ Navigation entre pages (Accueil, Interventions, À Propos, Contact)
- ✅ Gestion des interventions de crise
- ✅ Filtrage par statut (Critique, Majeure)
- ✅ Recherche d'interventions
- ✅ Statistiques en temps réel
- ✅ Design responsive
- ✅ Animations et effets visuels

## 🔄 Vue d'ensemble: React vs PHP

### React (Actuellement sur GitHub Pages)
- ✅ Fonctionne sur GitHub Pages
- ✅ Application client-side moderne
- ✅ Interactivité avancée
- ✅ Accessible en ligne
- ❌ Nécessite build/compilation

### PHP (Disponible en local)
- ✅ Logique serveur côté backend
- ✅ Pas de build nécessaire
- ✅ Structure classique MVC-like
- ✅ Facile à modifier
- ❌ Nécessite un serveur PHP
- ❌ Ne fonctionne pas sur GitHub Pages

## 📝 Commandes utiles

### Démarrer le serveur PHP
```bash
php -S localhost:8000
```

### Vérifier la version PHP
```bash
php -v
```

### Arrêter le serveur
- <Ctrl+C> dans le terminal

## 🔧 Modification de la configuration

Éditez `config.php` pour:
- Ajouter/modifier des interventions
- Changer les statistiques
- Modifier les informations de contact
- Ajouter de nouvelles pages

## 🌐 Déploiement en Production

Pour déployer la version PHP en production, vous avez besoin d'un hébergement avec support PHP:

Exemples d'hébergement PHP:
- OVH
- Hostinger
- DigitalOcean
- AWS Lightsail
- Heroku (avec ajustements)
- Vercel (ne supporte pas PHP nativement)

## 💡 Notes importantes

1. **GitHub Pages** ne supporte que les fichiers statiques
2. **PHP** nécessite un serveur web
3. **SQL Database** n'est pas utilisée (données en mémoire)
4. Pour un vrai projet, utilisez MySQL/PostgreSQL

## ❓ Questions Fréquentes

**Q: Pourquoi pas PHP sur GitHub Pages?**
A: GitHub Pages n'exécute que du contenu statique. PHP nécessite un serveur.

**Q: Puis-je utiliser React et PHP ensemble?**
A: Oui! React peut faire des appels API à un backend PHP.

**Q: Comment ajouter une base de données?**
A: Modifiez `config.php` pour utiliser PDO avec MySQL/PostgreSQL.

---

Pour questions ou support: ops@aurora-crisis.org

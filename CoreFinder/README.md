# VP_CoreFinder

**Moteur de recherche avancé pour Magento 2, totalement indépendant, performant, personnalisable, avec facettes dynamiques, suggestions, corrections et IA embarquée ONNX.**

---

## 🏗️ Installation

1. Placez le dossier `CoreFinder` dans `app/code/VP/`.
2. Activez le module :
    ```bash
    php bin/magento module:enable VP_CoreFinder
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile
    php bin/magento cache:flush
    ```
3. (Optionnel, IA) Depuis le BO, cliquez sur "Télécharger le modèle IA ONNX" ou placez `vp_search.onnx` dans `var/corefinder/`.

---

## ⚙️ Configuration

- **Stores > Configuration > VP CoreFinder**
  - Activer/désactiver le module
  - Nombre max de suggestions
  - Activer l’IA embarquée
  - Téléchargement du modèle IA ONNX en un clic

- **Gestion des facettes** : menu admin "Facettes CoreFinder"
  - Ajout/suppression/ordre/drag&drop
  - Type d’affichage (case à cocher, slider, dropdown)
  - Thème visuel (couleur HEX, icône)
  - Activation/désactivation individuelle

---

## 🔍 Fonctionnalités principales

- Indexation rapide & interne des produits/catalogue
- Navigation à facettes dynamique, AJAX, responsive
- Support multiboutique et multilingue
- Suggestions de recherche et corrections IA embarquée (ONNX)
- Migration possible depuis Algolia (voir commandes CLI)
- Réindexation automatique (cron) ou manuelle (CLI)
- 100% customisable, sans dépendance à un service tiers

---

## 🧠 IA embarquée

- Téléchargement du modèle ONNX automatique depuis Hugging Face
- Inférence locale en PHP (ext. FFI)
- Suggestions, corrections, auto-apprentissage possible (cron)
- Personnalisable via vos propres modèles (format ONNX)

---

## 🛠️ Outils CLI

- `php bin/magento corefinder:reindex` : réindexe tout le catalogue CoreFinder

---

## 🚦 Migration depuis Algolia

- Export des données Algolia : `php bin/magento corefinder:algolia:export`
- Import et mapping vers CoreFinder : `php bin/magento corefinder:algolia:migrate`
- Support JSON, CSV

---

## 📝 Documentation

- Voir le dossier `/docs` ou contactez marc-antoine@viking-production.fr pour des guides avancés.

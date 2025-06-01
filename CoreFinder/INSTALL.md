# Guide d’installation VP_CoreFinder

## 1. Prérequis

- Magento 2.4.7+ (compatible toutes versions PHP >=7.4)
- Accès SSH à votre serveur
- Ext. PHP FFI activée (pour IA ONNX)

## 2. Installation du module

# Placez le dossier CoreFinder dans app/code/VP/
cd /chemin/vers/magento/
php bin/magento module:enable VP_CoreFinder
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush

## 3. (Optionnel) Activer l’IA embarquée ONNX
  
  Rendez-vous dans le back-office, section Stores > Configuration > VP CoreFinder
    Cliquez sur le bouton Télécharger le modèle IA ONNX
    Ou placez manuellement le fichier vp_search.onnx dans var/corefinder/

NB : Pour l’inférence IA locale, activez FFI (dans php.ini : extension=ffi).

## 4. Gestion des facettes

  Accédez au menu BO Marketing > Facettes CoreFinder
  Ajoutez/éditez/supprimez les facettes selon vos besoins

## 5. Réindexation

  Automatique via cron (configuré à l’installation)
  Manuelle : php bin/magento corefinder:reindex

## 6. Migration Algolia (optionnel)

    php bin/magento corefinder:algolia:export
    php bin/magento corefinder:algolia:migrate

Support : contact@viking-production.fr

#!/bin/bash
# Module : VP_CoreFinder
# Fichier : tools/install_onnx_php.sh
# Rôle : Script Bash d’installation de l’extension PHP ONNX Runtime + création du dossier pour le modèle IA
# Auteur : Auzoult Marc-Antoine
# Date : 2025-06-01

set -e

echo ">> Installation de l'extension PHP ONNX Runtime (FFI)"
if ! php -m | grep -q 'ffi'; then
    echo "PHP FFI n'est pas activé, tentative d'installation automatique..."
    if [ -f /etc/php/$(php -r 'echo PHP_MAJOR_VERSION.".".PHP_MINOR_VERSION;')/cli/php.ini ]; then
        echo "extension=ffi" >> /etc/php/$(php -r 'echo PHP_MAJOR_VERSION.".".PHP_MINOR_VERSION;')/cli/php.ini
    else
        echo "Veuillez activer l'extension FFI dans votre php.ini manuellement."
        exit 1
    fi
fi

echo ">> Création du dossier var/corefinder pour le modèle IA"
mkdir -p var/corefinder

echo ">> Téléchargement du modèle ONNX"
wget -O var/corefinder/vp_search.onnx https://huggingface.co/datasets/VP-AI/onnx-models/resolve/main/vp_search.onnx

echo ">> Installation terminée."

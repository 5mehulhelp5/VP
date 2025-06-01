<?php
/**
 * Module : VP_CoreFinder
 * Fichier : Controller/Adminhtml/System/DownloadModel.php
 * Rôle : Téléchargement automatique du modèle ONNX depuis Hugging Face vers var/corefinder/
 * Auteur : Auzoult Marc-Antoine
 * Date : 2025-06-01
 */

namespace VP\CoreFinder\Controller\Adminhtml\System;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Message\ManagerInterface;

class DownloadModel extends Action
{
    protected $resultRedirectFactory;
    protected $fileIo;
    protected $directoryList;
    protected $messageManager;

    public function __construct(
        Action\Context $context,
        RedirectFactory $resultRedirectFactory,
        File $fileIo,
        DirectoryList $directoryList,
        ManagerInterface $messageManager
    ) {
        parent::__construct($context);
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->fileIo = $fileIo;
        $this->directoryList = $directoryList;
        $this->messageManager = $messageManager;
    }

    public function execute()
    {
        $url = 'https://huggingface.co/datasets/VP-AI/onnx-models/resolve/main/vp_search.onnx';
        $varPath = $this->directoryList->getPath(DirectoryList::VAR_DIR);
        $targetDir = $varPath . '/corefinder';
        $targetFile = $targetDir . '/vp_search.onnx';

        try {
            $this->fileIo->checkAndCreateFolder($targetDir);
            $result = $this->fileIo->read($url);
            $this->fileIo->write($targetFile, $result, 0666);
            $this->messageManager->addSuccessMessage(__('Le modèle IA ONNX a été téléchargé avec succès.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Échec du téléchargement du modèle : ') . $e->getMessage());
        }

        return $this->resultRedirectFactory->create()->setPath('adminhtml/system_config/edit/section/corefinder');
    }
}

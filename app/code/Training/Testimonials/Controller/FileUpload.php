<?php

namespace Training\Testimonials\Controller;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;

class FileUpload extends Action
{
    protected $fileSystem;

    protected $uploaderFactory;

    protected $allowedExtensions = ['csv']; // to allow file upload types 

    protected $fileId = 'file_upload'; // name of the input file box  

    public function __construct(
        Action\Context $context,
        Filesystem $fileSystem,
        UploaderFactory $uploaderFactory
    ) {
        $this->fileSystem = $fileSystem;
        $this->uploaderFactory = $uploaderFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $destinationPath = $this->getDestinationPath();

        try {
            $uploader = $this->uploaderFactory->create(['fileId' => $this->fileId])
                ->setAllowCreateFolders(true)
                ->setAllowedExtensions($this->allowedExtensions)
                ->addValidateCallback('validate', $this, 'validateFile');
            if (!$uploader->save($destinationPath)) {
                throw new LocalizedException(
                    __('File cannot be saved to path: $1', $destinationPath)
                );
            }

            // @todo
            // process the uploaded file
        } catch (\Exception $e) {
            $this->messageManager->addError(
                __($e->getMessage())
            );
        }
    }
    
    public function validateFile($filePath)
    {
        // @todo
        // your custom validation code here
    }

    public function getDestinationPath()
    {
        return $this->fileSystem
            ->getDirectoryWrite(DirectoryList::TMP)
            ->getAbsolutePath('/');
    }
}
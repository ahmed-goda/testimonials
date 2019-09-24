<?php

namespace Bytology\CLI\Console\Command;

use Symfony\Component\Console\{ Command\Command,
                                Input\InputArgument,
                                Input\InputInterface,
                                Output\OutputInterface
                            };

use Magento\Framework\{Module\FullModuleList, App\Action\Context};

class CheckActive extends Command
{
    protected $fullModuleList;

    /**
     * Class Constructor
     *
     * @param FullModuleList $fullModuleList
     */
    public function __construct(FullModuleList $fullModuleList, Context $context) {
        $this->fullModuleList = $fullModuleList;
        parent::__construct();
    }

    public function configure()
    {
        $this->setName('check-active')
            ->setDescription('The Command Dsplays A List Of All Active Modules To The STD')
            ->setAliases(['c-a']);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $moduleList = $objectManager->create(\Magento\Framework\Module\ModuleList::class);
        $output->writeln('<info>List of enabled modules:</info>');
        $enabledModules = $moduleList->getNames();
        if (count($enabledModules) === 0) {
            $output->writeln('None');
        } else {
            $output->writeln(join("\n", $enabledModules));
        }
        $output->writeln('');
    }
}
<?php

namespace Bytology\CLI\Console\Command;

use Symfony\Component\Console\{ Command\Command,
                                Input\InputArgument,
                                Input\InputInterface,
                                Output\OutputInterface
                            };

class Greeting extends Command
{
    public function configure()
    {
        $this->setName('greeting')
            ->setDescription('The Command Just Prints <Hello> To The STD')
            ->setAliases(['g:h']);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello');
    }
}
<?php

namespace App\Command;

use App\Client\ParkClient;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DisneyCommand extends Command
{
    protected static $defaultName = 'app:disney';
    private $parkClient;

    public function __construct(ParkClient $parkClient)
    {
        $this->parkClient = $parkClient;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setDescription('Save current AttractionTimes');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        $this->parkClient->refreshAndSave();

        $symfonyStyle->success('Sucess');
    }
}

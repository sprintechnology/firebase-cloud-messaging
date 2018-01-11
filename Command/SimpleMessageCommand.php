<?php

namespace Firebase\Bundle\CloudMessagingBundle\Command;

use Firebase\Bundle\CloudMessagingBundle\Http\Request;
use Firebase\Bundle\CloudMessagingBundle\Http\Request\AndroidNotification;
use Firebase\Bundle\CloudMessagingBundle\Http\Request\IOSNotification;
use Firebase\Bundle\CloudMessagingBundle\Http\Request\WebNotification;
use Firebase\Bundle\CloudMessagingBundle\Service\FCMService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Stopwatch\Stopwatch;

class SimpleMessageCommand extends Command
{
    /** @var  FCMService */
    protected $fcmService;

    public function __construct(FCMService $fcmService)
    {
        $this->fcmService = $fcmService;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('firebase:cloud_message:simple_message')
            ->setDescription('This command will send message to one or more devices.')
            ->addArgument('title', InputArgument::REQUIRED, 'Title of message sent.')
            ->addArgument('body', InputArgument::REQUIRED, 'Body of message sent.')
            ->addArgument('type', InputArgument::REQUIRED, 'Type of notification (IOS, ANDROID, WEB)')
            ->addArgument('tokens', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'firebase tokens separated by space');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $watch = new Stopwatch();
        $time = $watch->start('command.execute');
        $time->lap();
        $output->writeln(sprintf('Command is starting ... (%ss - %sMb)', round($time->getDuration() / 1000), round($time->getMemory() / 1024 / 1024)), Output::OUTPUT_NORMAL | Output::VERBOSITY_DEBUG);

        $title = $input->getArgument('title');
        $body = $input->getArgument('body');
        $type = $input->getArgument('type');
        $tokens = $input->getArgument('tokens');


        switch ($type) {
            case 'IOS':
                $notification = new IOSNotification();
                break;
            case 'ANDROID':
                $notification = new AndroidNotification();
                break;
            case 'WEB':
                $notification = new WebNotification();
                break;
        }

        $notification->setTitle($title);
        $notification->setBody($body);

        $request = new Request();
        $request->setRegistrationIds($tokens);
        $request->setNotification($notification);

        $result = $this->fcmService->send($request);
    }
}

<?php

namespace Botble\Ecommerce\Commands;

use Throwable;
use OrderHelper;
use Botble\Base\Supports\EmailHandler;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use NaeemAwan\PredefinedLists\Repositories\Interfaces\BoatEnquiryInterface;

#[AsCommand('cms:saved-boats:email', 'Send emails saved boats')]
class SendSavedBoatsEmailCommand extends Command
{
    protected BoatEnquiryInterface $boatenquiryRepository;

    public function __construct(BoatEnquiryInterface $boatenquiryRepository)
    {
        parent::__construct();

        $this->boatenquiryRepository = $boatenquiryRepository;
    }

    public function handle()
    {
        $boat_enquiries = $this->boatenquiryRepository->getModel()
            ->with(['boat', 'customer', 'details'])
            ->where('is_finished', 0)
            ->get();

        $count = 0;

        foreach ($boat_enquiries as $boat_enquiry) {
            $email = $boat_enquiry->customer->email;

            if (! $email) {
                continue;
            }

            try {
                $mailer = new EmailHandler();
                $mailer->setModule('ecommerce')
                    ->setTemplate('saved_boat_email')
                    ->setVariableValue('customer_name', $boat_enquiry->customer->name)
                    ->setVariableValue('customer_email', $email)
                    ->setVariableValue('boat_title', $boat_enquiry->boat->ltitle)
                    ->setVariableValue('total_price', $boat_enquiry->total_price)
                    ->setVariableValue('vat_total', $boat_enquiry->vat_total);
                
                $mailer->sendUsingTemplate('saved_boat_email', $email);
                
                $count++;
            } catch (Throwable $exception) {
                info($exception->getMessage());

                return self::FAILURE;
            }
        }

        $this->info('Sent ' . $count . ' email' . ($count != 1 ? 's' : '') . ' successfully!');

        return self::SUCCESS;
    }
}

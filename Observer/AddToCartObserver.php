<?php

namespace AumTechnolabs\NewsletterToQuote\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class AddToCartObserver implements ObserverInterface
{
    protected $logger;
    protected $customerSession;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        LoggerInterface $logger
    ) {
        $this->customerSession = $customerSession;
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        try {
            // Only for guests
            if ($this->customerSession->isLoggedIn()) {
                return;
            }

            $email = $this->customerSession->getNewsletterGuestEmail();
            if (!$email) {
                return;
            }

            $quote = $observer->getQuoteItem()->getQuote();

            // Update customer_email field of quote
            if (!$quote->getCustomerEmail()) {
                $quote->setCustomerEmail($email);
            }
        } catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
        }
    }
}

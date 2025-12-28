<?php

namespace AumTechnolabs\NewsletterToQuote\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class NewsletterSubscribeObserver implements ObserverInterface
{
    protected $checkoutSession;
    protected $customerSession;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->checkoutSession  = $checkoutSession;
        $this->customerSession  = $customerSession;
    }

    public function execute(Observer $observer)
    {
        // Only for guests
        if ($this->customerSession->isLoggedIn()) {
            return;
        }

        $subscriber = $observer->getSubscriber();
        if (!$subscriber) {
            return;
        }

        $email = $subscriber->getSubscriberEmail();
        if (!$email) {
            return;
        }

        // Save email to checkout session
        $this->customerSession->setNewsletterGuestEmail($email);
    }
}

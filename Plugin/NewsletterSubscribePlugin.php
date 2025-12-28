<?php

namespace AumTechnolabs\NewsletterToQuote\Plugin;

class NewsletterSubscribePlugin
{
    protected $checkoutSession;
    protected $customerSession;
    protected $logger;
    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Customer\Model\Session $customerSession,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->checkoutSession  = $checkoutSession;
        $this->customerSession  = $customerSession;
        $this->logger = $logger;
    }

    public function afterSubscribe(\Magento\Newsletter\Model\SubscriptionManager $subject, $subscriber)
    {
        try {
            // Only for guests
            if ($this->customerSession->isLoggedIn()) {
                return $subscriber;
            }
            $email = $subscriber->getSubscriberEmail();

            // Save email to checkout session
            $this->customerSession->setNewsletterGuestEmail($email);
            $quote = $this->checkoutSession->getQuote();
            if ($quote && empty($quote->getCustomerEmail())) {
                $quote->setCustomerEmail($email);
                $quote->save();
            }
        } catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
        }

        return $subscriber;
    }
}

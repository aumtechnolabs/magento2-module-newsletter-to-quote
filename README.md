# Newsletter to Quote — Magento 2 module by Aum Technolabs

Convert newsletter subscribers into Magento quote records for abandoned-cart outreach.

This lightweight Magento 2 extension automatically attaches a subscriber's email to the active quote when a subscribed user attempts to add a product to cart. The captured email can then be used by marketing and automation systems to send targeted abandoned cart reminders and recover lost revenue.

Key benefits

- Improves abandoned cart recovery by linking newsletter subscribers to quotes.
- Simple, non-intrusive integration with Magento 2 events and quote system.
- Lightweight and compatible with standard Magento 2 stores — ideal for marketing automation.

Features

- On newsletter subscription + add-to-cart, saves the subscriber email to the `quote` table.
- Works using Magento 2 observers/plugins — no core hacks.
- Ready data for abandoned-cart email campaigns and third-party marketing tools.

Installation

Manual installation (module folder):

1. Copy the module folder into `app/code/AumTech/NewsletterToQuote` (or keep existing vendor/module structure).
2. Run the Magento CLI commands:

```bash
php bin/magento module:enable AumTech_NewsletterToQuote
php bin/magento setup:upgrade
php bin/magento cache:flush
```

If installed via Composer, use your normal Composer workflow and run `setup:upgrade` and `cache:flush` after installation.

Configuration

This module works out-of-the-box and requires no additional admin configuration. Captured emails are stored in the Magento `quote` table where they can be read by custom scripts, observers, or third-party integrations responsible for sending abandoned cart emails.

Usage

- A visitor subscribes to the newsletter.
- The same visitor attempts to add a product to cart.
- The module adds the subscribed email to the current quote record.
- Use this email field to power abandoned-cart messaging via your ESP or automation tool.

Compatibility

- Magento 2.x (tested on common 2.x releases). Report any compatibility issues via GitHub issues.

SEO & Integration Notes

- Ideal keywords: Magento 2 abandoned cart, newsletter to quote, recover abandoned carts, capture subscriber email, Magento quote email.
- Integrates seamlessly with marketing platforms that read quote/customer data for automation.

Support & Contribution

For issues, feature requests, or contributions, please open an issue or a pull request in this repository. Contributions and suggestions are welcome — please follow standard GitHub forking and PR workflow.

About Aum Technolabs

This module is developed and maintained by Aum Technolabs — ecommerce and Magento experts focused on conversion-driven extensions and customizations.

License

Distributed under the repository license. See `LICENSE` for details.

Files

- See the module entry files and observers in the repository root and `Observer/`, `Plugin/` folders for implementation details.

Keywords: Magento 2, abandoned cart, newsletter subscriber, quote, email capture, Aum Technolabs

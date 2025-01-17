<?php declare(strict_types=1);

namespace Shopware\Core\Checkout\Payment\Cart\Error;

use Shopware\Core\Checkout\Cart\Error\Error;

/**
 * @package checkout
 */
class PaymentMethodBlockedError extends Error
{
    private const KEY = 'payment-method-blocked';

    /**
     * @var string
     */
    private $name;

    public function __construct(string $name, ?string $reason = null)
    {
        $this->name = $name;

        $this->message = sprintf(
            'Payment method %s not available. Reason: %s',
            $name,
            $reason
        );

        parent::__construct($this->message);
    }

    public function getParameters(): array
    {
        return ['name' => $this->name];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return sprintf('%s-%s', self::KEY, $this->name);
    }

    public function getMessageKey(): string
    {
        return self::KEY;
    }

    public function getLevel(): int
    {
        return self::LEVEL_WARNING;
    }

    public function blockOrder(): bool
    {
        return true;
    }

    public function isPersistent(): bool
    {
        return false;
    }
}

<?php declare(strict_types=1);

namespace Shopware\Administration\Notification\Exception;

use Shopware\Core\Framework\ShopwareHttpException;
use Symfony\Component\HttpFoundation\Response;

/**
 * @package administration
 */
class NotificationThrottledException extends ShopwareHttpException
{
    private int $waitTime;

    public function __construct(int $waitTime, ?\Throwable $e = null)
    {
        $this->waitTime = $waitTime;

        parent::__construct(
            'Notification throttled for {{ seconds }} seconds.',
            ['seconds' => $this->waitTime],
            $e
        );
    }

    public function getErrorCode(): string
    {
        return 'FRAMEWORK__NOTIFICATION_THROTTLED';
    }

    public function getStatusCode(): int
    {
        return Response::HTTP_TOO_MANY_REQUESTS;
    }

    public function getWaitTime(): int
    {
        return $this->waitTime;
    }
}

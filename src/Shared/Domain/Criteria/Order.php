<?php

declare(strict_types=1);

namespace Cal\Shared\Domain\Criteria;

final class Order
{
    private $orderBy;
    private $orderType;

    public function __construct(OrderBy $orderBy, OrderType $orderType)
    {
        $this->orderBy = $orderBy;
        $this->orderType = $orderType;
    }

    public static function createDesc(OrderBy $orderBy): self
    {
        return new self($orderBy, OrderType::desc());
    }

    public function orderBy(): OrderBy
    {
        return $this->orderBy;
    }

    public function orderType(): OrderType
    {
        return $this->orderType;
    }

    public static function fromValues(?string $orderBy, ?string $order): self
    {
        return null === $orderBy ? self::none() : new self(new OrderBy($orderBy), new OrderType($order));
    }

    public function isNone(): bool
    {
        return $this->orderType()->isNone();
    }

    public static function none(): self
    {
        return new self(new OrderBy(''), OrderType::none());
    }

    public function serialize(): string
    {
        return sprintf('%s.%s', $this->orderBy->value(), $this->orderType->value());
    }
}

<?php

namespace AsyncAws\Athena\ValueObject;

use AsyncAws\Core\Exception\InvalidArgument;

/**
 * Contains information about whether the result of a previous query was reused.
 */
final class ResultReuseInformation
{
    /**
     * True if a previous query result was reused; false if the result was generated from a new run of the query.
     *
     * @var bool
     */
    private $reusedPreviousResult;

    /**
     * @param array{
     *   ReusedPreviousResult: bool,
     * } $input
     */
    public function __construct(array $input)
    {
        $this->reusedPreviousResult = $input['ReusedPreviousResult'] ?? $this->throwException(new InvalidArgument('Missing required field "ReusedPreviousResult".'));
    }

    /**
     * @param array{
     *   ReusedPreviousResult: bool,
     * }|ResultReuseInformation $input
     */
    public static function create($input): self
    {
        return $input instanceof self ? $input : new self($input);
    }

    public function getReusedPreviousResult(): bool
    {
        return $this->reusedPreviousResult;
    }

    /**
     * @return never
     */
    private function throwException(\Throwable $exception)
    {
        throw $exception;
    }
}

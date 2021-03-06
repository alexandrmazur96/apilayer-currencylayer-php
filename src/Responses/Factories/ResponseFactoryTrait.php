<?php

namespace Apilayer\Currencylayer\Responses\Factories;

use Apilayer\Currencylayer\Exceptions\ApiFailedResponseException;

/**
 * @psalm-import-type _ApiFailed from \Apilayer\Currencylayer\CurrencylayerClient
 * @psalm-template T
 */
trait ResponseFactoryTrait
{
    /**
     * @throws ApiFailedResponseException
     *
     * @psalm-param T $rawResponse
     */
    private function validate(array $rawResponse): void
    {
        if (!isset($rawResponse['success'])) {
            /** @psalm-var array $rawResponse */
            throw new ApiFailedResponseException(
                sprintf(
                    'Unexpected response from currencylayer API - %s',
                    json_encode($rawResponse)
                ),
                0,
                null,
                $rawResponse
            );
        }

        if (!$rawResponse['success']) {
            /** @psalm-var _ApiFailed $rawResponse */
            throw new ApiFailedResponseException(
                $rawResponse['error']['info'],
                (int)$rawResponse['error']['code'],
                null,
                $rawResponse
            );
        }
    }
}

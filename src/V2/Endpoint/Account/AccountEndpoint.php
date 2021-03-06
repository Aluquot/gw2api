<?php

namespace GW2Treasures\GW2Api\V2\Endpoint\Account;

use GW2Treasures\GW2Api\GW2Api;
use GW2Treasures\GW2Api\V2\Authentication\AuthenticatedEndpoint;
use GW2Treasures\GW2Api\V2\Authentication\IAuthenticatedEndpoint;
use GW2Treasures\GW2Api\V2\Endpoint;

class AccountEndpoint extends Endpoint implements IAuthenticatedEndpoint {
    use AuthenticatedEndpoint;

    public function __construct( GW2Api $api, $apiKey ) {
        parent::__construct( $api );

        $this->apiKey = $apiKey;
    }


    /**
     * {@inheritdoc}
     */
    public function url() {
        return 'v2/account';
    }

    /**
     * Get your basic account info.
     *
     * @deprecated since 1.5.0
     * @return mixed
     */
    public function info() {
        return $this->get();
    }

    /**
     * Get your basic account info.
     *
     * @return mixed
     */
    public function get() {
        return $this->request()->json();
    }

    /**
     * Get the account bank.
     *
     * @return BankEndpoint
     */
    public function bank() {
        return new BankEndpoint( $this->api, $this->apiKey );
    }

    /**
     * Get a list of all unlocked dyes (ids).
     *
     * @return DyeEndpoint
     */
    public function dyes() {
        return new DyeEndpoint( $this->api, $this->apiKey );
    }

    /**
     * Get the account material storage.
     *
     * @return MaterialEndpoint
     */
    public function materials() {
        return new MaterialEndpoint( $this->api, $this->apiKey );
    }

    /**
     * Get the unlocked skins.
     *
     * @return SkinEndpoint
     */
    public function skins() {
        return new SkinEndpoint( $this->api, $this->apiKey );
    }

    /**
     * Get the account wallet.
     *
     * @return WalletEndpoint
     */
    public function wallet()  {
        return new WalletEndpoint( $this->api, $this->apiKey );
    }
}

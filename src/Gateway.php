<?php namespace Omnipay\VtcPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\VtcPay\Traits\ParamsAccessorMutatorTrait;

/**
 * The Gateway class
 *
 * @package omnipay-vtcpay
 * @author Jackie Do <anhvudo@gmail.com>
 * @copyright 2018
 * @version $Id$
 * @access public
 * @see https://vtcpay.vn/tai-lieu-tich-hop-website
 */
class Gateway extends AbstractGateway
{
    use ParamsAccessorMutatorTrait;

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     *
     * @return string
     */
    public function getName()
    {
        return 'VtcPay';
    }

    /**
     * Define gateway parameters, in the following format:
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'receiver_account' => '',
            'website_id'       => '',
            'security_code'    => '',
            'testMode'         => false,
        ];
    }

    /**
     * Create a payment request for an invoice.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\VtcPay\Message\PurchaseRequest
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\VtcPay\Message\PurchaseRequest', $parameters);
    }

    /**
     * Create a request to check the status of payment after purchase based
     * on the parameters returned on the browser.
     *
     * This function is usually executed on the return page provided to
     * VtcPay.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\VtcPay\Message\CompletePurchaseRequest
     */
    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\VtcPay\Message\CompletePurchaseRequest', $parameters);
    }

    /**
     * Create a request to accept notification over server-to-server.
     *
     * This function is usually at IPN Url.
     *
     * @param  array $parameters
     *
     * @return \Omnipay\VtcPay\Message\AcceptNotificationRequest
     */
    public function acceptNotification(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\VtcPay\Message\AcceptNotificationRequest', $parameters);
    }
}

<?php namespace Omnipay\VtcPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * The CompletePurchaseRequest class
 *
 * @package omnipay-vtcpay
 * @author Jackie Do <anhvudo@gmail.com>
 * @copyright 2018
 * @version $Id$
 * @access public
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * Collect data for sending to gateway
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->httpRequest->query->all();

        if (empty($data)) {
            throw new InvalidRequestException('Can not find any query parameter on your URL');
        }

        return $data;
    }
}

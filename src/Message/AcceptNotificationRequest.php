<?php namespace Omnipay\VtcPay\Message;

/**
 * The AcceptNotificationRequest class
 *
 * @package omnipay-vtcpay
 * @author Jackie Do <anhvudo@gmail.com>
 * @copyright 2018
 * @version $Id$
 * @access public
 */
class AcceptNotificationRequest extends AbstractRequest
{
    /**
     * Collect data for sending to gateway
     *
     * @return array
     */
    public function getData()
    {
        return $this->httpRequest->request->all();
    }
}

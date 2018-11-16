<?php namespace Omnipay\VtcPay\Traits;

/**
 * The ParamsAccessorMutatorTrait trait
 *
 * @package omnipay-vtcpay
 * @author Jackie Do <anhvudo@gmail.com>
 * @copyright 2018
 * @version $Id$
 * @access public
 */
trait ParamsAccessorMutatorTrait
{
    /**
     * Get value of the receiver_account parameter
     *
     * @return string
     */
    public function getReceiverAccount()
    {
        return $this->getParameter('receiver_account');
    }

    /**
     * Set value of the receiver_account parameter
     *
     * @param  string $value
     *
     * @return $this
     */
    public function setReceiverAccount($value)
    {
        return $this->setParameter('receiver_account', $value);
    }

    /**
     * Get the value of the website_id parameter
     *
     * @return integer
     */
    public function getWebsiteId()
    {
        return $this->getParameter('website_id');
    }

    /**
     * Set the value of the website_id parameter
     *
     * @param  integer $value
     *
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setParameter('website_id', $value);
    }

    /**
     * Alias of the getWebsiteId() method
     *
     * @return integer
     */
    public function getWebId()
    {
        return $this->getWebsiteId();
    }

    /**
     * Alias of the setWebsiteId() method
     *
     * @param  integer $value
     *
     * @return $this
     */
    public function setWebId($value)
    {
        return $this->setWebsiteId($value);
    }

    /**
     * Get the value of the security_code parameter
     *
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->getParameter('security_code');
    }

    /**
     * Set the value of the security_code parameter
     *
     * @param  string $value
     *
     * @return $this
     */
    public function setSecurityCode($value)
    {
        return $this->setParameter('security_code', $value);
    }
}

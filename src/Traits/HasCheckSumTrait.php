<?php namespace Omnipay\VtcPay\Traits;

/**
 * The HasCheckSumTrait trait
 *
 * @package omnipay-vtcpay
 * @author Jackie Do <anhvudo@gmail.com>
 * @copyright 2018
 * @version $Id$
 * @access public
 */
trait HasCheckSumTrait
{
    /**
     * Store checksum string
     *
     * @var string
     */
    protected $checkSum;

    /**
     * Get chechsum string
     *
     * @return string
     */
    protected function getCheckSum()
    {
        return $this->checkSum;
    }

    /**
     * Store checksum string
     *
     * @param  array        $data
     * @param  null|string  $secure_secret
     *
     * @return $this
     */
    protected function setCheckSum(array $data = [], $secure_secret = null)
    {
        $this->checkSum = $this->createCheckSum($data, $secure_secret);

        return $this;
    }

    /**
     * Generate a computed hash string for checksum
     *
     * @param  array        $data
     * @param  null|string  $secure_secret
     *
     * @return null|string
     */
    protected function createCheckSum(array $data = [], $secure_secret = null)
    {
        if (isset($secure_secret)) {
            // Remove element with key signature out of from $data if exists
            unset($data['signature']);

            // Arrange array data a-z before make a hash
            ksort($data);

            return strtoupper(hash('sha256', implode('|', $data) . '|' . $secure_secret));
        }

        return null;
    }
}

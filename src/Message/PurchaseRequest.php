<?php namespace Omnipay\VtcPay\Message;

/**
 * The PurchaseRequest class
 */
/**
 * The PurchaseRequest class
 *
 * @package omnipay-vtcpay
 * @author Jackie Do <anhvudo@gmail.com>
 * @copyright 2018
 * @version $Id$
 * @access public
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Collect data for sending to gateway
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->getBaseData();

        $rules = [
            'reference_number' => [
                'nullable' => true,
                'required' => true,
                'iso_latin_alpha_dash' => true
            ],
            'amount' => [
                'required' => true,
                'numeric' => true
            ],
            'currency' => [
                'required' => true,
                'in' => ['VND', 'USD']
            ],
            'payment_type' => [
                'nullable' => true,
                'required' => true,
                'in' => ['VTCPay', 'DomesticBank', 'InternationalCard']
            ],
            'url_return' => [
                'nullable' => true,
                'required' => true,
                'url' => true
            ],
            'language' => [
                'nullable' => true,
                'required' => true,
                'in' => ['vi', 'en']
            ],
            'bill_to_forename' => [
                'nullable' => true,
                'required' => true
            ],
            'bill_to_surname' => [
                'nullable' => true,
                'required' => true
            ],
            'bill_to_address' => [
                'nullable' => true,
                'required' => true
            ],
            'bill_to_address_city' => [
                'nullable' => true,
                'required' => true
            ],
            'bill_to_email' => [
                'nullable' => true,
                'required' => true,
                'email' => true
            ],
            'bill_to_phone' => [
                'nullable' => true,
                'required' => true
            ],
        ];

        $this->validateWithRules($rules);

        $data['transaction_type'] = 'sale';
        $data['reference_number'] = $this->getReferenceNumber() ?: date('YmdHis-') . rand();
        $data['amount']           = $this->getAmount();
        $data['currency']         = $this->getCurrency();

        $nullable = [
            'url_return',
            'language',
            'payment_type',
            'bill_to_forename',
            'bill_to_surname',
            'bill_to_address',
            'bill_to_address_city',
            'bill_to_email',
            'bill_to_phone'
        ];

        foreach ($nullable as $key) {
            $value = $this->getParameter($key);

            if (!empty($value)) {
                $data[$key] = $value;
            }
        }

        $checkSum = $this->createCheckSum($data, $this->getSecurityCode());

        $data['signature'] = $checkSum;

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param  array  $data The data to send
     *
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new RedirectResponse($this, $data);
    }
}

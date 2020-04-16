<?php

namespace Omnipay\BPOINT\Message;

use Omnipay\BPOINT\BPoint;
use Omnipay\Common\Message\AbstractResponse;

/**
 * BPOINT Purchase Response
 */
class PurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return $this->data['APIResponse']['ResponseCode'] == 0;
    }

    public function getRedirectUrl()
    {
      $request = $this->getRequest();
      return BPoint::getBaseUrl($this->getRequest()->getUatMode()) . 'pay/' . $this->getRequest()->getMerchantShortName();
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return array('in_pay_token' => $this->data['AuthKey']);
    }

    /**
     * Description of the response; mostly only relevant in the error case when not redirecting
     */
    public function getMessage()
    {
        return $this->data['APIResponse']['ResponseText'];
    }
}

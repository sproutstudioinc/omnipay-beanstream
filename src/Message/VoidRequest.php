<?php
namespace Omnipay\Beanstream\Message;

class VoidRequest extends AuthorizeRequest
{

    public function getTransId()
    {
        return $this->getParameter('trans_id');
    }

    public function setTransId($value)
    {
        return $this->setParameter('trans_id', $value);
    }

    public function getData()
    {
        $this->validate('amount');
        $data = array();
        $data['amount'] = $this->getAmount();

        return json_encode($data);
    }

    public function getEndpoint()
    {
        return $this->endpoint . '/payments/' . $this->getTransId() . '/void';
    }

}

<?php

namespace TS\Bundle\SiegeCraftBundle\Security\Firewall;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Firewall\ExceptionListener as BaseExceptionListener;

class ExceptionListener extends BaseExceptionListener
{
    protected function setTargetPath(Request $request)
    {
        $request->getSession()->set('_security.target_path', $request->getUri());
    }
}
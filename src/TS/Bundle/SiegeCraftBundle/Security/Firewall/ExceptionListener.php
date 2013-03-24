<?php

namespace TS\Bundle\SiegeCraftBundle\Security\Firewall;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Firewall\ExceptionListener as BaseExceptionListener;

class ExceptionListener extends BaseExceptionListener
{
    protected function setTargetPath(Request $request)
    {
        throw new \Exception('Locale = ' . $request->getLocale() . ' session ' . json_encode($request->getSession()->all()) . ' uri = ' . $request->getUri());
        $request->getSession()->set('_security.target_path', $request->getUri());
    }
}
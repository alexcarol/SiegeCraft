<?php

namespace TS\Bundle\SiegeCraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FortressController extends Controller
{
    /**
     * @Route("/Fortress/")
     * @Template()
     */
    public function FortressAction()
    {
	$nodes = array();

        return array(
            'nodes' => $nodes
        );
    }
}
<?php

namespace TS\Bundle\SiegeCraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FortressNodeController extends Controller
{
    /**
     * @Route("/Fortress/Node/")
     * @Template()
     */
    public function FortressNodeAction()
    {
	$units = array();
	/*
	 * Each of the nodes will have different information depending on the type
	 * so there should be a kind of input saying the position of the node asqued for
	 * and also a service for looking up what kind of node it is.
	 */

        return array(
            'units' => $units
        );
    }
}
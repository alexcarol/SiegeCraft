<?php

namespace TS\Bundle\SiegeCraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $tabs = $this->container->get('siege_craft.service.player_info')->getTabs(1);
        $resources = $this->container->get('siege_craft.service.player_info')->getResources(1);;
        $data = array();
        $buildings = array();
        $technologies = array();
        $units = array();
        $movingUnits = array();

        return array(
            'tabs' => $tabs,
            'player' => array(
                'resources' => $resources,
                'data' => $data,
            ),
            'underConstruction' => array(
                'buildings' => $buildings,
                'technologies' => $technologies,
                'units' => $units,
            ),
            'movingUnits' => $movingUnits,
        );
    }

    /**
     * @Route("/fortress")
     * @Template()
     */
    public function fortressAction()
    {
        $nodes = array();

        return array(
            'nodes' => $nodes
        );
    }

    /**
     * @Route("/fortress/node")
     * @Template()
     */
    public function fortressNodeAction()
    {
        $units = array();
        /*
         * Each of the nodes will have different information depending on the type
         * so there should be a kind of input saying the position of the node asked for
         * and also a service for looking up what kind of node it is.
         */

        return array(
            'units' => $units
        );
    }

    /**
     * @Route("/resources")
     * @Template()
     */
    public function resourcesAction()
    {
        $mines = array();
        /*
         * Each of the mines of the player
         */

        return array(
            'mines' => $mines
        );
    }


    /**
     * @Route("/observatory")
     * @Template()
     */
    public function observatoryAction()
    {
        $regions = array();
        /*
        * Returns all the regions of a section of the map (must get the section from GET)
        */
        return array(
            'regions' => $regions
        );
    }

    /**
     * @Route("/observatory/exploration")
     * @Template()
     */
    public function observatoryExplorationAction()
    {
        $information = array();
        /*
         * Sends the information of an explored node (A message with information)
         * and actualizes the number of explorations left.
         */
        return array(
            'information' => $information
        );
    }
}

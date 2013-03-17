<?php

namespace TS\Bundle\SiegeCraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $userId = $this->getUser()->getId();
        $tabs = $this->container->get('siege_craft.service.player_info')->getTabs($userId);
        $resources = $this->container->get('siege_craft.service.player_info')->getResources($userId);
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
     */
    public function fortressAction()
    {
        $userId = $this->getUser()->getId();
        $nodes = $this->container->get('siege_craft.service.player_info')->getNodes($userId);

        $nodesArray = array();
        foreach ($nodes as $node) {
            $nodesArray[] = [
                'id' => $node->getId(),
                'x'  => $node->getPosX(),
                'y'  => $node->getPosY()
            ];
        }

        return new JsonResponse($nodesArray);
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

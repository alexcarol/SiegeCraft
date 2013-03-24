<?php

namespace TS\Bundle\SiegeCraftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
        $resources = $this->getUser()->getPlayer()->getResources();
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
     * @Method({"GET"})
     */
    public function fortressAction()
    {
        $userId = $this->getUser()->getId();
        $nodes = $this->container->get('siege_craft.service.player_info')->getNodes($userId);

        $nodesArray = array();
        foreach ($nodes as $node) {
            $nodesArray[] = [
                'id'    => $node->getId(),
                'x'     => $node->getPosX(),
                'y'     => $node->getPosY(),
                'units' => $node->getUnits()
            ];
        }

        $response = [
            'nodes' => $nodesArray,
            'info'  => $this->renderView('TSSiegeCraftBundle:json:fortress.html.twig')
        ];

        return new JsonResponse($response);
    }

    /**
     * Each of the nodes will have different information depending on the type
     * so there should be a kind of input saying the position of the node asked for
     * and also a service for looking up what kind of node it is.
     *
     * @Route("/fortress/node/{nodeId}", requirements={"nodeId" = "\d+"})
     * @Template()
     */
    public function fortressNodeAction($nodeId)
    {
        $userId = $this->getUser()->getId();
        $node = $this->container->get('siege_craft.service.player_info')->getNode($userId, $nodeId);

        return array(
            'units' => $node->units
        );
    }

    /**
     * Information about the mines of the player
     *
     * @Route("/resources")
     * @Template()
     */
    public function resourcesAction()
    {
        $mines = array();

        return array(
            'mines' => $mines
        );
    }

    /**
     * Returns all the regions of a section of the map (must get the section from GET)
     *
     * @Route("/observatory")
     * @Template()
     */
    public function observatoryAction()
    {
        $regions = array();

        return array(
            'regions' => $regions
        );
    }

    /**
     * Sends the information of an explored node (A message with information)
     * and updates the number of explorations left.
     *
     * @Route("/observatory/explore/{idNode}", requirements={"idNode" = "\d+"})
     * @Method({"POST"})
     * @Template()
     */
    public function observatoryExploreAction($idNode)
    {
        $information = array();

        return array(
            'information' => $information
        );
    }
}

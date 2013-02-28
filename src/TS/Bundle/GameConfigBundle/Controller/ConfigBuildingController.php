<?php

namespace TS\Bundle\GameConfigBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TS\Bundle\GameConfigBundle\Entity\ConfigBuilding;
use TS\Bundle\GameConfigBundle\Form\ConfigBuildingType;

/**
 * ConfigBuilding controller.
 *
 * @Route("/configbuilding")
 */
class ConfigBuildingController extends Controller
{
    /**
     * Lists all ConfigBuilding entities.
     *
     * @Route("/", name="configbuilding")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TSGameConfigBundle:ConfigBuilding')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ConfigBuilding entity.
     *
     * @Route("/{id}/show", name="configbuilding_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigBuilding')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigBuilding entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new ConfigBuilding entity.
     *
     * @Route("/new", name="configbuilding_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConfigBuilding();
        $form   = $this->createForm(new ConfigBuildingType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new ConfigBuilding entity.
     *
     * @Route("/create", name="configbuilding_create")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigBuilding:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ConfigBuilding();
        $form = $this->createForm(new ConfigBuildingType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configbuilding_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ConfigBuilding entity.
     *
     * @Route("/{id}/edit", name="configbuilding_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigBuilding')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigBuilding entity.');
        }

        $editForm = $this->createForm(new ConfigBuildingType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ConfigBuilding entity.
     *
     * @Route("/{id}/update", name="configbuilding_update")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigBuilding:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigBuilding')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigBuilding entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConfigBuildingType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configbuilding_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ConfigBuilding entity.
     *
     * @Route("/{id}/delete", name="configbuilding_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TSGameConfigBundle:ConfigBuilding')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfigBuilding entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configbuilding'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

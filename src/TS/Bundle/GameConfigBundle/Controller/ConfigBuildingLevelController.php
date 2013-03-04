<?php

namespace TS\Bundle\GameConfigBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TS\Bundle\GameConfigBundle\Entity\ConfigBuildingLevel;
use TS\Bundle\GameConfigBundle\Form\ConfigBuildingLevelType;

/**
 * ConfigBuildingLevel controller.
 *
 * @Route("/buildinglevel")
 */
class ConfigBuildingLevelController extends Controller
{
    /**
     * Lists all ConfigBuildingLevel entities.
     *
     * @Route("/", name="configbuildinglevel")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TSGameConfigBundle:ConfigBuildingLevel')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ConfigBuildingLevel entity.
     *
     * @Route("/{id}/show", name="configbuildinglevel_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigBuildingLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigBuildingLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new ConfigBuildingLevel entity.
     *
     * @Route("/new", name="configbuildinglevel_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConfigBuildingLevel();
        $form   = $this->createForm(new ConfigBuildingLevelType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new ConfigBuildingLevel entity.
     *
     * @Route("/create", name="configbuildinglevel_create")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigBuildingLevel:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ConfigBuildingLevel();
        $form = $this->createForm(new ConfigBuildingLevelType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configbuildinglevel_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ConfigBuildingLevel entity.
     *
     * @Route("/{id}/edit", name="configbuildinglevel_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigBuildingLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigBuildingLevel entity.');
        }

        $editForm = $this->createForm(new ConfigBuildingLevelType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ConfigBuildingLevel entity.
     *
     * @Route("/{id}/update", name="configbuildinglevel_update")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigBuildingLevel:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigBuildingLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigBuildingLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConfigBuildingLevelType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configbuildinglevel_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ConfigBuildingLevel entity.
     *
     * @Route("/{id}/delete", name="configbuildinglevel_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TSGameConfigBundle:ConfigBuildingLevel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfigBuildingLevel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configbuildinglevel'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

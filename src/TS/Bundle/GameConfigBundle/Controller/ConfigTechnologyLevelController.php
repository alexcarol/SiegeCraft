<?php

namespace TS\Bundle\GameConfigBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TS\Bundle\GameConfigBundle\Entity\ConfigTechnologyLevel;
use TS\Bundle\GameConfigBundle\Form\ConfigTechnologyLevelType;

/**
 * ConfigTechnologyLevel controller.
 *
 * @Route("/technologylevel")
 */
class ConfigTechnologyLevelController extends Controller
{
    /**
     * Lists all ConfigTechnologyLevel entities.
     *
     * @Route("/", name="configtechnologylevel")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TSGameConfigBundle:ConfigTechnologyLevel')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ConfigTechnologyLevel entity.
     *
     * @Route("/{id}/show", name="configtechnologylevel_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnologyLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigTechnologyLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new ConfigTechnologyLevel entity.
     *
     * @Route("/new", name="configtechnologylevel_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConfigTechnologyLevel();
        $form   = $this->createForm(new ConfigTechnologyLevelType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new ConfigTechnologyLevel entity.
     *
     * @Route("/create", name="configtechnologylevel_create")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigTechnologyLevel:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ConfigTechnologyLevel();
        $form = $this->createForm(new ConfigTechnologyLevelType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configtechnologylevel_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ConfigTechnologyLevel entity.
     *
     * @Route("/{id}/edit", name="configtechnologylevel_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnologyLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigTechnologyLevel entity.');
        }

        $editForm = $this->createForm(new ConfigTechnologyLevelType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ConfigTechnologyLevel entity.
     *
     * @Route("/{id}/update", name="configtechnologylevel_update")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigTechnologyLevel:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnologyLevel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigTechnologyLevel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConfigTechnologyLevelType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configtechnologylevel_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ConfigTechnologyLevel entity.
     *
     * @Route("/{id}/delete", name="configtechnologylevel_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnologyLevel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfigTechnologyLevel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configtechnologylevel'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

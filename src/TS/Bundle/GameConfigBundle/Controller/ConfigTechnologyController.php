<?php

namespace TS\Bundle\GameConfigBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TS\Bundle\GameConfigBundle\Entity\ConfigTechnology;
use TS\Bundle\GameConfigBundle\Form\ConfigTechnologyType;

/**
 * ConfigTechnology controller.
 *
 * @Route("/technology")
 */
class ConfigTechnologyController extends Controller
{
    /**
     * Lists all ConfigTechnology entities.
     *
     * @Route("/", name="configtechnology")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TSGameConfigBundle:ConfigTechnology')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ConfigTechnology entity.
     *
     * @Route("/{id}/show", name="configtechnology_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnology')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigTechnology entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new ConfigTechnology entity.
     *
     * @Route("/new", name="configtechnology_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConfigTechnology();
        $form   = $this->createForm(new ConfigTechnologyType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new ConfigTechnology entity.
     *
     * @Route("/create", name="configtechnology_create")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigTechnology:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ConfigTechnology();
        $form = $this->createForm(new ConfigTechnologyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configtechnology_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ConfigTechnology entity.
     *
     * @Route("/{id}/edit", name="configtechnology_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnology')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigTechnology entity.');
        }

        $editForm = $this->createForm(new ConfigTechnologyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ConfigTechnology entity.
     *
     * @Route("/{id}/update", name="configtechnology_update")
     * @Method("POST")
     * @Template("TSGameConfigBundle:ConfigTechnology:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnology')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigTechnology entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConfigTechnologyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configtechnology_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ConfigTechnology entity.
     *
     * @Route("/{id}/delete", name="configtechnology_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TSGameConfigBundle:ConfigTechnology')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfigTechnology entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configtechnology'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

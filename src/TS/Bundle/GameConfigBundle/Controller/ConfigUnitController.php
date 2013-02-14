<?php

namespace TS\Bundle\GameConfigBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use TS\Bundle\GameConfigBundle\Entity\ConfigUnit;
use TS\Bundle\GameConfigBundle\Form\ConfigUnitType;

/**
 * ConfigUnit controller.
 *
 * @Route("/configunit")
 */
class ConfigUnitController extends Controller
{
    /**
     * Lists all ConfigUnit entities.
     *
     * @Route("/", name="configunit")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TSGameConfigBundleConfigUnit')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a ConfigUnit entity.
     *
     * @Route("/{id}/show", name="configunit_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundleConfigUnit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigUnit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new ConfigUnit entity.
     *
     * @Route("/new", name="configunit_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ConfigUnit();
        $form   = $this->createForm(new ConfigUnitType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new ConfigUnit entity.
     *
     * @Route("/create", name="configunit_create")
     * @Method("POST")
     * @Template("TSGameConfigBundleConfigUnit:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new ConfigUnit();
        $form = $this->createForm(new ConfigUnitType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configunit_show', array('id' => $entity->getId())));
        } else {
            return new Response('Form is not valid, there was some problem :/', 400);
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ConfigUnit entity.
     *
     * @Route("/{id}/edit", name="configunit_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundleConfigUnit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigUnit entity.');
        }

        $editForm = $this->createForm(new ConfigUnitType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing ConfigUnit entity.
     *
     * @Route("/{id}/update", name="configunit_update")
     * @Method("POST")
     * @Template("TSGameConfigBundleConfigUnit:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TSGameConfigBundleConfigUnit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ConfigUnit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConfigUnitType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('configunit_edit', array('id' => $id)));
        } else {
            return new Response(400, 'Error validating form :/');
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ConfigUnit entity.
     *
     * @Route("/{id}/delete", name="configunit_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TSGameConfigBundleConfigUnit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ConfigUnit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('configunit'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}

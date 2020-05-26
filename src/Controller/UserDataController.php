<?php
/**
 * UserData controller
 */

namespace App\Controller;

use App\Entity\UserData;
use App\Repository\UserDataRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserDataController
 *
 * @Route("/userdata")
 */
class UserDataController extends AbstractController
{
    /**
     * Index action
     *
     * @param \Symfony\Component\HttpFoundation\Request $request            HTTP request
     * @param \App\Repository\UserDataRepository        $userdataRepository UserData repository
     * @param \Knp\Component\Pager\PaginatorInterface   $paginator          Paginator
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/",
     *     name="userdata_index",
     * )
     */
    public function index(Request $request, UserDataRepository $userdataRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $userdataRepository->queryAll(),
            $request->query->getInt('page', 1),
            UserDataRepository::PAGINATOR_ITEMS_PER_PAGE
        );

        return $this->render(
            'userdata/index.html.twig',
            ['pagination' => $pagination]
        );
    }

    /**
     * Show action
     *
     * @param \App\Entity\UserData $userdata UserData entity
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP response
     *
     * @Route(
     *     "/{id}",
     *     methods={"GET"},
     *     name="userdata_show",
     *     requirements={"id": "[1-9]\d*"},
     * )
     */
    public function show(UserData $userdata): Response
    {
        return $this->render(
            'userdata/show.html.twig',
            ['userdata' => $userdata]
        );
    }
}

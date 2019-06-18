<?php
declare(strict_types=1);


namespace Malvor\Bundle\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiController
 *
 * @package Malvor\Bundle\DemoBundle\Controller
 *
 * @Route("/api", name="api_")
 */
class ApiController extends Controller
{

	protected $books = [];

	public function __construct()
	{
		$this->books = [
			[
				'title'  => 'A trip in Time',
				'author' => 'Jane Doe',
				'enable' => true
			], [
				'title'  => 'I got you?',
				'author' => 'East Harlem',
				'enable' => true
			], [
				'title'  => 'Fighting fire',
				'author' => 'Jane Doe',
				'enable' => false
			]
		];
	}

	/**
	 * @Route("/books/", methods={"GET"})
	 *
	 * @return JsonResponse
	 */
	public function booksListAction() : JsonResponse
	{
		return new JsonResponse(['status' => 'success', 'data' => $this->books], 200, ['Context-Type' => 'application/json']);
	}

	/**
	 * @Route("/book/{bookId}/", methods={"GET"})
	 *
	 * @param int $bookId
	 *
	 * @return JsonResponse
	 */
	public function getBookAction(int $bookId) : JsonResponse
	{
		if (isset($this->books[$bookId])) {
			return new JsonResponse(json_encode($this->books[$bookId]), 200, ['Context-Type' => 'application/json']);
		}
		return new JsonResponse(['status' => 'error', 'message' => 'Missing book'], 400,  ['Context-Type' => 'application/json']);
	}

	/**
	 * @Route("/books/", methods={"POST"})
	 *
	 * @return JsonResponse
	 */
	public function createBookAction(Request $request) : JsonResponse
	{
		$newBook 	   = json_decode($request->getContent(), true);
		$this->books[] = $newBook;
		return new JsonResponse($newBook, 200, ['Context-Type' => 'application/json']);
	}

}
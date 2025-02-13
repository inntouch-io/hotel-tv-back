<?php

/**
 * Hotel-alphazet.
 *
 * @author  Farrux Orziyev
 * Created: 13.02.2025 / 04:43
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Domain\Welcome\DTO\WelcomeDto;
use Domain\Welcome\Entities\Welcome;
use Domain\Welcome\Services\WelcomeService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RuntimeException;

/**
 * Class WelcomeController
 * @package App\Http\Controllers\Admin
 */
class WelcomeController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Welcome::class);

        try {
            $welcome = WelcomeService::getInstance()->getList();

            return view(
                'welcome.index',
                [
                    'welcome' => $welcome
                ]
            );
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Welcome::class);

        return view('welcome.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('store', Welcome::class);

        try {
            $data = $request->validate(
                [
                    'title'     => 'required|string',
                    'text'     => 'required|string',
                    'slogan'   => 'required|string',
                    'language' => 'required|string',
                ]
            );

            $welcomeDto = new WelcomeDto();
            $welcomeDto->setTitle($data['title']);
            $welcomeDto->setText($data['text']);
            $welcomeDto->setSlogan($data['slogan']);
            $welcomeDto->setLanguage($data['language']);

            $welcome = WelcomeService::getInstance()->store($welcomeDto);

            return redirect()->route('admin.welcome.edit', ['welcome' => $welcome->getId()])
                ->with('success', 'Successfully saved');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage())->withInput();
        }
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        $this->authorize('edit', Welcome::class);

        $welcome = WelcomeService::getInstance()->getById($id);

        return view(
            'welcome.edit',
            [
                'welcome' => $welcome
            ]
        );
    }

    /**
     * @param Request $request
     * @param int     $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->authorize('update', Welcome::class);

        try {
            $data = $request->validate(
                [
                    'title'     => 'required|string',
                    'text'     => 'required|string',
                    'slogan'   => 'required|string',
                    'language' => 'required|string',
                ]
            );

            /** @var Welcome $welcome */
            $welcome = WelcomeService::getInstance()->getById($id);

            if (is_null($welcome)) {
                throw new RuntimeException('Welcome content not found!', 404);
            }

            $welcomeDto = new WelcomeDto();
            $welcomeDto->setTitle($data['title']);
            $welcomeDto->setText($data['text']);
            $welcomeDto->setSlogan($data['slogan']);
            $welcomeDto->setLanguage($data['language']);

            WelcomeService::getInstance()->update($welcome, $welcomeDto);

            return redirect()->route('admin.welcome.edit', ['welcome' => $welcome->getId()])
                ->with('success', 'Successfully saved');
        } catch (Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete', Welcome::class);
        /** @var Welcome $welcome */
        WelcomeService::getInstance()->delete($id);

        return redirect()->route('admin.welcome.index')
            ->with('success', 'Successfully deleted');
    }
}

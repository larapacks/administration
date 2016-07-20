<?php

namespace Larapacks\Administration\Processors\Admin;

use Larapacks\Administration\Http\Presenters\Admin\SetupPresenter;
use Larapacks\Administration\Http\Requests\Admin\SetupRequest;
use Larapacks\Administration\Jobs\Admin\Setup\Finish;
use Larapacks\Administration\Models\User;
use Larapacks\Administration\Processors\Processor;

class SetupProcessor extends Processor
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var SetupPresenter
     */
    protected $presenter;

    /**
     * Constructor.
     *
     * @param User           $user
     * @param SetupPresenter $presenter
     */
    public function __construct(User $user, SetupPresenter $presenter)
    {
        $this->user = $user;
        $this->presenter = $presenter;
    }

    /**
     * Displays the welcome page for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('admin.setup.welcome');
    }

    /**
     * Displays the form for setting up administration.
     *
     * @return \Illuminate\View\View
     */
    public function begin()
    {
        $form = $this->presenter->form();

        return view('admin.setup.begin', compact('form'));
    }

    /**
     * Finishes the administration setup.
     *
     * @param SetupRequest $request
     *
     * @return bool
     */
    public function finish(SetupRequest $request)
    {
        $user = $this->user->newInstance();

        return $this->dispatch(new Finish($request, $user));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateSupport;
use App\Http\Controllers\Controller;
use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Service\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    )
    {}

    public function index(Request $request) {
        $supports = $this->service->getAll($request->filter);

        return view('admin.support.index', compact('supports'));
    }

    public function show(string $id) {
        $support = $this->service->findOne($id);

        return view('admin.support.show', compact('support'));
    }

    public function create() {
        return view('admin.support.create');
    }

    public function store(StoreUpdateSupport $request) {

        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('support.index');
    }

    public function edit(string $id) {
        $support = $this->service->findOne($id);

        return view('admin.support.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, string $id) {

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!isset($support) && $support == null) {
            return redirect()->back();
        }

        return redirect()->route('support.index');
    }

    public function delete(string $id){

        $this->service->delete($id);

        return redirect()->route('support.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Requests\AddAction;
use App\DataTables\RequestDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Requests\RequestsCreateRequest;
use App\Models\Request as RequestModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  RequestDataTable  $requestDataTable  The data table instance for rendering requests
     */
    public function index(RequestDataTable $requestDataTable): mixed
    {
        $count = RequestModel::count();

        return $requestDataTable->render('requests.index', [
            'count' => $count,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RequestsCreateRequest  $request  The validated request object for creating a new request
     * @param  AddAction  $action  The action responsible for adding a new request
     */
    public function store(RequestsCreateRequest $request, AddAction $action): RedirectResponse
    {
        $ipAddress = request()->ip();

        if ($action->execute($request, $ipAddress)) {
            return redirect()->back()->with('status', ['status' => true, 'message' => 'The request has been successfully added.']);
        } else {
            return redirect()->back()->with('status', ['status' => false, 'message' => 'Failed to add the request. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $id
     */
    public function show(string $id): JsonResponse
    {
        try {
            $requestModel = RequestModel::query()->where('id', $id)->with('currency')->firstOrFail();

            return response()->json($requestModel);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Request not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request  The HTTP request instance
     * @param  string  $id  The ID of the request model to be deleted
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        try {
            $requestModel = RequestModel::findOrFail($id);
            $requestModel->load('users');
            $requestModel->users()->delete();
            $requestModel->delete();

            return redirect()->route('requests.index')->with('status', [
                'status' => true,
                'message' => 'Request and associated user requests have been deleted.',
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('requests.index')->with('status', [
                'status' => false,
                'message' => 'Failed to delete request and associated user requests.',
            ]);
        }
    }
}

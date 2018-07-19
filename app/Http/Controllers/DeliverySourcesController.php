<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliverySource;
use App\Http\Controllers\Controller;
use Exception;

class DeliverySourcesController extends Controller
{

    /**
     * Display a listing of the delivery sources.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $deliverySources = DeliverySource::paginate(2);

        return view('delivery_sources.index', compact('deliverySources'));
    }

    /**
     * Show the form for creating a new delivery source.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('delivery_sources.create');
    }

    /**
     * Store a new delivery source in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            DeliverySource::create($data);

            return redirect()->route('delivery_sources.delivery_source.index')
                             ->with('success_message', 'Delivery Source was successfully added!');

        } catch (Exception $exception) {
            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified delivery source.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $deliverySource = DeliverySource::findOrFail($id);

        return view('delivery_sources.show', compact('deliverySource'));
    }

    /**
     * Show the form for editing the specified delivery source.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $deliverySource = DeliverySource::findOrFail($id);
        

        return view('delivery_sources.edit', compact('deliverySource'));
    }

    /**
     * Update the specified delivery source in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $deliverySource = DeliverySource::findOrFail($id);
            $deliverySource->update($data);

            return redirect()->route('delivery_sources.delivery_source.index')
                             ->with('success_message', 'Delivery Source was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified delivery source from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deliverySource = DeliverySource::findOrFail($id);
            $deliverySource->delete();

            return redirect()->route('delivery_sources.delivery_source.index')
                             ->with('success_message', 'Delivery Source was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'title' => 'required|string|min:1|max:1024',
            'status' => 'boolean'
     
        ];

        
        $data = $request->validate($rules);


        $data['status'] = $request->has('status');


        return $data;
    }

}

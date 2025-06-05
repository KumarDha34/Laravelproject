<?php

namespace App\Http\Controllers\Backend;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CreateSettingRequest;

class SettingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setting = Setting::first();
        if($setting){
            return redirect()->route('backend.setting.edit',$setting->id);
        } else {
            return view('backend.setting.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSettingRequest $request)
    {
        // Handle 'logo_top_file'
        if ($request->hasFile('logo_top_file')) {
            $file = $request->file('logo_top_file');
            $logoTop = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/setting'), $logoTop);
            $request->request->add(['logo_top' => $logoTop]);
        }
        // Handle 'logo_bottom_file'
        if ($request->hasFile('logo_bottom_file')) {
            $file1 = $request->file('logo_bottom_file');
            $logoBottom = time() . '_' . $file1->getClientOriginalName();
            $file1->move(public_path('images/setting'), $logoBottom);
            $request->request->add(['logo_bottom' => $logoBottom]);
        }
        // Handle 'favicon_file'
        if ($request->hasFile('favicon_file')) {
            $file2 = $request->file('favicon_file');
            $favicon = time() . '_' . $file2->getClientOriginalName();
            $file2->move(public_path('images/setting'), $favicon);
            $request->request->add(['favicon' => $favicon]);
        }
        // Track the user who created the setting
        $request->request->add(['created_by' => auth()->user()->id]);

        // Create record
        $record = Setting::create($request->all());

        if ($record) {
            return redirect()->route('backend.setting.create')->with('success', 'Setting Creation Success!!!');
        } else {
            return redirect()->route('backend.setting.create')->with('error', 'Setting Creation Failed!!!');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::findOrFail($id);
        return view('backend.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateSettingRequest $request, string $id)
    {
        $setting = Setting::findOrFail($id);

        if ($request->hasFile('logo_top_file')) {
            $file = $request->file('logo_top_file');
            $logoTop = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/setting'), $logoTop);
            $request->request->add(['logo_top' => $logoTop]);
        }

        if ($request->hasFile('logo_bottom_file')) {
            $file1 = $request->file('logo_bottom_file');
            $logoBottom = time() . '_' . $file1->getClientOriginalName();
            $file1->move(public_path('images/setting'), $logoBottom);
            $request->request->add(['logo_bottom' => $logoBottom]);
        }

        if ($request->hasFile('favicon_file')) {
            $file2 = $request->file('favicon_file');
            $favicon = time() . '_' . $file2->getClientOriginalName();
            $file2->move(public_path('images/setting'), $favicon);
            $request->request->add(['favicon' => $favicon]);
        }

        // Track who updated it
        $request->request->add(['updated_by' => auth()->user()->id]);

        // Update the record
        $updated = $setting->update($request->except(['_token', '_method', 'logo_top_file', 'logo_bottom_file', 'favicon_file']));

        if ($updated) {
            return redirect()->route('backend.setting.edit', $setting->id)
                            ->with('success', 'Setting updated successfully!');
        } else {
            return redirect()->route('backend.setting.edit', $setting->id)
                            ->with('error', 'Setting update failed!');
        }
    }

}

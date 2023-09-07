<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $groupSettings = Setting::all()->groupBy('group');
        return view('settings.list', compact('groupSettings'));
    }

    public function create()
    {
        $settingGroups = Setting::select('group')->distinct()->get();
        return view('settings.create', compact('settingGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'type' => 'required',
            'value' => 'nullable',
            'options' => 'nullable',
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')->with('success', trans('admin.settings.created'));
    }

    public function edit(Setting $setting)
    {
        $settingGroups = Setting::select('group')->distinct()->get();
        return view('settings.edit', compact('settingGroups', 'setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'group' => 'required',
            'key' => 'required',
            'type' => 'required',
            'value' => 'nullable',
            'options' => 'nullable',
        ]);

        $setting->update($request->all());

        return redirect()->route('settings.index')->with('success', trans('admin.settings.updated'));
    }

    public function updateAll(Request $request)
    {

        foreach( $request->all() as $key => $value)
        {
            $setting = Setting::where('key', $key)->first();
            if( $setting !== null)
                $setting->update(['value' => $value]);
        }
        return redirect()->back();
    }
}

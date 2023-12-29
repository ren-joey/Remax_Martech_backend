<?php

namespace App\Http\Controllers;

use App\Models\I18nTranslations;
use App\Http\Requests\StoreI18nTranslationsRequest;
use App\Http\Requests\UpdateI18nTranslationsRequest;
use Illuminate\Support\Facades\Storage;

class I18nTranslationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $lang)
    {
        $i18n = I18nTranslations::where('locale', $lang)->get();
        $dic = [];
        foreach($i18n as $each) {
            $dic[$each->i18n_key] = $each->message;
        }
        return response($dic);
    }

    public function file()
    {
        $url = Storage::url('bg/about-us-bg.png');
        return response($url);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreI18nTranslationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(I18nTranslations $i18nTranslations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(I18nTranslations $i18nTranslations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateI18nTranslationsRequest $request, I18nTranslations $i18nTranslations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(I18nTranslations $i18nTranslations)
    {
        //
    }
}

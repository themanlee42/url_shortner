<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Url;
use App\Http\Resources\UrlsIndexResource;
use App\Http\Resources\UrlsShowResource;
use Illuminate\Support\Str;

class UrlsController extends Controller
{
    /**
     * @return Url[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return UrlsIndexResource::collection(Url::all());
    }

    /**
     * @param $urlId
     * @return mixed
     */
    public function show($urlId)
    {
        return new UrlsShowResource(Url::findOrFail($urlId));
    }

    /**
     * @param Request $request
     * @return UrlsShowResource
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'url' => 'required|max:191|url',
        ]);

        $url = new Url();
        $url->url = trim(strtolower($request->url));
        $url->slug = base_convert(time(), 10, 36);
        $url->save();

        return new UrlsShowResource($url);
    }

    /**
     * @param Request $request
     * @return UrlsShowResource
     */
    public function check(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|max:191|url',
        ]);

        $result = Url::where('url', '=', trim(strtolower($request->url)))->firstOrFail();
        return new UrlsShowResource($result);
    }
}

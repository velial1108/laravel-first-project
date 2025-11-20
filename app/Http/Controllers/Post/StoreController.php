<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;


class StoreController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
    //аргумент наш request с валидацией
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);


            return redirect()->route('post.index');
        }
}

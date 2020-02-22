<?php

namespace Astrotomic\LaravelUnavatar\Tests;

use Astrotomic\LaravelUnavatar\Unavatar;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchestra\Testbench\TestCase;
use Astrotomic\LaravelUnavatar\UnavatarServiceProvider;

final class UnavatarTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            UnavatarServiceProvider::class,
        ];
    }
    
    /** @test */
    public function it_is_renderable(): void
    {
        $unavatar = Unavatar::github('Gummibeer');

        static::assertArrayHasKey(Renderable::class, class_implements($unavatar));
        static::assertSame('<img alt="Gummibeer\'s github avatar" src="https://unavatar.now.sh/github/Gummibeer" />', $unavatar->render());
    }

    /** @test */
    public function it_is_htmlable(): void
    {
        $unavatar = Unavatar::github('Gummibeer');

        static::assertArrayHasKey(Htmlable::class, class_implements($unavatar));
        static::assertSame('<img alt="Gummibeer\'s github avatar" src="https://unavatar.now.sh/github/Gummibeer" />', $unavatar->toHtml());
    }

    /** @test */
    public function it_is_responsable_redirect(): void
    {
        $unavatar = Unavatar::github('Gummibeer');

        static::assertArrayHasKey(Responsable::class, class_implements($unavatar));

        $redirect = $unavatar->toResponse(Request::createFromGlobals());

        static::assertInstanceOf(RedirectResponse::class, $redirect);
        static::assertSame('https://unavatar.now.sh/github/Gummibeer', $redirect->getTargetUrl());
    }

    /** @test */
    public function it_is_responsable_json(): void
    {
        $unavatar = Unavatar::github('Gummibeer');

        static::assertArrayHasKey(Responsable::class, class_implements($unavatar));

        $request = Request::createFromGlobals();
        $request->headers->set('X-Requested-With', 'XMLHttpRequest');
        $response = $unavatar->toResponse($request);

        static::assertInstanceOf(JsonResponse::class, $response);
        $data = $response->getData(true);
        static::assertIsArray($data);
        static::assertArrayHasKey('url', $data);
    }

    /** @test */
    public function it_is_jsonable(): void
    {
        $unavatar = Unavatar::github('Gummibeer');

        static::assertArrayHasKey(Jsonable::class, class_implements($unavatar));

        $data = $unavatar->toJson();
        static::assertJson($data);
        $data = json_decode($data, true);
        static::assertIsArray($data);
        static::assertArrayHasKey('url', $data);
    }

    /** @test */
    public function it_is_arrayable(): void
    {
        $unavatar = Unavatar::github('Gummibeer');

        static::assertArrayHasKey(Arrayable::class, class_implements($unavatar));

        $data = $unavatar->toArray();
        static::assertIsArray($data);
        static::assertArrayHasKey('url', $data);
    }

    /** @test */
    public function it_is_arrayable_with_fallback(): void
    {
        $unavatar = Unavatar::github('Gummibeer')->fallback('https://example.com/avatar.jpg');

        static::assertArrayHasKey(Arrayable::class, class_implements($unavatar));

        $data = $unavatar->toArray();
        static::assertIsArray($data);
        static::assertArrayHasKey('url', $data);
    }
}

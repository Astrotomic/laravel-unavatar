<?php

namespace Astrotomic\Unavatar\Laravel;

use Astrotomic\Unavatar\Unavatar as BaseUnavatar;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

class Unavatar extends BaseUnavatar implements Renderable, Responsable, Htmlable, Jsonable, JsonSerializable, Arrayable
{
    public static function make(string $identifier, ?string $provider = null): self
    {
        return new static($identifier, $provider);
    }

    public function __construct(string $identifier, ?string $provider = null)
    {
        parent::__construct($identifier, $provider);

        $this->fallback = config('unavatar.fallback');
    }

    public function render(): string
    {
        return $this->toHtml();
    }

    public function toHtml(): string
    {
        return $this->toImg();
    }

    public function toResponse($request): Response
    {
        if ($request->expectsJson()) {
            return new JsonResponse($this->toArray());
        }

        return new RedirectResponse($this->toUrl(), 302);
    }

    public function toJson($options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        $url = $this->toUrl();

        $url .= Str::contains($url, '?')
            ? '&json'
            : '?json';

        return json_decode(file_get_contents($url), true);
    }
}

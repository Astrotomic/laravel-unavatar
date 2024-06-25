<?php

namespace Astrotomic\Unavatar\Laravel\View\Components;

use Astrotomic\Unavatar\Laravel\Unavatar as LaravelUnavatar;
use Astrotomic\Unavatar\Unavatar as BaseUnavatar;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Img extends Component
{
    public string $identifier;

    protected ?string $provider = null;

    protected ?string $fallback = null;

    public function __construct(
        ?string $username = null,
        ?string $email = null,
        ?string $domain = null,
        ?string $fallback = null,
        ?string $clearbit = null,
        ?string $deviantart = null,
        ?string $dribbble = null,
        ?string $duckduckgo = null,
        ?string $facebook = null,
        ?string $github = null,
        ?string $gravatar = null,
        ?string $instagram = null,
        ?string $soundcloud = null,
        ?string $substack = null,
        ?string $telegram = null,
        ?string $twitter = null,
        ?string $youtube = null
    ) {
        if ($clearbit) {
            $this->identifier = $clearbit;
            $this->provider = BaseUnavatar::PROVIDER_CLEARBIT;
        }

        if ($deviantart) {
            $this->identifier = $deviantart;
            $this->provider = BaseUnavatar::PROVIDER_DEVIANTART;
        }

        if ($dribbble) {
            $this->identifier = $dribbble;
            $this->provider = BaseUnavatar::PROVIDER_DRIBBBLE;
        }

        if ($duckduckgo) {
            $this->identifier = $duckduckgo;
            $this->provider = BaseUnavatar::PROVIDER_DUCKDUCKGO;
        }
        if ($facebook) {
            $this->identifier = $facebook;
            $this->provider = BaseUnavatar::PROVIDER_FACEBOOK;
        }

        if ($github) {
            $this->identifier = $github;
            $this->provider = BaseUnavatar::PROVIDER_GITHUB;
        }

        if ($gravatar) {
            $this->identifier = $gravatar;
            $this->provider = BaseUnavatar::PROVIDER_GRAVATAR;
        }

        if ($instagram) {
            $this->identifier = $instagram;
            $this->provider = BaseUnavatar::PROVIDER_INSTAGRAM;
        }

        if ($soundcloud) {
            $this->identifier = $soundcloud;
            $this->provider = BaseUnavatar::PROVIDER_SOUNDCLOUD;
        }

        if ($substack) {
            $this->identifier = $substack;
            $this->provider = BaseUnavatar::PROVIDER_SUBSTACK;
        }

        if ($telegram) {
            $this->identifier = $telegram;
            $this->provider = BaseUnavatar::PROVIDER_TELEGRAM;
        }

        if ($twitter) {
            $this->identifier = $twitter;
            $this->provider = BaseUnavatar::PROVIDER_TWITTER;
        }

        if ($youtube) {
            $this->identifier = $youtube;
            $this->provider = BaseUnavatar::PROVIDER_YOUTUBE;
        }

        $this->identifier ??= $username ?? $email ?? $domain;
        $this->fallback = $fallback;
    }

    public function render(): View
    {
        return view('unavatar::img');
    }

    public function url(): string
    {
        $unavatar = LaravelUnavatar::make($this->identifier, $this->provider);

        if ($this->fallback) {
            $unavatar->fallback($this->fallback);
        }

        return $unavatar->toUrl();
    }
}

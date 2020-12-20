<?php /** @var \Illuminate\View\ComponentAttributeBag $attributes */ ?>
<?php /**
 * @var \Closure $url
 * @see \Astrotomic\Unavatar\Laravel\View\Components\Img::url()
 */ ?>
<?php /**
 * @var string $identifier
 * @see \Astrotomic\Unavatar\Laravel\View\Components\Img::$identifier
 */ ?>
<?php /**
 * @var string|null $provider
 * @see \Astrotomic\Unavatar\Laravel\View\Components\Img::$provider
 */ ?>

<img
    src="{{ $url() }}"
    {{ $attributes->merge(['alt' => "{$identifier} avatar", 'loading' => 'lazy']) }}
/>
<?php

namespace Astrotomic\Unavatar\Laravel\Tests;

use Astrotomic\Unavatar\Laravel\UnavatarServiceProvider;
use Gajus\Dindent\Indenter;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            UnavatarServiceProvider::class,
        ];
    }

    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $indenter = new Indenter();

        $blade = (string) $this->blade($template, $data);

        $this->assertSame(
            $indenter->indent($expected),
            $indenter->indent($blade)
        );
    }

    protected function blade(string $template, array $data = []): string
    {
        $tempDirectory = sys_get_temp_dir();

        if (! in_array($tempDirectory, ViewFacade::getFinder()->getPaths())) {
            ViewFacade::addLocation(sys_get_temp_dir());
        }

        $tempFile = tempnam($tempDirectory, 'laravel-blade').'.blade.php';

        file_put_contents($tempFile, $template);

        return view(Str::before(basename($tempFile), '.blade.php'), $data);
    }
}

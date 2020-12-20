<?php

namespace Astrotomic\Unavatar\Laravel\Tests;

final class ComponentTest extends TestCase
{
    /** @test */
    public function it_can_render(): void
    {
        $expected = <<<'HTML'
            <img
                src="https://unavatar.now.sh/astrotomic.info"
                alt="Astrotomic avatar"
                loading="lazy"
            />
            HTML;

        $this->assertComponentRenders($expected, '<x-unavatar::img domain="astrotomic.info" alt="Astrotomic avatar"/>');
    }

    /** @test */
    public function it_can_render_with_fallback(): void
    {
        $expected = <<<'HTML'
            <img
                src="https://unavatar.now.sh/astrotomic.info/?fallback=https%3A%2F%2Fexample.com%2Favatar.jpg"
                alt="astrotomic.info avatar"
                loading="lazy"
            />
            HTML;

        $this->assertComponentRenders($expected, '<x-unavatar::img domain="astrotomic.info" fallback="https://example.com/avatar.jpg"/>');
    }

    /** @test */
    public function it_can_render_clearbit(): void
    {
        $expected = <<<'HTML'
            <img
                src="https://unavatar.now.sh/clearbit/astrotomic.info"
                alt="astrotomic.info avatar"
                loading="lazy"
            />
            HTML;

        $this->assertComponentRenders($expected, '<x-unavatar::img clearbit="astrotomic.info"/>');
    }

    /** @test */
    public function it_can_render_deviantart(): void
    {
        $expected = <<<'HTML'
            <img
                src="https://unavatar.now.sh/deviantart/astrotomic"
                alt="astrotomic avatar"
                loading="lazy"
            />
            HTML;

        $this->assertComponentRenders($expected, '<x-unavatar::img deviantart="astrotomic"/>');
    }

    /** @test */
    public function it_can_render_dribbble(): void
    {
        $expected = <<<'HTML'
            <img
                src="https://unavatar.now.sh/dribbble/astrotomic"
                alt="astrotomic avatar"
                loading="lazy"
            />
            HTML;

        $this->assertComponentRenders($expected, '<x-unavatar::img dribbble="astrotomic"/>');
    }
}

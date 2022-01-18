<?php

namespace Sfneal\Socials\Tests\Unit;


use Sfneal\Socials\Builders\SocialBuilder;
use Sfneal\Socials\Models\Social;
use Sfneal\Socials\Tests\TestCase;

class SocialTest extends TestCase
{
    /**
     * Retrieve an array of Recipe models to be used as test params.
     *
     * @return array
     */
    protected function socialModelsProvider(): array
    {
        return $this->modelsProvider(Social::class);
    }

    /** @test */
    public function builder_is_accessible()
    {
        $this->assertBuilderIsAccessible(Social::query(), SocialBuilder::class);
    }

    /**
     * @test
     *
     * @param  Social  $social
     * @dataProvider socialModelsProvider
     */
    public function fillables_are_correct_types(Social $social)
    {
        $this->assertIsInt($social->getKey());

        $this->assertIsString($social->title);
        $this->assertIsString($social->icon);
        $this->assertIsString($social->url);
        $this->assertIsString($social->description);
    }

    /**
     * @test
     *
     * @param  Social  $social
     * @dataProvider socialModelsProvider
     */
    public function attributes_are_correct_types(Social $social)
    {
        $this->assertIsInt($social->getKey());

        $this->assertIsString($social->channel_id);
        $this->assertIsString($social->url_short);
    }
}

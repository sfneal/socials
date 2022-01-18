<?php

namespace Sfneal\Socials\Tests\Unit;


use Sfneal\Socials\Builders\SocialBuilder;
use Sfneal\Socials\Models\Social;
use Sfneal\Socials\Tests\TestCase;
use Sfneal\Testing\Utils\Traits\AssertModelBuilder;
use Sfneal\Testing\Utils\Traits\ModelProvider;

class SocialTest extends TestCase
{
    use AssertModelBuilder;
    use ModelProvider;

    /**
     * Retrieve an array of Recipe models to be used as test params.
     *
     * @return array
     */
    protected function socialModelsProvider(): array
    {
        return Social::query()
            ->get()
            ->map(function ($model) {
                return [$model];
            })
            ->toArray();
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

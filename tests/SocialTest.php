<?php

namespace Sfneal\Socials\Tests;

use Sfneal\Socials\Builders\SocialBuilder;
use Sfneal\Socials\Models\Social;
use Sfneal\Testing\Utils\Traits\AssertModelBuilder;

class SocialTest extends TestCase
{
    use AssertModelBuilder;

    /** @test */
    public function builder_is_accessible()
    {
        $this->assertBuilderIsAccessible(Social::query(), SocialBuilder::class);
    }

    /**
     * @test
     *
     * @dataProvider runTestFiveTimesProvider
     */
    public function fillables_are_correct_types()
    {
        $social = Social::factory()->create();

        $this->assertIsInt($social->getKey());

        $this->assertIsString($social->title);
        $this->assertIsString($social->icon);
        $this->assertIsString($social->url);
        $this->assertIsString($social->description);
    }

    /**
     * @test
     *
     * @dataProvider runTestFiveTimesProvider
     */
    public function attributes_are_correct_types()
    {
        $social = Social::factory()->create();

        $this->assertIsInt($social->getKey());

        $this->assertIsString($social->channel_id);
        $this->assertIsString($social->url_short);
    }
}

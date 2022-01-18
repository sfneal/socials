<?php

namespace Sfneal\Socials\Builders;

use Sfneal\Builders\QueryBuilder;

class SocialBuilder extends QueryBuilder
{
    /**
     * Scope query results to Social models that are not 'Instagram'.
     *
     * @return $this
     */
    public function whereNotInstagram(): self
    {
        $this->where('title', '!=', 'Instagram');

        return $this;
    }

    /**
     * Exclude Instagram Social when the referral page is 'instagram'.
     *
     * @param  bool  $wasReferredFromInstagram
     * @return $this
     */
    public function whenReferredFromInstagramExcludeIgSocial(bool $wasReferredFromInstagram): self
    {
        $this->when($wasReferredFromInstagram, function (SocialBuilder $builder) {
            $builder->whereNotInstagram();
        });

        return $this;
    }
}

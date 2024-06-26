<?php

namespace Sfneal\Socials\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sfneal\Helpers\Strings\StringHelpers;
use Sfneal\Models\Model;
use Sfneal\Socials\Builders\SocialBuilder;
use Sfneal\Socials\Factories\SocialFactory;

class Social extends Model
{
    use HasFactory;
    protected $table = 'social';
    protected $primaryKey = 'social_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'icon',
        'url',
        'description',
    ];

    protected $appends = [
        'channel_id',
        'url_short',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return SocialFactory
     */
    protected static function newFactory(): SocialFactory
    {
        return new SocialFactory();
    }

    /**
     * Query Builder.
     *
     * @param  $query
     * @return SocialBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new SocialBuilder($query);
    }

    /**
     * @return SocialBuilder|Builder
     */
    public static function query(): SocialBuilder
    {
        return parent::query();
    }

    /**
     * Retrieve a Socials Media accounts unique channel/user identifier.
     *
     * @return string
     */
    public function getChannelIdAttribute(): string
    {
        // Remove trailing slashes
        $uri = trim($this->attributes['url'], '/');

        // Split URL on '/' chars
        $pieces = explode('/', $uri);

        // Return the last segment containing the channel ID
        return last($pieces);
    }

    /**
     * Retrieve a shortened version of the 'url' attribute by removing http prefixes and truncating the string.
     *
     * @return string
     */
    public function getUrlShortAttribute(): string
    {
        return (new StringHelpers(
            str_replace(
                ['https://', 'www.'],
                '',
                $this->attributes['url']
            )
        ))->truncate('20');
    }
}

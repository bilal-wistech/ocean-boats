<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BlameableOnlyTables
 *
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\User|null $deletor
 * @property-read \App\Models\User|null $editor
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|BlameableOnlyTables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlameableOnlyTables newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlameableOnlyTables query()
 */
	class BlameableOnlyTables extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BoatView
 *
 * @property int $id
 * @property int $entity_id
 * @property string $entity_type
 * @property int $total_count
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView query()
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView whereTotalCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BoatView whereUpdatedAt($value)
 */
	class BoatView extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ChildTables
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTables newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTables query()
 */
	class ChildTables extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FullTables
 *
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $creator
 * @property-read \App\Models\User|null $deletor
 * @property-read \App\Models\User|null $editor
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|FullTables newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FullTables newQuery()
 * @method static \Illuminate\Database\Query\Builder|FullTables onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FullTables query()
 * @method static \Illuminate\Database\Query\Builder|FullTables withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FullTables withoutTrashed()
 */
	class FullTables extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $path
 * @property string|null $name
 * @property string|null $extension
 * @property string|null $size
 * @property int $order
 * @property int|null $featured
 * @property int $imageable_id
 * @property string $imageable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $size_in_kb
 * @property-read mixed $uploaded_time
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $imageable
 * @property-write mixed $feature
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $username
 * @property int|null $avatar_id
 * @property int $super_user
 * @property int $manage_supers
 * @property string|null $permissions
 * @property string|null $last_login
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereManageSupers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSuperUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}


<?php

namespace NaeemAwan\PredefinedLists\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;

class PredefinedList extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'predefined_list';

    protected $fillable = [
        'ltitle',
        'status',
        'parent_id',
        'descp',
        'image',
        'file',
        'main_image',
        'display_order',
        'price',
        'type',
        'preview_enabled',
        'multi_select',
        'side_layout',
        'sort_order',
        'is_standard_option'
    ];

    protected $casts = [
        'image' => 'object',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }

    public function subOptionsCount()
    {
        return PredefinedList::where('parent_id', $this->id)->count('id');
    }

    public function detail()
    {
        return $this->hasOne(PredefinedListDetail::class, 'list_id');
    }

    public function childitems()
    {
        return PredefinedList::where(['parent_id' => $this->id, 'status' => 1])->orderBy('created_at')->get();
    }

    public function childitems_sorted()
    {
        return PredefinedList::where(['parent_id' => $this->id, 'status' => 1])->orderBy('sort_order', 'ASC')->get();
    }

    public function childitems_display()
    {
        return PredefinedList::where(['parent_id' => $this->id, 'status' => 1])->orderBy('display_order', 'ASC')->get();
    }

    public function parent()
    {
        return $this->hasOne(PredefinedList::class, 'parent_id');
    }

}

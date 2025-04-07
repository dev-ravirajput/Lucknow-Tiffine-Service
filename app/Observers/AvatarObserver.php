<?php

namespace App\Observers;

use App\Models\Avatar;
use Illuminate\Support\Str;

class AvatarObserver
{
    public function creating(Avatar $avatar)
    {
        $avatar->slug = $this->generateUniqueSlug($avatar->name);
    }

    public function updating(Avatar $avatar)
    {
        if ($avatar->isDirty('name')) {
            $avatar->slug = $this->generateUniqueSlug($avatar->name);
        }
    }

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = Avatar::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
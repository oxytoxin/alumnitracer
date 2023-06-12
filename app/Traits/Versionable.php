<?php

namespace App\Traits;

use OwenIt\Auditing\Models\Audit;

trait Versionable
{
    public function previousVersion()
    {
        return $this->morphOne(Audit::class, 'auditable')->latest()->skip(1);
    }

    public function currentVersion()
    {
        return $this->morphOne(Audit::class, 'auditable')->latest();
    }

    public function revert(?Audit $audit = null)
    {
        if ($audit) {
            return $this->update($audit->old_values);
        }

        return $this->update($this->currentVersion?->old_values ?? []);
    }
}

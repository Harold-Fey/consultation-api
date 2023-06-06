<?php

namespace App\Traits;
use App\Exceptions\SecureDeleteException;
use Symfony\Component\HttpFoundation\Response;

trait SecureDelete
{
    /**
     * Delete only when there is no reference to other models.
     *
     * @param array $relations
     * @throws SecureDeleteException
     */
    public function secureDelete(String ...$relations)
    {
        $hasRelation = false;
        foreach ($relations as $relation) {
            if ($this->$relation()->count()) {
                $hasRelation = true;
                break;
            }
        }

        if ($hasRelation) {
            throw new SecureDeleteException(get_class($this));
        } else {
            $this->delete();
        }
    }
}

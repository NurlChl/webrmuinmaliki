<?php


namespace App\Traits;


trait HasRoles

{

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }


    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }


}
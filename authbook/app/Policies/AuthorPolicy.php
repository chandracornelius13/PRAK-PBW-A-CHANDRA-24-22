<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;

class AuthorPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua user bisa lihat daftar penulis
    }

    public function view(User $user, Author $author): bool
    {
        return true; // Semua user bisa lihat detail penulis
    }

    public function create(User $user): bool
    {
        return true; // Semua user bisa membuat penulis baru
    }

    public function update(User $user, Author $author): bool
    {
        return true; // Semua user bisa mengedit penulis
    }

    public function delete(User $user, Author $author): bool
    {
        return true; // Semua user bisa menghapus penulis
    }

    public function restore(User $user, Author $author): bool
    {
        return true;
    }

    public function forceDelete(User $user, Author $author): bool
    {
        return true;
    }
}
<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    // Semua role bisa melihat daftar buku
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'staff', 'viewer']);
    }

    // Semua role bisa melihat detail buku
    public function view(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'staff', 'viewer']);
    }

    // Admin dan staff bisa menambah buku
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    // Admin dan staff bisa mengedit buku
    public function update(User $user, Book $book): bool
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    // Hanya admin yang bisa menghapus buku
    public function delete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang bisa memulihkan buku
    public function restore(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang bisa menghapus permanen
    public function forceDelete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang bisa menghapus banyak buku sekaligus
    public function deleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang bisa memulihkan banyak buku sekaligus
    public function restoreAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Hanya admin yang bisa menghapus permanen secara massal
    public function forceDeleteAny(User $user): bool
    {
        return $user->role === 'admin';
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;

class CategoryPolicy
{
  public function viewAny(User $user)
  {
    return $user->hasRole('customer');
  }

  public function view(User $user, Category $category)
  {
    return $user->hasRole('customer');
  }

  public function create(User $user)
  {
    return $user->hasRole('customer');
  }

  public function update(User $user, Category $category)
  {
    return $user->hasRole('customer');
  }

  public function delete(User $user, Category $category)
  {
    return $user->hasRole('customer');
  }
}
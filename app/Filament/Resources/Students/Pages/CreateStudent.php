<?php

namespace App\Filament\Resources\Students\Pages;

use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\Students\StudentResource;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;


        protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 1. Create the user first
        $user = User::create([
            'name' => $data['user']['name'],
            'email' => $data['user']['email'],
            'password' => $data['user']['password'],
            'role' => 'student',
        ]);

        // 2. Attach user_id to student
        $data['user_id'] = $user->id;

        // 3. Remove nested user data (important!)
        unset($data['user']);

        return $data;
    }

}

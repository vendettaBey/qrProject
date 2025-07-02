<?php

namespace App\Filament\SuperAdmin\Resources\TenantResource\Pages;

use App\Filament\SuperAdmin\Resources\TenantResource;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class EditTenant extends EditRecord
{
  protected static string $resource = TenantResource::class;

  protected function getHeaderActions(): array
  {
    return [
      Actions\DeleteAction::make()
        ->label('Müşteriyi Sil'),
    ];
  }

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }

  protected function mutateFormDataBeforeFill(array $data): array
  {
    // Tenant'a bağlı ilk kullanıcıyı bul
    $user = User::where('tenant_id', $this->record->id)
      ->whereHas('roles', function ($query) {
        $query->where('name', 'customer');
      })
      ->first();

    if ($user) {
      $data['user_name'] = $user->name;
      $data['user_email'] = $user->email;
    }

    return $data;
  }

  protected function mutateFormDataBeforeSave(array $data): array
  {
    // Kullanıcı bilgilerini ayır
    $userData = [
      'name' => $data['user_name'] ?? null,
      'email' => $data['user_email'] ?? null,
    ];

    // Şifre varsa ekle
    if (!empty($data['user_password'])) {
      $userData['password'] = $data['user_password'];
    }

    // Formdan kullanıcı alanlarını kaldır
    unset($data['user_name']);
    unset($data['user_email']);
    unset($data['user_password']);
    unset($data['user_password_confirmation']);

    // Kullanıcı verilerini session'a kaydet
    session(['edit_tenant_user_data' => $userData]);

    return $data;
  }

  protected function afterSave(): void
  {
    // Transaction başlat
    DB::beginTransaction();

    try {
      // Tenant'a bağlı ilk kullanıcıyı bul
      $user = User::where('tenant_id', $this->record->id)
        ->whereHas('roles', function ($query) {
          $query->where('name', 'customer');
        })
        ->first();

      if ($user) {
        $userData = session('edit_tenant_user_data', []);

        if (!empty($userData)) {
          $updateData = [
            'name' => $userData['name'],
            'email' => $userData['email'],
          ];

          // Şifre varsa güncelle
          if (isset($userData['password'])) {
            $updateData['password'] = Hash::make($userData['password']);
          }

          $user->update($updateData);

          // Customer rolünü oluştur veya bul
          $customerRole = Role::firstOrCreate(
            ['name' => 'customer'],
            [
              'name' => 'customer',
              'guard_name' => 'web'
            ]
          );

          // Kullanıcının rolü yoksa customer rolünü ata
          if (!$user->hasRole('customer')) {
            $user->assignRole($customerRole);
          }
        }
      }

      // Başarılı ise işlemi tamamla
      DB::commit();
    } catch (\Exception $e) {
      // Hata durumunda rollback yap
      DB::rollBack();

      // Hata mesajını göster
      $this->notify('danger', 'Müşteri kullanıcısı güncellenirken bir hata oluştu: ' . $e->getMessage());
    }

    // Session'dan verileri temizle
    session()->forget('edit_tenant_user_data');
  }
}
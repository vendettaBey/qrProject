<?php

namespace App\Filament\SuperAdmin\Resources\TenantResource\Pages;

use App\Filament\SuperAdmin\Resources\TenantResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class CreateTenant extends CreateRecord
{
  protected static string $resource = TenantResource::class;

  protected function getRedirectUrl(): string
  {
    return $this->getResource()::getUrl('index');
  }

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    // Kullanıcı bilgilerini ayır
    $userData = [
      'name' => $data['user_name'],
      'email' => $data['user_email'],
      'password' => $data['user_password'],
    ];

    // Formdan kullanıcı alanlarını kaldır
    unset($data['user_name']);
    unset($data['user_email']);
    unset($data['user_password']);
    unset($data['user_password_confirmation']);

    // Tenant verilerini döndür
    return $data;
  }

  protected function afterCreate(): void
  {
    // Transaction başlat
    DB::beginTransaction();

    try {
      // Tenant oluşturulduktan sonra kullanıcı oluştur
      $tenant = $this->record;

      $user = User::create([
        'tenant_id' => $tenant->id,
        'name' => $this->data['user_name'],
        'email' => $this->data['user_email'],
        'password' => Hash::make($this->data['user_password']),
        'is_active' => true,
      ]);

      // Customer rolünü oluştur veya bul
      $customerRole = Role::firstOrCreate(
        ['name' => 'customer'],
        [
          'name' => 'customer',
          'guard_name' => 'web'
        ]
      );

      // Kullanıcıya customer rolünü ata
      $user->assignRole($customerRole);

      // Başarılı ise işlemi tamamla
      DB::commit();
    } catch (\Exception $e) {
      // Hata durumunda rollback yap
      DB::rollBack();

      // Hata mesajını göster
      $this->notify('danger', 'Müşteri kullanıcısı oluşturulurken bir hata oluştu: ' . $e->getMessage());
    }
  }
}
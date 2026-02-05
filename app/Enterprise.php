<?php

namespace App;

use App\Utils\Commons\FormatStringUtil;
use App\Utils\Enumerables\EnterpriseUpdateStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;

class Enterprise extends Model
{
    protected $table = "enterprises";

    protected $fillable = [
        'cnpj',
        'razao_social',
        'fantasia',
        'email',
        'uuid',
        'user_id',
        'phone',
        'city_name',
        'state_name',
        'last_update',
        'accumulate_day',
        'accumulate_monther',
        'total_sales',
        'amount_sales',
        'ticket_medio'
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "last_update" => "datetime",
    ];

    protected $dates = [
        "created_at",
        "updated_at",
        "last_update"
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getUpdateStatus()
    {
        if (!$this->last_update) {
            return EnterpriseUpdateStatusEnum::LOST;
        }

        $minutes = Carbon::now()->diffInMinutes($this->last_update);

        if ($minutes <= 10) {
            return EnterpriseUpdateStatusEnum::PUNCTUAL;
        }

        if ($minutes <= 30) {
            return EnterpriseUpdateStatusEnum::LATE;
        }

        return EnterpriseUpdateStatusEnum::LOST;
    }

    public function getBorderClass() {
        $current = $this->getUpdateStatus();
        switch($current) {
            case EnterpriseUpdateStatusEnum::PUNCTUAL: return 'border-success';
            case EnterpriseUpdateStatusEnum::LATE: return 'border-warning';
            case EnterpriseUpdateStatusEnum::LOST: return 'border-danger';
            default: return 'border-secondary';
        }
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function demonstratives() {
        return $this->hasMany(Demostrative::class, "enterprise_id");
    }

    public function getDocument() {
        return FormatStringUtil::formatCnpj($this->cnpj);
    }

    public function regenerateCredential()
    {
        $this->secret = Uuid::uuid4()->toString();

        $this->save();
    }

    public function generate_token()
    {
        return encrypt($this->uuid);
    }

    public function is_token_valid($token)
    {
        try
        {
            $tryDecrypt = decrypt($token);

            return $tryDecrypt == $this->uuid;
        }
        catch (\Exception $e) {
            return false;
        }
    }
}

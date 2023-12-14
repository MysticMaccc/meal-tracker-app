<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarcodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'card_number' => $this->card_number,
            'barcode_value' => $this->barcode_value,
            'owner' => $this->owner,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ];
    }
}

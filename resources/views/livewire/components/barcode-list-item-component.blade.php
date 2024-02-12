<tr>
    <td>
        {{ $barcode->card_number }}
    </td>
    <td>
        {{ $barcode->barcode_value }}
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <select class="input-size" wire:model="category">
                @foreach ($category_data as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        @else
            {{ $barcode->category->name }}
        @endif
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <select class="input-size" wire:model="category_type">
                @foreach ($category_type_data as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        @else
            {{ $barcode->category_type->name }}
        @endif
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <input type="text" class="input-size" wire:model="owner" value="{{ $barcode->owner }}">
            @error('owner')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        @else
            {{ $barcode->owner }}
        @endif
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <input type="text" class="input-size" wire:model="company" value="{{ $barcode->company }}">
            @error('company')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        @else
            {{ $barcode->company }}
        @endif
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <input type="date" class="input-size" wire:model="start_date" value="{{ $barcode->start_date }}">
            @error('start_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        @else
            {{ $barcode->start_date }}
        @endif
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <input type="date" class="input-size" wire:model="end_date" value="{{ $barcode->end_date }}">
            @error('end_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        @else
            {{ $barcode->end_date }}
        @endif
    </td>
    <td>
        @if ($barcode->id == $is_Edit)
            <button class="btn btn-sm btn-info rounded-3 m-1" title="update" wire:click="update()">
                <i class="bi bi-save"></i>
            </button>
            <button class="btn btn-sm btn-success rounded-3 m-1" title="Close" wire:click="close()">
                <i class="bi bi-x"></i>
            </button>
        @else
            <button class="btn btn-sm btn-info rounded-3 m-1" title="Update" wire:click="edit({{ $barcode->id }})">
                <i class="bi bi-pencil-square"></i>
            </button>
            <button class="btn btn-sm btn-success rounded-3 m-1" title="Print QR Code"
                wire:click="generate_Barcode({{ $barcode->id }})">
                <i class="bi bi-qr-code"></i>
            </button>
        @endif
    </td>




    <style>
        .input-size {
            width: 100px;
        }
    </style>
</tr>

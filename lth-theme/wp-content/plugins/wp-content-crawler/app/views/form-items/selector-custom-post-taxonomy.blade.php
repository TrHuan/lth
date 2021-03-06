<div class="input-group selector-custom-post-taxonomy {{ isset($addon) ? 'addon dev-tools' : '' }} {{ isset($remove) ? 'remove' : '' }}"
     @if(isset($dataKey)) data-key="{{ $dataKey }}" @endif>
    @if(isset($addon))
        @include('form-items.partials.button-addon-test')
        @include('form-items.dev-tools.button-dev-tools')
        @if(isset($optionsBox) && $optionsBox)
            @include('form-items.options-box.button-options-box')
        @endif
    @endif
    <div class="input-container">
        <input type="checkbox" name="{{ $name . '[multiple]' }}" id="{{ $name . '[multiple]' }}" data-toggle="tooltip" title="{{ _wpcc('Multiple?') }}"
               @if(isset($value['multiple'])) checked="checked" @endif tabindex="0">

        <input type="checkbox" name="{{ $name . '[append]' }}" id="{{ $name . '[append]' }}" data-toggle="tooltip" title="{{ _wpcc('Append?') }}"
               @if(isset($value['append'])) checked="checked" @endif tabindex="0">

        <input type="text" name="{{ $name . '[selector]' }}" id="{{ $name . '[selector]' }}" placeholder="{{ _wpcc('Selector') }}"
               value="{{ isset($value['selector']) ? $value['selector'] : '' }}"
               class="css-selector" tabindex="0">

        <input type="text" name="{{ $name . '[attr]' }}" id="{{ $name . '[attr]' }}" placeholder="{{ sprintf(_wpcc('Attribute (default: %s)'), $defaultAttr) }}"
               value="{{ isset($value['attr']) ? $value['attr'] : '' }}" class="css-selector-attr" tabindex="0">

        <input type="text" name="{{ $name . '[taxonomy]' }}" id="{{ $name . '[taxonomy]' }}" placeholder="{{ _wpcc('Taxonomy name') }}"
               value="{{ isset($value['taxonomy']) ? $value['taxonomy'] : '' }}" class="taxonomy" tabindex="0">
    </div>
    @if(isset($remove))
        @include('form-items/remove-button')
    @endif
</div>
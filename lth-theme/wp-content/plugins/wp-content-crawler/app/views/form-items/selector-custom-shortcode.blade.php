<div class="input-group selector-custom-shortcode {{ isset($addon) ? 'addon dev-tools' : '' }} {{ isset($remove) ? 'remove' : '' }}"
     @if(isset($dataKey)) data-key="{{ $dataKey }}" @endif>
    @if(isset($addon))
        @include('form-items.partials.button-addon-test')
        @include('form-items.dev-tools.button-dev-tools')
        @if(isset($optionsBox) && $optionsBox)
            @include('form-items.options-box.button-options-box')
        @endif
    @endif
    <div class="input-container">
        <input type="checkbox" name="{{ $name . '[single]' }}" id="{{ $name . '[single]' }}" data-toggle="tooltip" title="{{ _wpcc('Single?') }}"
               @if(isset($value['single'])) checked="checked" @endif tabindex="0">

        <input type="text" name="{{ $name . '[selector]' }}" id="{{ $name . '[selector]' }}" placeholder="{{ _wpcc('Selector') }}"
               value="{{ isset($value['selector']) ? $value['selector'] : '' }}"
               class="css-selector" tabindex="0">

        <input type="text" name="{{ $name . '[attr]' }}" id="{{ $name . '[attr]' }}" placeholder="{{ sprintf(_wpcc('Attribute (default: %s)'), $defaultAttr) }}"
               value="{{ isset($value['attr']) ? $value['attr'] : '' }}" class="css-selector-attr" tabindex="0">

        <input type="text" name="{{ $name . '[short_code]' }}" id="{{ $name . '[short_code]' }}" placeholder="{{ _wpcc('Shortcode without brackets') }}"
               value="{{ isset($value['short_code']) ? $value['short_code'] : '' }}" class="short-code" tabindex="0">
    </div>
    @if(isset($remove))
        @include('form-items/remove-button')
    @endif
</div>
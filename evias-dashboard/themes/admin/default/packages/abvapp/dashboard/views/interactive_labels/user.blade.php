
<div class="sponsorInformations">
    <span>{{ trans("evias/dashboard::interactive_labels.label_self_name") }}: <b>{{ $object->name_i18n }}</b></span><br />
    <span>{{ trans("evias/dashboard::interactive_labels.label_self_email") }}: <b>{{ $object->email }}</b></span><br />
    <span>{{ trans("evias/dashboard::interactive_labels.label_self_phone") }}: <b>{{ $object->mobile_i18n }}</b></span><br />

    <?php if ($object->parent) : ?>
    <span>{{ trans("evias/dashboard::interactive_labels.label_sponsor_id") }}: <b>{{ $object->prefixed_affiliate_id }}</b></span><br />
    <span>{{ trans("evias/dashboard::interactive_labels.label_sponsor_name") }}: <b>{{ $object->parent->name_i18n }}</b></span><br />
    <span>{{ trans("evias/dashboard::interactive_labels.label_sponsor_email") }}: <b>{{ $object->parent->email }}</b></span><br />
    <span>{{ trans("evias/dashboard::interactive_labels.label_sponsor_phone") }}: <b>{{ $object->parent->mobile_i18n }}</b></span>
    <?php endif; ?>
</div>

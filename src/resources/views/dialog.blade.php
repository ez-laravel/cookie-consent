<cookie-consent
    agree-text="Agree"
    disagree-text="Disagree"
    api-endpoint="{{ route('cookie-consent.consent') }}"
    :cookie-set="{{ json_encode($consentCookieSet) }}">
    <template v-slot:title>
        Cookie Consent Dialog
    </template>
    <template v-slot:text>
        Consent text goes here
    </template>
</cookie-consent>
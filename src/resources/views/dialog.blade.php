<cookie-consent
    agree-text="Agree"
    disagree-text="Disagree"
    api-endpoint="{{ route('cookie-consent.consent') }}"
    :cookie-set="{{ json_encode($consentCookieSet) }}">
    <template v-slot:title>
        Cookie Consent
    </template>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac malesuada risus. 
        Cras quis tortor et sapien elementum facilisis. Nullam et gravida dolor. Nunc 
        suscipit sollicitudin purus, eget auctor neque tempor non. Cras mattis auctor lectus, 
        in porttitor enim lacinia et. Etiam mattis urna eu leo tempor luctus. Nunc sapien sem, 
        hendrerit eget augue et, cursus interdum velit. Donec a lectus libero. 
    </p>
</cookie-consent>
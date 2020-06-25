<template>
    <div id="cookie-consent" @click="onClickWrapper" v-if="visible">

        <!-- Cookie -->
        <div class="cookie-consent__dialog elevation-2" @click.stop="">
            <div class="cookie-consent__title">
                <slot name="header">
                    Cookie Consent
                </slot>
            </div>
            <div class="cookie-consent__message">
                <slot></slot>
            </div>
            <div class="cookie-consent__actions">
                <div class="cookie-consent__action">
                    <button class="cookie-consent__agree" @click="onClickButton">
                        {{ agreeText }}
                        <i class="far fa-thumbs-up"></i>
                    </button>
                </div>
                <div class="cookie-consent__action">
                    <button class="cookie-consent__disagree" @click="onClickButton">
                        {{ disagreeText }}
                    </button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: [
            "agreeText",
            "disagreeText",
            "apiEndpoint",
            "cookieSet",
        ],
        data: () => ({
            tag: "[cookie-consent]",
            visible: false,
        }),
        methods: {
            initialize() {
                console.log(this.tag+" initializing");
                console.log(this.tag+" agree text: ", this.agreeText);
                console.log(this.tag+" disagree text: ", this.disagreeText);
                console.log(this.tag+" cookie set: ", this.cookieSet);
                console.log(this.tag+" api endpoint: ", this.apiEndpoint);
                this.initializeState();
            },
            initializeState() {
                if (!this.cookieSet) {
                    this.visible = true;
                }
            },
            onClickWrapper() {
                console.log("clicked wrapper");
                this.visible = false;
            },
            onClickButton() {
                console.log("clicked accept");
                this.visible = false;
                let endpoint = this.apiEndpoint;
                this.axios.get(endpoint)
                    .then(function(response) {
                        console.log("request succeeded");
                    }.bind(this))
                    .catch(function(error) {
                        console.warn("request failed", error);
                    }.bind(this));
            },
        },
        mounted() {
            this.initialize();
        },
    }
</script>

<style lang="scss">
    #cookie-consent {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        z-index: 99999;
        position: fixed;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
        .cookie-consent__dialog {
            width: 800px;
            padding: 40px;
            background-color: #fff;
            box-sizing: border-box;
            .cookie-consent__title {
                color: #000;
                font-size: 1.6em;
                font-weight: 600;
                margin: 0 0 30px 0;
                font-family: 'Playfair Display', serif;
            }
            .cookie-consent__message {
                p {
                    font-size: 1.1em;
                    font-weight: 400;
                    line-height: 1.5em;
                    margin: 0 0 30px 0;
                    &:first-child {
                        margin: 25px 0 15px 0;
                    }
                    &:last-child {
                        margin: 0;
                    }
                }
            }
            .cookie-consent__actions {
                display: flex;
                flex-direction: row;
                margin: 25px -15px 0 -15px;
                .cookie-consent__action {
                    padding: 0 15px;
                    box-sizing: border-box;
                    .cookie-consent__agree {
                        border: 0;
                        height: 50px;
                        padding: 0 20px;
                        color: #ffffff;
                        line-height: 50px;
                        border-radius: 2px;
                        transition: all .3s;
                        box-sizing: border-box;
                        background-color: #00994a;
                        .far {
                            margin: 0 0 0 10px;
                        }
                        &:hover {
                            background-color: #008842;
                        }
                    }
                    .cookie-consent__disagree {
                        border: 0;
                        height: 50px;
                        padding: 0 20px;
                        color: #000000;
                        line-height: 50px;
                        border-radius: 2px;
                        transition: all .3s;
                        box-sizing: border-box;
                        background-color: #f5f5f5;
                        &:hover {
                            background-color: #eeeeee;
                        }
                    }
                }
            }
        }
    }
</style>
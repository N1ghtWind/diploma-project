<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Payments Demos */
        * {
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-text-size-adjust: none;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            font-size: 15px;
            line-height: 1.4em;
            color: #525f7f;
        }

        ul {
            text-align: left;
        }

        body {
            display: flex;
            flex-direction: row;
            align-items: center;
            background: #f8fbfd;
        }

        button {
            display: block;
            background: #666ee8;
            color: #fff;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            border: 0;
            font-weight: 700;
            width: 100%;
            height: 40px;
            outline: none;
            cursor: pointer;
            transition: all 0.15s ease;
            margin-top: 10px;
        }

        #main {
            width: 100%;
            height: 100vh;
            text-align: center;
            transition: width 0.3s ease-in-out;
        }

        #main.checkout:not(.success):not(.error) {
            width: calc(100% - 450px);
        }

        #checkout,
        #container {
            max-width: 480px;
            margin: 0 auto;
            padding: 30px 0;
        }

        h1 {
            margin: 0 0 20px 0;
            font-size: 20px;
            font-weight: 500;
        }

        #main.checkout #checkout,
        #main #container {
            visibility: visible;
            opacity: 1;
        }

        #payment-form,
        #webhooks-list,
        #panel {
            margin: 0 -30px;
            padding: 20px 30px 30px;
            border-radius: 4px;
            border: 1px solid #e8e8fb;
        }

        input {
            flex: 1;
            border-style: none;
            outline: none;
            color: #313b3f;
        }

        .field {
            flex: 1;
            padding: 0 15px;
            background: transparent;
            font-weight: 400;
            color: #31325f;
            outline: none;
            cursor: text;
        }

        .field::-webkit-input-placeholder {
            color: #aab7c4;
        }

        .field::-moz-placeholder {
            color: #aab7c4;
        }

        .field:-ms-input-placeholder {
            color: #aab7c4;
        }

        fieldset {
            margin-bottom: 20px;
            background: #fff;
            box-shadow: 0 1px 3px 0 rgba(50, 50, 93, 0.15),
                0 4px 6px 0 rgba(112, 157, 199, 0.15);
            border-radius: 4px;
            border: none;
            font-size: 0;
        }

        fieldset label {
            position: relative;
            display: flex;
            flex-direction: row;
            height: 42px;
            padding: 10px 0;
            align-items: center;
            justify-content: center;
            color: #8898aa;
            font-weight: 400;
        }

        fieldset label:not(:last-child) {
            border-bottom: 1px solid #f0f5fa;
        }

        fieldset label.state {
            display: inline-flex;
            width: 75%;
        }

        fieldset:not(.with-state) label.state {
            display: none;
        }

        fieldset label.zip {
            display: inline-flex;
            width: 25%;
            padding-right: 60px;
        }

        fieldset:not(.with-state) label.zip {
            width: 100%;
        }

        fieldset label span {
            min-width: 200px;
            padding: 0 15px;
            text-align: right;
        }

        fieldset .redirect label span {
            width: 100%;
            text-align: center;
        }

        #card-message,
        #debug-message,
        .json {
            text-align: left;
            white-space: pre-wrap;
            background-color: white;
        }

        #admin {
            width: 100%;
            height: 100vh;
            text-align: center;
            transition: width 0.3s ease-in-out;
            padding-top: 30px;
        }

        #tools {
            margin: 0 auto;
            width: 480px;
            padding: 30px 0;
        }

        #tool {
            margin: 0 -30px;
            padding: 20px 30px 30px;
            border-radius: 4px;
            border: 1px solid #fa8389;
        }

        #card-error {
            margin: 30px 0px;
            padding: 10px;
            background-color: #fff8f5;
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;
            border-radius: 4px;
            border-top: 1px solid #f5925e;
            border-top-width: 1px;
            border-top-style: solid;
            border-top-color: rgb(245, 146, 94);
            color: #cd3d64;
            box-shadow: 0 7px 14px 0 rgba(60, 66, 87, .12), 0 3px 6px 0 rgba(0, 0, 0, .12);
        }


        /* Billing Demo */
        #app {
            margin: 0 auto;
            max-width: 960px;
            margin-bottom: 100px;
            color: #fff;
        }

        .pricing {
            display: flex;
            margin-top: 40px;
        }

        .pricing-overview {
            flex-grow: 1;
            margin: 0 -30px;
            padding: 20px 30px 30px;
            border-radius: 4px;
            border: 1px solid #e8e8fb;
        }

        h1 {
            font-size: 32px;
            font-weight: 400;
            margin: 0;
            text-align: center;
        }

        .plans {
            display: flex;
            align-items: center;
            margin-top: 45px;
        }

        .plans h2 {
            font-weight: 500;
            font-size: 20px;
            margin: 0;
            margin-bottom: 8px;
        }

        .plans h3 {
            margin: 0;
            font-weight: 400;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .plan {
            flex-grow: 1;
            padding: 25px 15px;
            text-align: center;
            margin-right: 30px;
            border-top: 3px solid transparent;
            box-shadow: 0 1px 6px 0 rgba(50, 50, 93, 0.15);
            border-radius: 4px;
        }

        .plan.active,
        .plan.recommended {
            flex-grow: 2;
            border-top: 3px solid #d782d9;
            box-shadow: 0 15px 35px 0 rgba(50, 50, 93, 0.1), 0 5px 15px 0 rgba(0, 0, 0, 0.07);
            padding-top: 20px;
            padding-bottom: 56px;
        }

        .plan button {
            background: #525f7f;
            color: white;
            min-width: 190px;
            margin: 0 auto;
        }

        .plan.recommended button {
            background: #d782d9;
        }

        .code {
            text-align: left;
        }




        /* Variables */
        :root {
            --gray-offset: rgba(0, 0, 0, 0.03);
            --gray-border: rgba(0, 0, 0, 0.15);
            --gray-light: rgba(0, 0, 0, 0.4);
            --gray-mid: rgba(0, 0, 0, 0.7);
            --gray-dark: rgba(0, 0, 0, 0.9);
            --body-color: var(--gray-mid);
            --headline-color: var(--gray-dark);
            --accent-color: #0066f0;
            --body-font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            --radius: 6px;
            --form-width: 343px;
        }

        /* Base */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: var(--body-font-family);
            font-size: 16px;
            color: var(--body-color);
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: var(--body-color);
            margin-top: 2px;
            margin-bottom: 4px;
        }

        h1 {
            font-size: 27px;
            color: var(--headline-color);
        }

        h4 {
            font-weight: 500;
            font-size: 14px;
            color: var(--gray-light);
        }

        /* Layout */
        .sr-root {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 980px;
            padding: 48px;
            align-content: center;
            justify-content: center;
            height: auto;
            min-height: 100vh;
            margin: 0 auto;
        }

        .sr-header {
            margin-bottom: 32px;
        }

        .sr-payment-summary {
            margin-bottom: 20px;
        }

        .sr-main,
        .sr-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            align-self: center;
        }

        .sr-main {
            width: var(--form-width);
        }

        .sr-content {
            padding-left: 48px;
        }

        .sr-header__logo {
            background-image: var(--logo-image);
            height: 24px;
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
        }

        .sr-legal-text {
            color: var(--gray-light);
            text-align: center;
            font-size: 13px;
            line-height: 17px;
            margin-top: 12px;
        }

        .sr-field-error {
            color: var(--accent-color);
            text-align: left;
            font-size: 13px;
            line-height: 17px;
            margin-top: 12px;
        }

        /* Form */
        .sr-form-row {
            margin: 16px 0;
        }

        label {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            display: inline-block;
        }

        /* Inputs */
        .sr-input,
        .sr-select,
        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            border: 1px solid var(--gray-border);
            border-radius: var(--radius);
            padding: 5px 12px;
            height: 44px;
            width: 100%;
            transition: box-shadow 0.2s ease;
            background: white;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            color: #32325d;
        }

        .sr-input:focus,
        input[type="text"]:focus,
        button:focus,
        .focused {
            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),
                0 0 0 4px rgba(50, 151, 211, 0.3);
            outline: none;
            z-index: 9;
        }

        .sr-input::placeholder,
        input[type="text"]::placeholder {
            color: var(--gray-light);
        }

        /* Checkbox */
        .sr-checkbox-label {
            position: relative;
            cursor: pointer;
        }

        .sr-checkbox-label input {
            opacity: 0;
            margin-right: 6px;
        }

        .sr-checkbox-label .sr-checkbox-check {
            position: absolute;
            left: 0;
            height: 16px;
            width: 16px;
            background-color: white;
            border: 1px solid var(--gray-border);
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .sr-checkbox-label input:focus~.sr-checkbox-check {
            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),
                0 0 0 4px rgba(50, 151, 211, 0.3);
            outline: none;
        }

        .sr-checkbox-label input:checked~.sr-checkbox-check {
            background-color: var(--accent-color);
            background-repeat: no-repeat;
            background-size: 16px;
            background-position: -1px -1px;
        }

        /* Select */
        .sr-select {
            display: block;
            height: 44px;
            margin: 0;
            background-repeat: no-repeat, repeat;
            background-position: right 12px top 50%, 0 0;
            background-size: 0.65em auto, 100%;
        }

        .sr-select::-ms-expand {
            display: none;
        }

        .sr-select:hover {
            cursor: pointer;
        }

        .sr-select:focus {
            box-shadow: 0 0 0 1px rgba(50, 151, 211, 0.3), 0 1px 1px 0 rgba(0, 0, 0, 0.07),
                0 0 0 4px rgba(50, 151, 211, 0.3);
            outline: none;
        }

        .sr-select option {
            font-weight: 400;
        }

        .sr-select:invalid {
            color: var(--gray-light);
        }

        /* Combo inputs */
        .sr-combo-inputs {
            display: flex;
            flex-direction: column;
        }

        .sr-combo-inputs input,
        .sr-combo-inputs .sr-select {
            border-radius: 0;
            border-bottom: 0;
        }

        .sr-combo-inputs>input:first-child,
        .sr-combo-inputs>.sr-select:first-child {
            border-radius: var(--radius) var(--radius) 0 0;
        }

        .sr-combo-inputs>input:last-child,
        .sr-combo-inputs>.sr-select:last-child {
            border-radius: 0 0 var(--radius) var(--radius);
            border-bottom: 1px solid var(--gray-border);
        }

        .sr-combo-inputs>.sr-combo-inputs-row:last-child input:first-child {
            border-radius: 0 0 0 var(--radius);
            border-bottom: 1px solid var(--gray-border);
        }

        .sr-combo-inputs>.sr-combo-inputs-row:last-child input:last-child {
            border-radius: 0 0 var(--radius) 0;
            border-bottom: 1px solid var(--gray-border);
        }

        .sr-combo-inputs>.sr-combo-inputs-row:first-child input:first-child {
            border-radius: var(--radius) 0 0 0;
        }

        .sr-combo-inputs>.sr-combo-inputs-row:first-child input:last-child {
            border-radius: 0 var(--radius) 0 0;
        }

        .sr-combo-inputs>.sr-combo-inputs-row:first-child input:only-child {
            border-radius: var(--radius) var(--radius) 0 0;
        }

        .sr-combo-inputs-row {
            width: 100%;
            display: flex;
        }

        .sr-combo-inputs-row>input {
            width: 100%;
            border-radius: 0;
        }

        .sr-combo-inputs-row>input:first-child:not(:only-child) {
            border-right: 0;
        }

        .sr-combo-inputs-row:not(:first-of-type) .sr-input {
            border-radius: 0 0 var(--radius) var(--radius);
        }

        .sr-result {
            height: 44px;
            -webkit-transition: height 1s ease;
            -moz-transition: height 1s ease;
            -o-transition: height 1s ease;
            transition: height 1s ease;
            color: var(--font-color);
            overflow: auto;
        }

        .sr-result code {
            overflow: scroll;
        }

        .sr-result.expand {
            height: 350px;
        }

        /* Buttons and links */
        button {
            background: var(--accent-color);
            border-radius: var(--radius);
            color: white;
            border: 0;
            padding: 12px 16px;
            margin-top: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: block;
        }

        button:hover {
            filter: contrast(115%);
        }

        button:active {
            transform: translateY(0px) scale(0.98);
            filter: brightness(0.9);
        }

        button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .sr-payment-form button,
        .fullwidth {
            width: 100%;
        }

        a {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        a:hover {
            filter: brightness(0.8);
        }

        a:active {
            filter: brightness(0.5);
        }

        /* Code block */
        .sr-callout {
            background: var(--gray-offset);
            padding: 12px;
            border-radius: var(--radius);
            max-height: 200px;
            overflow: auto;
        }

        code,
        pre {
            font-family: "SF Mono", "IBM Plex Mono", "Menlo", monospace;
            font-size: 12px;
        }

        /* Stripe Element placeholder */
        .sr-card-element {
            padding-top: 12px;
        }

        /* Responsiveness */
        @media (max-width: 720px) {
            .sr-root {
                flex-direction: column;
                justify-content: flex-start;
                padding: 48px 20px;
                min-width: 320px;
            }

            .sr-header__logo {
                background-position: center;
            }

            .sr-payment-summary {
                text-align: center;
            }

            .sr-content {
                display: none;
            }

            .sr-main {
                width: 100%;
            }
        }

        /* Pasha styles – Brand-overrides, can split these out */
        :root {
            --accent-color: #ed5f74;
            --headline-color: var(--accent-color);
        }

        .pasha-image-stack {
            display: grid;
            grid-gap: 12px;
            grid-template-columns: auto auto;
        }

        .pasha-image-stack img {
            border-radius: var(--radius);
            background-color: var(--gray-border);
            box-shadow: 0 7px 14px 0 rgba(50, 50, 93, 0.1),
                0 3px 6px 0 rgba(0, 0, 0, 0.07);
            transition: all 0.8s ease;
            opacity: 0;
        }

        .pasha-image-stack img:nth-child(1) {
            transform: translate(12px, -12px);
            opacity: 1;
        }

        .pasha-image-stack img:nth-child(2) {
            transform: translate(-24px, 16px);
            opacity: 1;
        }

        .pasha-image-stack img:nth-child(3) {
            transform: translate(68px, -100px);
            opacity: 1;
        }

        /* todo: spinner/processing state, errors, animations */

        .spinner,
        .spinner:before,
        .spinner:after {
            border-radius: 50%;
        }

        .spinner {
            color: #ffffff;
            font-size: 22px;
            text-indent: -99999px;
            margin: 0px auto;
            position: relative;
            width: 20px;
            height: 20px;
            box-shadow: inset 0 0 0 2px;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }

        .spinner:before,
        .spinner:after {
            position: absolute;
            content: "";
        }

        .spinner:before {
            width: 10.4px;
            height: 20.4px;
            background: var(--accent-color);
            border-radius: 20.4px 0 0 20.4px;
            top: -0.2px;
            left: -0.2px;
            -webkit-transform-origin: 10.4px 10.2px;
            transform-origin: 10.4px 10.2px;
            -webkit-animation: loading 2s infinite ease 1.5s;
            animation: loading 2s infinite ease 1.5s;
        }

        .spinner:after {
            width: 10.4px;
            height: 10.2px;
            background: var(--accent-color);
            border-radius: 0 10.2px 10.2px 0;
            top: -0.1px;
            left: 10.2px;
            -webkit-transform-origin: 0px 10.2px;
            transform-origin: 0px 10.2px;
            -webkit-animation: loading 2s infinite ease;
            animation: loading 2s infinite ease;
        }

        @-webkit-keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes loading {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        /* Animated form */

        .sr-root {
            animation: 0.4s form-in;
            animation-fill-mode: both;
            animation-timing-function: ease;
        }

        .sr-payment-form .sr-form-row {
            animation: 0.4s field-in;
            animation-fill-mode: both;
            animation-timing-function: ease;
            transform-origin: 50% 0%;
        }

        /* need saas for loop :D  */
        .sr-payment-form .sr-form-row:nth-child(1) {
            animation-delay: 0;
        }

        .sr-payment-form .sr-form-row:nth-child(2) {
            animation-delay: 60ms;
        }

        .sr-payment-form .sr-form-row:nth-child(3) {
            animation-delay: 120ms;
        }

        .sr-payment-form .sr-form-row:nth-child(4) {
            animation-delay: 180ms;
        }

        .sr-payment-form .sr-form-row:nth-child(5) {
            animation-delay: 240ms;
        }

        .sr-payment-form .sr-form-row:nth-child(6) {
            animation-delay: 300ms;
        }

        .hidden {
            display: none;
        }

        @keyframes field-in {
            0% {
                opacity: 0;
                transform: translateY(8px) scale(0.95);
            }

            100% {
                opacity: 1;
                transform: translateY(0px) scale(1);
            }
        }

        @keyframes form-in {
            0% {
                opacity: 0;
                transform: scale(0.98);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="panel">
                <h1>Checkout</h1>
                <form action="" id="payment-form">
                    <div id="payment-element"></div>
                    <button id="submit">Pay $20.00</button>

                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://js.stripe.com/v3"></script>
<script>
    document.addEventListener("DOMContentLoaded", async () => {
        let stripe = Stripe('{{ config('services.stripe.key') }}');
        // Create an instance of Elements
        let element = stripe.elements({
            clientSecret: '<?php echo $intent; ?>',
        });
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var cardElement = element.create("payment");
        cardElement.mount("#payment-element");
    })
</script>

</html>

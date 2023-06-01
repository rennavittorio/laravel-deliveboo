<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DelivePay</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/js/app.js'])

        <style>
            .body {
                font-family: 'Nunito', sans-serif;
                background-color: #FF9100;
            }
            /* Container */
            .container {
                max-width: 800px;
                margin: 0px auto
            }

            /* Campi di Braintree */
            #card-number, #cvv, #expiration-date, #cardholder-name {
                height: 40px;
                padding: 5px;
                border: 1px solid black;
                background-color: white;
            }
        </style>
    </head>
    <body class="antialiased body">
        {{-- Container --}}
        <div class="container">
            {{-- Messaggio di successo --}}
            @if (session('success_message'))
                <div>
                    {{ session('success_message') }}
                </div>
            @endif
            {{-- Messaggio di errore --}}
            @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Titolo --}}
            <h1 class="mt-5 fw-bold">
                Pagamento
            </h1>
            {{-- Form --}}
            <form action="{{ route('orders.store') }}" id="payment-form" method="post">
                @csrf
                {{-- Nome --}}
                <div>
                    <input type="hidden" name="first_name" value="{{ request()->firstName }}">
                </div>
                {{-- Cognome --}}
                <div>
                    <input type="hidden" name="last_name" value="{{ request()->lastName }}">
                </div>
                {{-- Email --}}
                <div>
                    <input type="hidden" name="email" value="{{ request()->email }}">
                </div>
                {{-- Telefono --}}
                <div>
                    <input type="hidden" name="phone" value="{{ request()->phone }}">
                </div>
                {{-- Email --}}
                <div>
                    <input type="hidden" name="address" value="{{ request()->address }}">
                </div>
                {{-- Codice postale --}}
                <div>
                    <input type="hidden" name="postal_code" value="{{ request()->postal_code }}">
                </div>
                {{-- ID dell'ordine --}}
                <div>
                    <input type="hidden" name="order_id" value="{{ request()->order_id }}">
                </div>
                {{-- Possessore della carta --}}
                <label for="cardholder-name">Card holder</label>
                <div id="cardholder-name" class="form-control mb-3"></div>    
                {{-- Numero della carta --}}
                <label for="card-number">Card Number</label>
                <div id="card-number" class="form-control mb-3"></div>
                {{-- CVV --}}
                <label for="cvv">CVV</label>
                <div id="cvv" class="form-control mb-3"></div>
                {{-- Data di scadenza --}}
                <label for="expiration-date">Expiration Date</label>
                <div id="expiration-date" class="form-control mb-3"></div>
                {{-- Nonce --}}
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                {{-- Submit --}}
                <button class="button btn btn-primary mt-3" type="submit"><span>Paga</span></button>
            </form>
        </div>

        {{-- Script --}}
        <script src="https://js.braintreegateway.com/web/3.94.0/js/client.min.js"></script>
        <script src="https://js.braintreegateway.com/web/3.94.0/js/hosted-fields.min.js"></script>
        <script>
        var form = document.querySelector('#payment-form');
        var submit = document.querySelector('input[type="submit"]');

        braintree.client.create({
            authorization: '{{ $token }}'
        }, function (clientErr, clientInstance) {
            if (clientErr) {
            console.error(clientErr);
            return;
            }

            // This example shows Hosted Fields, but you can also use this
            // client instance to create additional components here, such as
            // PayPal or Data Collector.

            braintree.hostedFields.create({
                client: clientInstance,
                styles: {
                    'input': {
                    'font-size': '14px'
                    },
                    'input.invalid': {
                    'color': 'red'
                    },
                    'input.valid': {
                    'color': 'green'
                    }
                },
                fields: {
                    number: {
                        container: '#card-number',
                        placeholder: '4111 1111 1111 1111'
                    },
                    cvv: {
                        container: '#cvv',
                        placeholder: '123'
                    },
                    expirationDate: {
                        container: '#expiration-date',
                        placeholder: '10/2022'
                    },
                    cardholderName: {
                        container: '#cardholder-name',
                        placeholder: 'Card holder'
                    },
                }
            }, 
            function (hostedFieldsErr, hostedFieldsInstance) {
                if (hostedFieldsErr) {
                    console.error(hostedFieldsErr);
                    return;
                }

                //submit.removeAttribute('disabled');

                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    hostedFieldsInstance.tokenize(function (tokenizeErr, payload) {
                        if (tokenizeErr) {
                            console.error(tokenizeErr);
                            return;
                        }

                        // If this was a real integration, this is where you would
                        // send the nonce to your server.
                        //console.log('Got a nonce: ' + payload.nonce);
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                }, false);
            });
        });
    </script>
    </body>
</html>

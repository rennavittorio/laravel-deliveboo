<h1>
    Nuovo ordine!
</h1>

<table>
    <thead>
        <tr>
            <th>
                Piatto
            </th>
            <th>
                Prezzo
            </th>
            <th>
                Quantità
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lead->message as $dish)
            <tr>
                <td>
                    {{ $dish['name'] }}
                </td>
                <td>
                    {{ $dish['price'] }}
                </td>
                <td>
                    {{ $dish['quantity'] }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
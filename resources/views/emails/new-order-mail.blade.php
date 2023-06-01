<style>
	h1 {
  		font-weight: normal;
  	}
  	table {
  		width: 100%;
  		text-align: left;
  		border-collapse: collapse;
  	}
  	th {
  		background-color:#9D4EDD;
  		color:white;
  		font-size: 18px;
  		font-weight: normal;
  		padding: 5px;
  	}
  	td {
  		padding: 5px;
  	}
    tr:nth-child(even) {
  		background-color: #FAF9F9;
  	}
</style>

<h1>
    Nuovo ordine!
</h1>

<p>
    {{ $lead->message['message'] }}
</p>

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
            <th>
                Prezzo totale
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lead->message['cart'] as $dish)
            <tr>
                <td>
                    {{ $dish['name'] }}
                </td>
                <td>
                    {{ $dish['price'] }}€
                </td>
                <td>
                    {{ $dish['quantity'] }}
                </td>
                <td>
                    {{ $dish['price'] * $dish['quantity'] }}€
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<?php
    $total = 0;
    foreach ($lead->message['cart'] as $dish) {
        $total += $dish['price'] * $dish['quantity'];
    }
?>

<p>
    Spesa totale: {{ $total }}€
</p>
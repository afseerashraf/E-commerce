@foreach ($user->orders as $order)
    <li> <strong> Product: </strong>{{ $order->product->name }}</li>
    <li> <strong> Description: </strong>{{ $order->product->description }}</li>
    <li> <strong> Ordered date:</strong> {{ $order->date }}</li>
    <br>
@endforeach

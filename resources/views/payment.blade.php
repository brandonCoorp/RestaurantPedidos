<form action="{{ url('charge') }}" method="post">
   <label for="amount">Monto</label>
    <input type="text" name="amount" />
    <label for="carrito">carrito</label>
    <input type="text" name="carrito" />
    {{ csrf_field() }}
    <input type="submit" name="submit" value="Pay Now">
</form>
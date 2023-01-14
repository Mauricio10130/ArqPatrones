package main;

public class Chocolate extends DecoradorCondimento {

    public Chocolate(IBebida pbebida) {
        super(pbebida);
    }

    @Override
    public String getDetalle() {
        return super.getDetalle() + "\nChocolate :" + getPrecioChocolate();
    }

    @Override
    public float getCosto() {
        return super.getCosto() + getPrecioChocolate();
    }

    public float getPrecioChocolate() {
        return 5;
    }
}

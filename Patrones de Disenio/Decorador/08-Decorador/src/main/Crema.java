package main;

public class Crema extends DecoradorCondimento {

    public Crema(IBebida pbebida) {
        super(pbebida);
    }

    @Override
    public String getDetalle() {
        return super.getDetalle() + "\nCrema :" + getPrecioCrema();
    }

    @Override
    public float getCosto() {
        return super.getCosto() + getPrecioCrema();
    }

    public float getPrecioCrema() {
        return 2;
    }
}

package main;

public class Leche extends DecoradorCondimento {

    public Leche(IBebida pbebida) {
        super(pbebida);
    }

    @Override
    public String getDetalle() {
        return super.getDetalle() + "\nLeche :" + getPrecioLeche();
    }

    @Override
    public float getCosto() {
        return super.getCosto() + getPrecioLeche();
    }

    public float getPrecioLeche() {
        return 4;
    }

}

package main;

public class CafeExpreso implements IBebida {

    @Override
    public String getDetalle() {
        return "Detalle\nCafe Expreso :" + getCosto();
    }

    @Override
    public float getCosto() {
        return 5;
    }

}

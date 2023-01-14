package main;

public class CafeDescafeinado implements IBebida {

    @Override
    public String getDetalle() {
        return "Detalle\nCafe Descafeinado :" + getCosto();
    }

    @Override
    public float getCosto() {
        return 7;
    }
    
}

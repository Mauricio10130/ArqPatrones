package main;

public abstract class DecoradorCondimento implements IBebida {

    protected IBebida bebida;

    public DecoradorCondimento(IBebida pbebida) {
        this.bebida = pbebida;
    }

    @Override
    public String getDetalle() {
        return bebida.getDetalle();
    }

    @Override
    public float getCosto() {
        return bebida.getCosto();
    }

}
